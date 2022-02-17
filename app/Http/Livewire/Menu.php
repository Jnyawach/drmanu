<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\Category;
use Livewire\Component;

class Menu extends Component
{
    public  $categories;
    public $posts;
    public $results;
    public $search;
    protected $queryString=['search'];
    public function mount(){
        $this->categories=Category::all();
        $this->post=Blog::latest()->first();
        $this->results = Blog::where('title', 'like', '%'.$this->search.'%')->get();
    }
    public  function searchResult(){

    }
    public function render()
    {
        return view('livewire.menu');
    }
}
