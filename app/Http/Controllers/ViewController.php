<?php

namespace App\Http\Controllers;

use App\Actions\AddView;
use App\Models\Post;
use App\Repositories\PhoneRepository;
use Illuminate\Http\Request;

class ViewController extends Controller
{

    private $phoneRepository;

    public function __construct()
    {
        $this->phoneRepository = new PhoneRepository();
    }
    public function phone(Request $request)
    {
        $postId = $request->post('id');
        $cityId = $request->post('city');

        $phone = $this->phoneRepository->getPhone($cityId, $postId);

        return $phone;

    }
}
