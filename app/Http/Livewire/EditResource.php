<?php

namespace App\Http\Livewire;

use App\Models\Resource;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditResource extends Component

{
    use WithFileUploads;
    public $resource;
    public $categories;
    public $name;
    public $link;
    public $status;
    public $category;
    public $description;
    public $cover;
    public $resourceFile;
    public $success;
    protected $rules=[
        'category'=>'required|integer|max:10',
        'name'=>'required|min:10|string|max:120',
        'link'=>'nullable|string|max:500',
        'description'=>'required',
        'cover'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=250,height=350',
        'resourceFile'=>'nullable|required_without:link|mimes:docx,pdf,epub,mp3,mp4,avi,mkv,zip,ppt,pptx',
    ];
    public function mount(){
        $this->category=$this->resource->category->id;
        $this->name=$this->resource->name;
        $this->link=$this->resource->link;
        $this->description=$this->resource->description;

    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public  function clearForm(){
        $this->category=null;
        $this->name=null;
        $this->link=null;
        $this->description=null;
        $this->cover=null;

    }
    public function updateResource(){
        $this->validate();
        $resource=Resource::findOrFail($this->resource->id);
        $resource->update([
            'name'=>$this->name,
            'link'=>$this->link,
            'description'=>$this->description,
            'category_id'=>$this->category,
            'status_id'=>1,
        ]);
        if($files=$this->cover){
            $resource->clearMediaCollection('cover');
            $resource->addMedia($files)->toMediaCollection('cover');
        }
        if($files=$this->resourceFile) {
            if ( $resource->getMedia('resourceFile')->count()>0){
                $resource->clearMediaCollection('resourceFile');
                $resource->addMedia($files)->toMediaCollection('resourceFile');
            }else{
                $resource->addMedia($files)->toMediaCollection('resourceFile');
            }

        }

        $this->success="Resource Successfully created";

    }
    public function render()
    {
        return view('livewire.edit-resource');
    }
}
