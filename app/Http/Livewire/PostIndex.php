<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;
    public $search;
    public $title;
    public $desc;
    public $show = false;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $posts = Post::where('title', 'LIKE' , "%{$this->search}%")->latest()->paginate(5);
        return view('livewire.post-index',[
            'posts' => $posts
        ]);
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
    }

    public function ShowForm()
    {
        $this->show = !$this->show;
    }

    protected $rules = [
        'title' => 'required|min:6',
        'desc' => 'required|min:10',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function Store()
    {
       // sleep(2);
        $this->validate();

        Post::create([
            'title' => $this->title,
            'desc' => $this->desc,
        ]);
        $this->reset();
    }
}
