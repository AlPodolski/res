<?php

namespace App\Http\Controllers;

use App\Actions\AddView;
use App\Models\Post;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function phone(Request $request)
    {
        $id = $request->post('id');

        $post = Post::findOrFail($id);

        (new AddView($post))->addViewPhone();

    }
}
