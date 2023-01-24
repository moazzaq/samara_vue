<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostCreate extends Component
{
    public $title;
    public $desc;

    public function render()
    {
        return view('livewire.post-create');
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
        sleep(2);
        $this->validate();

        Post::create([
           'title' => $this->title,
           'desc' => $this->desc,
        ]);
        $this->reset();
    }
}
