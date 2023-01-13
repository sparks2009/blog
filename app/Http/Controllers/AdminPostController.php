<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminPostController extends Controller
{
    

    public function edit(Post $post){

        
        return view('admin.posts.edit', ['post' => $post]);


    }

    public function store(){
                
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'thumbnail' => 'image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
        
        $attributes['user_id'] = auth()->id();
        
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');        
        
        Post::create($attributes);
        
        return redirect('/')->with('success', 'Your post has been created');         

    }




    public function update(Post $post){

        $attributes = request()->validate([
            'title' => 'required',
            'slug' => 'required',
            'thumbnail' => 'image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        $attributes['user_id'] = auth()->id();

        if (isset($attributes['thumbnail'])){
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post){

        $post->delete();

        return back()->with('success', 'Post deleted');

    }
}
