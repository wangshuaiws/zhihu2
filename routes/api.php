<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/topics', function (Request $request) {
    $topics = \App\Models\Topic::select(['id','name'])->where('name','like','%'.$request->query('q').'%')->get();
    return $topics;
})->middleware('api');

Route::post('/comments', function (Request $request) {
    $comments = \App\Models\Comment::select(['user_id','body','updated_at'])->where(['commentable_id'=>$request->answer_id,'commentable_type'=>$request->type])->get();
    foreach($comments as $comment) {
        $user = \App\User::findOrFail($comment->user_id);
        $comment['user_name'] = $user->name;
        $comment['avatar'] = $user->avatar;
    }
    return $comments;
})->middleware('api');

Route::post('/votes', function (Request $request) {
    $status = $request->is;
    $record = \App\Models\Vote::select(['id','is_agree'])->where(['user_id'=>$request->now_id,'vote_id'=>$request->id,'vote_type'=>$request->type])->first();
    if(!empty($record)) {
        $is_agree = $record->is_agree;
        if($status == 1) {
            if($is_agree == 0) {
                $records =  \App\Models\Vote::findOrFail($record->id);
                $records->delete();
            }
        }
        if($status == 0) {
            if($is_agree == 1) {
                $records =  \App\Models\Vote::findOrFail($record->id);
                $records->delete();
            }
        }
    } else {
        $data = [
            'user_id'      => $request->now_id,
            'vote_id'      => $request->id,
            'vote_type' => $request->type,
            'is_agree'    => $status
        ];
        \App\Models\Vote::create($data);
    }
    $count = App\Models\Vote::where(['is_agree' => 1,'vote_id'=>$request->id,'vote_type'=>$request->type])->count();
    if($request->type = 'answer') { App\Models\Answer::where('id', $request->id)->update(['votes_count' => $count]); }
    if($request->type = 'article') { App\Models\Article::where('id', $request->id)->update(['votes_count' => $count]); }
    return json_encode(['count' => $count]);
})->middleware('api');

Route::post('/collections', function (Request $request) {
    $user_id = $request->now_id;
    $collections = \App\Models\Collection::select(['id'])->where(['user_id'=>$user_id,'collection_id'=>$request->id,'collection_type'=>$request->type])->first();
    if($collections) {
        $collection =  \App\Models\Collection::findOrFail($collections->id);
        $collection->delete();
        return json_encode(['collections' => '收藏']);
    } else {
        $data = [
            'user_id'      => $user_id,
            'collection_id' => $request->id,
            'collection_type' =>  $request->type
        ];
        \App\Models\Collection::create($data);
        return json_encode(['collections' => '已收藏']);
    }
})->middleware('api');



