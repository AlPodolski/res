<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add(AddCommentRequest $request)
    {
        $data = $request->all();

        if ($item = (new Comment())->create($data)) return back()
            ->with(['success' => 'Комментарий отправлен на модерацию']);

        return back()
        ->withErrors(['msg' => 'Ошибка'])
        ->withInput();
    }
}
