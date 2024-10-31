<?php

namespace App\Console\Commands;

use App\Events\PayEvent;
use App\Models\History;
use App\Models\PayCashDay;
use App\Models\Post;
use Illuminate\Console\Command;

class PayForPuplication extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:pay';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $posts = Post::with('user', 'tarif')
            ->where('pay_time', '<', time())
            ->where(['publication_status' => Post::POST_ON_PUBLICATION])
            ->where(['fake' => Post::POST_REAL])->get();

        $sum = 0;

        foreach ($posts as $post){

            if ($post->user->cash >= $post->tarif->price){

                $post->user->cash = $post->user->cash - $post->tarif->price;

                $post->user->save();

                $post->pay_time = time() + 3600;

                $post->save();

                $payType = History::PAY_FOR_POST_PUBLICATION_TYPE;

                $sum = $sum + $post->tarif->price;

                event(new PayEvent($post->tarif->price, $post->user->id,$payType,$post->user->cash));

            }else{

                $post->publication_status = Post::POST_DONT_PUBLICATION;

                $post->save();

            }

        }

        if ($sum) PayCashDay::add($sum);

    }
}
