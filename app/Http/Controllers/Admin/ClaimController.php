<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function index()
    {
        $claim = Claim::orderByDesc('id')->paginate(50);

        return view('admin.claim.index', compact('claim'));
    }

    public function delete(Request $request)
    {
        $id = $request->post('id');

        $comment = Claim::find($id);

        if ($comment) $comment->delete();
    }

}
