<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        return view('blogs.index',[
            'posts'=> BlogPost::latest()->get()
        ]);
    }

    public function show(BlogPost $blogPost)
    {
        return view('blogs.show',[
            'post'=> $blogPost
        ]);
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $formFields['user_id']=auth()->id();
        $newPost=BlogPost::create($formFields);
        return redirect('blogs/' . $newPost->id);
    }

    public function edit(BlogPost $blogPost)
    {
        if($this->adminAndUserOnly($blogPost)){
            return view('blogs.edit', [
                'post' => $blogPost,
            ]);
        }
        else{
            abort(403,'THIS ACTION IS UNAUTHORIZED');
        }
    }

    public function update(Request $request, BlogPost $blogPost)
    {
        if($this->adminAndUserOnly($blogPost)){
            $formFields = $request->validate([
                'title' => 'required',
                'body' => 'required'
            ]);
            $blogPost->update($formFields);
            return redirect('blogs/' . $blogPost->id);
        }
        else{
            abort(403,'THIS ACTION IS UNAUTHORIZED');
        }
    }

    public function destroy(BlogPost $blogPost)
    {
        if($this->adminAndUserOnly($blogPost)){

            $blogPost->delete();
            return redirect('/blogs');
        }
        else{
            abort(403,'THIS ACTION IS UNAUTHORIZED');
        }
    }

    private function adminAndUserOnly(BlogPost $post): bool{
        if((auth()->user()->role=='admin') || (auth()->id() == $post->user_id)){
            return true;
        }
        return false;
    }
}
