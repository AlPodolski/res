<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderByDesc('id')
            ->with('post')
            ->paginate(50);

        return view('admin.comments.index', compact('comments'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

    public function delete(Request $request)
    {
        $id = $request->post('id');

        $comment = Comment::find($id);

        if ($comment) $comment->delete();
    }

    public function check(Request $request)
    {
        $id = $request->post('id');

        $comment = Comment::find($id);

        if ($comment) {
            $comment->status = Comment::PUBLICATION_STATUS;
            $comment->save();
        }
    }

}
