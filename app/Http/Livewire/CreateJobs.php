<?php

namespace App\Http\Livewire;

use App\Models\Career;
use Carbon\Carbon;
use Livewire\Component;

class CreateJobs extends Component
{
    public $status;
    public $description;
    public $deadline;
    public $title;
    public $success=false;
    protected $rules=[
        'status'=>'required|integer|max:10',
        'title'=>'required|min:10|string|max:120',
        'deadline'=>'required|date',
        'description'=>'required',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function clearForm(){
        $this->title=null;
        $this->status=null;
        $this->deadline=null;
        $this->description=null;
    }
    public function createJob(){
        $this->validate();
        $job=Career::create([
            'title'=>$this->title,
            'status'=>$this->status,
            'deadline'=>Carbon::parse($this->deadline),
            'description'=>$this->description,
        ]);
        $this->clearForm();
        $this->success="Job Posted Successfully";
    }
    public function render()
    {
        return view('livewire.create-jobs');
    }
}
