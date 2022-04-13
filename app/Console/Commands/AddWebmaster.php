<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\YandexTag;
use Illuminate\Console\Command;

class AddWebmaster extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'webmaster:add';

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
        $cityList = City::all();

        $access_token = env('TOKEN');

        $host = 'rex-sex.com';

        foreach ($cityList as $city) {


            $opts = array(
                'http' => array(
                    'method' => "GET",
                    'header' => "Accept-language: en\r\n" .
                        "Cookie: foo=bar\r\n" .
                        'Authorization: OAuth ' . $access_token,
                )
            );

            $context = stream_context_create($opts);

            $user_id = file_get_contents("https://api.webmaster.yandex.net/v3/user/", false, $context);
            $user_id = json_decode($user_id);
            $user_id = $user_id->user_id;


            $content = '

                <Data>
                    <host_url>https://' . $city['url'] . '.' . $host . '</host_url>
                </Data>

                ';


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api.webmaster.yandex.net/v4/user/{$user_id}/hosts/");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $content);  //Post Fields
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $headers = [
                'Content-type: application/xml',
                'Authorization: OAuth ' . $access_token
            ];

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $server_output = curl_exec($ch);

            curl_close($ch);

            $result = json_decode($server_output);


            $content = '';

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api.webmaster.yandex.net/v3/user/{$user_id}/hosts/" . urlencode($result->host_id) . "/verification/?verification_type=META_TAG");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $content);  //Post Fields
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $server_output = curl_exec($ch);

            curl_close($ch);

            $server_output = json_decode($server_output);

            $meta2 = $server_output->verification_uin;

            $meta_model = new YandexTag();

            $meta_model->city_id = $city['id'];
            $meta_model->tag = $meta2;

            $meta_model->save();

            exit();


        }

    }

}
