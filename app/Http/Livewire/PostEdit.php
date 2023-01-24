<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostEdit extends Component
{
    public $postId;
    public $title;
    public $desc;

    public function mount()
    {
        $post = Post::find($this->postId);
        $this->title = $post->title;
        $this->desc = $post->desc;
    }

    public function render()
    {
        return view('livewire.post-edit');
    }


    protected $rules = [
        'title' => 'required|min:6',
        'desc' => 'required|min:10',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function Update()
    {
        $this->validate();
        $post = Post::find($this->postId);

        $post->update([
            'title' => $this->title,
            'desc' => $this->desc,
        ]);

        session()->flash('message', 'Post successfully updated.');

    }
}
