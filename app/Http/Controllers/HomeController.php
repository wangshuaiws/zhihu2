<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\User;
use App\Models\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::where('is_hidden', '=', 'F')->orderBy('updated_at', 'DESC')->limit(8)->get();
        if($questions) {
            foreach($questions as $key => $question) {
               // $value =  Question::findOrFail($question->id);
                //dd($question->topics()->first());
				//qwr
                $answer = Answer::where('question_id','=',$question->id)->first();
                if($answer) {
                    $users = User::findOrFail($answer->user_id);
                    $collection = Collection::select(['id'])->where(['user_id' => Auth::id(), 'collection_id' => $answer->id, 'collection_type' => 'answer'])->first();
                    if ($collection) {
                        $question['collection'] = '已收藏';
                    } else {
                        $question['collection'] = '收藏';
                    }
                    $topics = $question->topics()->first();
                    $question['now_id'] = Auth::id();
                    $question['topic'] = $topics->name;
                    $question['name'] = $users->name;
                    $question['signature'] = $users->signature;
                    $question['time'] = $answer->updated_at;
                    $question['answer_id'] = $answer->id;
                    $question['answer'] = $answer->body;
                    $question['votes_count'] = $answer->votes_count;
                    $question['comment_count'] = $answer->comments_count;
                    $question['type'] = 'answer';
                    $question['url'] = '/question/' . $question->id;
                } else {
                    unset($questions[$key]);
                }
            }
        }

        $questions = $questions->toArray();
        $article = Article::where('is_hidden','=','F')->limit(2)->get();
        foreach($article as $value) {
            $topics = $value->topics()->first();
            $users = User::findOrFail($value->user_id);
            $collection = Collection::select(['id'])->where(['user_id' => Auth::id(),'collection_id'=> $value->id,'collection_type'=>'article'])->first();
            if($collection) { $value['collection'] = '已收藏'; } else { $value['collection'] = '收藏'; }
            $value['now_id'] = Auth::id();
            $value['topic'] = $topics->name;
            $value['name'] = $users->name;
            $value['signature'] = $users->signature;
            $value['time'] = $value->updated_at;
            $value['answer_id'] = $value->id;
            $value['answer'] = $value->body;
            $value['votes_count'] = $value->votes_count;
            $value['comment_count'] = $value->comments_count;
            $value['type'] = 'article';
            $value['url'] = '/article/'.$value->id;
            array_push($questions,$value->toArray());
        }
        //dd($questions);
        //$questions = collect($questions);
        //dd($questions);

        return view('home',compact('questions'));
    }

    public function information($name)
    {
        $user = User::where('name', '=', $name)->first(['id','name','avatar','signature','followers_count','followings_count']);
        $answers = Answer::where('user_id','=',$user->id)->get();
        foreach($answers as $answer) {
            $question = Question::findOrFail($answer->question_id);
            $answer['title'] = $question->title;
        }
        $questions = Question::where('user_id','=',$user->id)->get();
        $articles = Article::where('user_id','=',$user->id)->get();
        $collections = Collection::where('user_id','=',$user->id)->get();
        $all = array();
        foreach($collections as $collection) {
            if($collection->collection_type == 'answer') {
                $answer_collections = Answer::findOrFail($collection->collection_id);
                $question_title = Question::findOrFail($answer_collections->question_id)->title;
                $answer_collections['title'] = $question_title;
                array_push($all,$answer_collections->toArray());
            }
            if($collection->collection_type == 'article') {
                $article_collections = Article::findOrFail($collection->collection_id);
                array_push($all,$article_collections->toArray());
            }
        }
        return view('project.information',compact('user','answers','questions','articles','all'));
    }

    public function edit($name)
    {
        $user = User::where('name','=',$name)->first();
        return view('project.information_edit',compact('user'));
    }

    public function editInformation(Request $request)
    {
        if($request->hasFile('avatar'))
        {
            $file = $request->avatar;
            $name = str_random(10) . '.jpg';
            $path = public_path() . '/avatars/';
            $file->move($path, $name);
            $data = [
                'signature' => $request->signature,
                'avatar'       =>  '/avatars/'.$name
            ];
            $user = User::findOrFail(Auth::id());
            $user->update($data);
        }
		return view('project.information_edit',compact('user'));
    }

    public function search(Request $request)
    {
        $questions = \App\Models\Question::where('title','like','%'.$request->search.'%')->limit(8)->get();
        if($questions) {
            foreach($questions as $key => $question) {
                // $value =  Question::findOrFail($question->id);
                //dd($question->topics()->first());
                $answer = \App\Models\Answer::where('question_id','=',$question->id)->first();
                if($answer) {
                    $users = \App\User::findOrFail($answer->user_id);
                    $collection = \App\Models\Collection::select(['id'])->where(['user_id' => Auth::id(), 'collection_id' => $answer->id, 'collection_type' => 'answer'])->first();
                    if ($collection) {
                        $question['collection'] = '已收藏';
                    } else {
                        $question['collection'] = '收藏';
                    }
                    $topics = $question->topics()->first();
                    $question['now_id'] = Auth::id();
                    $question['topic'] = $topics->name;
                    $question['name'] = $users->name;
                    $question['signature'] = $users->signature;
                    $question['time'] = $answer->updated_at;
                    $question['answer_id'] = $answer->id;
                    $question['answer'] = $answer->body;
                    $question['votes_count'] = $answer->votes_count;
                    $question['comment_count'] = $answer->comments_count;
                    $question['type'] = 'answer';
                    $question['url'] = '/question/' . $question->id;
                } else {
                    unset($questions[$key]);
                }
            }
        }
        return view('home',compact('questions'));
    }
}
