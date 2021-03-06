<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        //$posts = Post::all();
        //return view('posts.index',compact('posts'));
        $post = new Post();
        $posts = $post->GetPost();

        return view('posts.index',compact('posts'));

    }
    public function show($id){
        $post =Post::findOrFail($id);
        return view('posts.show',compact('post'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        //dd($request->all());
//        Post::create([
//            'title'=> $request->get('title'),
//            'post_text'=>$request->get('post_text'),
//            'post_author'=>$request->get('author_name'),
//
//
//        ]);

        $post = new Post();
//        $post->title=$request->get('title');
//        $post->author_name=$request->get('author_name');
//        $post->post_text=$request->get('post_text');
//
//        $post->save();
        $post->create($request->all());
        return redirect()->back();

    }


    public function edit($id){

        $post = Post::findOrFail($id);
        return view('posts.edit',compact('post'));
    }

    public function update(Request $request,$id){
        $post = Post::findOrFail($id);

        $post->update($request->all());
        return redirect()->back();

    }
    public function delete($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back();

    }

//    public function create(){
//        Post::create([
//            'title'=>'testTitle',
//            'author_name'=>'testAuthor',
//            'post_text'=>'testText',
//        ]);
//        echo "The post has been saved";
//    }


}
