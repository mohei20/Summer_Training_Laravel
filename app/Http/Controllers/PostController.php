<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function  index(){
        $posts = Post::all();
        return view("posts.index", ["posts"=>$posts]);
    }

    function show($id){
        $post = Post::findOrFail($id);
        return view("posts.show", ["post"=>$post]);
    }

    function  create(){
        return view("posts.creat");
    }

    function store(){
        $title = request("title");
        $body = request("body");
        $detailes = request("details");
        $image = request("image");

        $newpost = new Post();
        $newpost->title = $title;
        $newpost->body = $body;
        $newpost->details = $detailes;
        $newpost->image = $image;
        $newpost->save();
        return to_route("posts.index");
    }
}
