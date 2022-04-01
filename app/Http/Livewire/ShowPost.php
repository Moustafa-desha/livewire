<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPost extends Component
{
    public $post_id;
    public $post;


    public function mount($id)
    {
        $this->post_id = $id;
        $this->post = Post::whereId($this->post_id)->first();

    }

    public function render()
    {

        return view('livewire.show-post')
            ->extends('layouts.app')
            ->section('content');
    }


    public function posts()
    {
        return redirect('livewire/posts');
    }
}
