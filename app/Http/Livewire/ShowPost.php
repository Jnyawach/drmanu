<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;

class ShowPost extends Component
{
    public $post;
    public $review;
    public $name;
    public $email;
    public $comment;
    public $success=false;
    protected $rules=[
        'name' => 'nullable|string|max:100|min:3',
        'email'=>'nullable|email|string|max:255',
        'comment'=>'required|min:3|max:1500'
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function createReview(){

        $this->validate();
        $blog=Blog::findOrFail($this->post->id);
        $blog->reviews()->create([
            'name'=>$this->name,
            'email'=>$this->email,
            'review'=>1,
            'comment'=>$this->comment
        ]);
        $this->clearForm();
        $this->success="Thank you for your Feedback";

    }

    public  function clearForm(){
        $this->name=null;
        $this->email=null;
        $this->comment=null;
        $this->review=null;
        $this->postId=null;
    }

    public function render()
    {
        return view('livewire.show-post');
    }
}
