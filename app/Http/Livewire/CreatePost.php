<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{

   use withFileUploads;

    public  $title;
    public  $category;
    public  $body;
    public  $image;

    public function render()
    {
        $categories = Category::all();
        return view('livewire.create-post',['categories' => $categories,])
            ->extends('layouts.app')
            ->section('content');
    }

    public function posts()
    {
      return redirect('livewire/posts');
    }

    protected $rules = [
        'title'     => 'required|max:255',
        'body'      => 'required|max:2500',
        'category'  => 'required',
        'image'     => 'nullable|file|mimes:png,jpg,jpeg,gif|max:102400',
    ];

    public function save()
    {
        $this->validate();

        $post['title'] = $this->title;
        $post['body'] = $this->body;
        $post['category_id'] = $this->category;
        $post['user_id'] = auth()->id();

        if ($image = $this->image){
            $filename = Str::slug($this->title). '.' .$image->getClientOriginalExtension();
            $path = public_path('/assets/images/'.$filename);
            Image::make($image->getRealPath())->save($path,100);

            $post['image'] = $filename;
        }
        Post::create($post);

        $this->resetInput();

        return redirect('livewire/posts')->with([
            'message' => 'Post created Successfully',
            'alert-type' => 'success',
        ]);

    } /* END METHOD */



    private function resetInput()
    {
        $this->title = null;
        $this->category = null;
        $this->body = null;
        $this->image = null;
    }
}
