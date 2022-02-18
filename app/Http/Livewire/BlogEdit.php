<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogEdit extends Component
{
    use WithFileUploads;
    public $post;
    public $title;
    public $content;
    public $tags;
    public $summary;
    public $user_id;
    public $imageCard;
    public $imageAlt;
    public $imageTitle;
    public $imageCredit;
    public $category;
    public $categories;
    public $statuses;
    public $postId;
    public $success=false;

    public  function mount(){
        $this->postId=Blog::findOrFail($this->post->id);
        $this->title=$this->post->title;
        $this->category=$this->post->category->id;
        $this->content=$this->post->content;
        $this->tags=$this->post->tags;
        $this->summary=$this->post->summary;
        $this->imageAlt=$this->post->imageAlt;
        $this->imageTitle=$this->post->imageTitle;
        $this->imageCredit=$this->post->imageCredit;


    }
    protected $rules=[
        'category'=>'required|integer|max:10',
        'title'=>'required|min:10|string|max:120',
        'imageCredit'=>'required|min:10|string|max:120',
        'summary'=>'required|min:10|string|max:500',
        'tags'=>'required|min:10|string|max:255',
        'content'=>'required',
        'imageCard'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=800,height=550',
        'imageAlt'=>'required|min:10|string|max:120',
        'imageTitle'=>'required|min:10|string|max:120',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function updatePost(){
        $this->validate();
        $this->postId->update([
            'title'=>$this->title,
            'summary'=>$this->summary,
            'tags'=>$this->tags,
            'content'=>$this->content,
            'imageAlt'=>$this->imageAlt,
            'imageTitle'=>$this->imageTitle,
            'status_id'=>1,
            'category_id'=>$this->category,
            'imageCredit'=>$this->imageCredit,

        ]);
        if($files=$this->imageCard){
            $this->postId->clearMediaCollection('imageCard');
            $this->postId->addMedia($files)->toMediaCollection('imageCard');
        }
        $this->success="Post Successfully Updated";
    }
    public function render()
    {

        return view('livewire.blog-edit');
    }
}
