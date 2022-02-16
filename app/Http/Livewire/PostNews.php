<?php

namespace App\Http\Livewire;

use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostNews extends Component
{
    use WithFileUploads;
    public $title;
    public $content;
    public $tags;
    public $summary;
    public $user_id;
    public $imageCard;
    public $imageAlt;
    public $imageTitle;
    public $categories;
    public $statuses;
    public $success=false;


    protected $rules=[
        /*'category'=>'required|integer|max:10',*/
        'title'=>'required|min:10|string|max:120',
        'summary'=>'required|min:10|string|max:500',
        'tags'=>'required|min:10|string|max:255',
        'content'=>'required',
        'imageCard'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'imageAlt'=>'required|min:10|string|max:120',
        'imageTitle'=>'required|min:10|string|max:120',

    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public  function clearForm(){
        $this->title=null;
        $this->summary=null;
        $this->content=null;
        $this->imageAlt=null;
        $this->tags=null;
        $this->imageTitle=null;
    }

    public function createNews(){

        $this->validate();
        $news=News::create([
            'title'=>$this->title,
            'summary'=>$this->summary,
            'tags'=>$this->tags,
            'content'=>$this->content,
            'imageAlt'=>$this->imageAlt,
            'imageTitle'=>$this->imageTitle,
            'status_id'=>1,
            'user_id'=>Auth::id(),

        ]);
        if($files=$this->imageCard){
            $news->addMedia($files)->toMediaCollection('imageCard');
        }
        $this->clearForm();
        $this->success="Post Successfully created";
    }

    public function render()
    {
        return view('livewire.post-news');
    }
}
