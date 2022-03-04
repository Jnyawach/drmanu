<?php

namespace App\Http\Livewire;

use App\Models\Career;
use Carbon\Carbon;
use Livewire\Component;

class EditJobs extends Component
{
    public $job;
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
    public function mount(){
        $this->title=$this->job->title;
        $this->description=$this->job->description;
        $this->status=$this->job->status;
        $this->deadline=$this->job->deadline;
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function updateJob(){
        $this->validate();
        $job=Career::findOrFail($this->job->id);
        $job->update([
            'title'=>$this->title,
            'status'=>$this->status,
            'deadline'=>Carbon::parse($this->deadline),
            'description'=>$this->description,
        ]);

        $this->success="Job Posted Successfully";
    }
    public function render()
    {
        return view('livewire.edit-jobs');
    }
}
