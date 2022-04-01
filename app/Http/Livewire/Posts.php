<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';



    public function render()
    {
        $posts = Post::with('user','category')->orderBy('id','desc')->paginate(5);

        return view('livewire.posts',['posts' => $posts])
            ->extends('layouts.app')
            ->section('content');
    } //END METHOD

    public function create_post()
    {

        return redirect()->to('livewire/create/post');
    }

    public function edit_post($id)
    {
        $post = Post::whereId($id)->whereUserId(auth()->id())->first();
        if ($post){
            return redirect('livewire/edit/post/'.$id);
        }
       session()->flash('message_error',"you can't update not yours");

    }/* END METHOD */


    public function delete_post($id)
    {
        $post = Post::whereId($id)->whereUserId(auth()->id())->first();
        if ($post){
            if (File::exists('assets/images/'.$post->image)){
                 unlink('assets/images/'.$post->image);
            }
            $post->delete();

            Session()->flash('message_success',"post deleted successfully");
        }
        Session()->flash('message_error',"you can't delete not yours");
    } /* END METHOD */

    public function show_post($id)
    {
        $post = Post::whereId($id)->first();
        return redirect('livewire/show/post/'.$id,['post' => $post]);
    }

}
