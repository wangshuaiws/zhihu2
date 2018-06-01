<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    //commentable_type 1 表示文章评论  2 表示回答评论 3 表示问题评论（暂无）
    public function create(Request $request)
    {
        if(isset($request->answer)) { $id = $request->answer; $type = 2; }
        if(isset($request->article)) { $id = $request->article; $type = 1; }
        $data = [
            'user_id' => Auth::id(),
            'body'     => $request->comment,
            'commentable_id' => $id,
            'commentable_type' => $type
        ];
        $comment = Comment::create($data);
        if($comment && $type == 2) {
            $answer = Answer::findOrFail($id);
            $answer->increment('comments_count');
        } else if($type == 1) {
            $article = Article::findOrFail($id);
            $article->increment('comments_count');
        }

        return redirect()->route('home');
    }
}
