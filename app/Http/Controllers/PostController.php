<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
        return view('Post.Post',[
            'posts' => Post::all()
        ]);
    }


    public function create()
    {
        return view('Post.AddPost',[
            'categories' => Category::all()
        ]);
    }


    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        //create post
        Post::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }




    public function show($id)
    {
        $post = Post::find($id);
        return view('Post.ShowPost',compact('post'));
    }


    public function edit($id)
    {
        $post = Post::find($id);
        return view('Post.UpdatePost',compact('post'),[
            'post' => $post
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'detail' => ['required'],
            'body' => ['required'],
            'category_id' => ['required']
        ]);

        Post::find($id)->update($request->all());
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
    }
}
