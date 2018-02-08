<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Session;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(CommentRequest $request)
    {
        try {
            $data = $request->only(['user_id', 'review_id', 'content']);
            $comment = Comment::create($data);
            Session::flash('success', trans('messages.createsucces'));
        } catch (Exception $e) {
            Session::flash('fails', trans('messages.errorfail'));
        }

        return back();
    }
}
