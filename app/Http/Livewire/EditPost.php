<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPost extends Component
{

    use withFileUploads;

    public  $post_id, $post, $title, $category, $body, $image, $image_original;


    public function mount($id)
    {
        $this->post_id    =  $id;
        $this->post       =  Post::whereId($this->post_id)->first();
        $this->title      =  $this->post->title;
        $this->category   =  $this->post->category_id;
        $this->body       =  $this->post->body;
        $this->image      =  $this->post->image;
        $this->image_original = $this->post->image;
    }

    public function render()
    {

        $categories = Category::all();
        return view('livewire.edit-post',
            ['categories' => $categories,'post' => $this->post])
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
        'image'     => 'nullable|mimes:png,jpg,jpeg,gif|max:20000',
    ];

    public function update()
    {
        $this->validate();

       $post = Post::whereId($this->post_id)->whereUserId(auth()->id())->first();

       if ($post){
                $post['title'] = $this->title;
                $post['body'] = $this->body;
                $post['category_id'] = $this->category;


                if ($image = $this->image){

                    if (File::exists('assets/images/'.$this->image)){
                        unlink('assets/images/'.$this->image);
                    }

                    $filename = Str::slug($this->title). '.' .$image->getClientOriginalExtension();
                    $path = public_path('/assets/images/'.$filename);
                    Image::make($image->getRealPath())->save($path,100);

                    $post['image'] = $filename;
                }
                $post->update();

                $this->resetInput();

                return redirect('livewire/posts')->with([
                    'message' => 'Post updated Successfully',
                    'alert-type' => 'success',
                ]);
       }

    } /* END METHOD */



    private function resetInput()
    {
        $this->title = null;
        $this->category = null;
        $this->body = null;
        $this->image = null;
    }
}
