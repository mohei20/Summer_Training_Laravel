<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Constraint\FileExists;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view("posts.index", ["posts"=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"=>"required|min:5",
        ]);
        $inputdata = $request->all();
        $image = $request->file("image");
        if($image){
            $imagename=implode(".",
                [date('YmdHis'),$inputdata["title"], $image->getClientOriginalExtension()]);
            $dstentaiton_path ="postimages/";
            $image->move($dstentaiton_path, $imagename);
            $inputdata["image"] = $imagename;
        }
        Post::create($inputdata);
        return to_route("posts.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return  view("posts.show", ["post"=>$post]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("posts.edit", ["post"=>$post]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            "title"=>"required|min:5",
        ]);
        $inputdata= $request->all();
        if($request->file("image")){
            $this->deleteImage($post);
            $new_image= $request->file("image");
            $imagename=implode(".",
                [date('YmdHis'),$inputdata["title"], $new_image->getClientOriginalExtension()]);
            $dstentaiton_path ="postimages/";
            $new_image->move($dstentaiton_path, $imagename);
            $inputdata["image"] = $imagename;
        }
        $post->update($inputdata);
        return  to_route("posts.show", $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(File::exists(public_path("postimages/$post->image"))){
            File::delete(public_path("postimages/$post->image"));
        }
        $post->delete();
        return to_route("posts.index");
    }

    private function  deleteImage(Post $post){
        if(File::exists(public_path("postimages/$post->image"))){
            File::delete(public_path("postimages/$post->image"));
        }
    }
}
