<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Category;

class PostController extends Controller
{
    public function index(Post $xyz)
    {
        // クライアントインスタンス生成
        $client = new \GuzzleHttp\Client();

        // GET通信するURL
        $url = 'https://teratail.com/api/v1/questions';

        // リクエスト送信と返却データの取得
        // Bearerトークンにアクセストークンを指定して認証を行う
        $response = $client->request(
            'GET',
            $url,
            ['Bearer' => config('services.teratail.token')]
        );
        
        // API通信で取得したデータはjson形式なので
        // PHPファイルに対応した連想配列にデコードする
        $questions = json_decode($response->getBody(), true);
        
        // index bladeに取得したデータを渡す
        return view('index')->with([
            'tests' => $xyz->getPaginateByLimit(5),
            'questions' => $questions['questions'],
        ]);
        
    }
    
    
    public function show(Post $abc)
    {
        return view('show')->with(['tests2'=> $abc]);
    }
   
    // 引数をRequest->PostRequestにする
    public function store(Post $def, PostRequest $request) 
    {
        // dd($request);
        $input = $request['post'];
        $def->fill($input)->save();
        return redirect('/posts/' . $def->id);
    }
    public function edit(Post $post)
    {
        return view('edit')->with(['post' => $post]);
    }
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
    
        return redirect('/posts/' . $post->id);
    }
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    public function create(Category $category)
    {
        return view('create')->with(['categories' => $category->get()]);;
    }
    

}
