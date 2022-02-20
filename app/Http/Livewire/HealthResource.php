<?php

namespace App\Http\Livewire;

use App\Models\Resource;
use Livewire\Component;
use Livewire\WithPagination;

class HealthResource extends Component
{
    use WithPagination;
    public $categories;
    public $category;
    public $search='';
    protected $queryString = ['search'];
    public function paginationView()
    {
        return 'vendor.pagination.custom';
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if ($this->search){
            $this->category='';
            $resources=Resource::where('status_id',2)->where('name', 'like', '%'.$this->search.'%')
                ->paginate(20);
        }elseif ($this->category){
            $this->resetPage();
            $resources=Resource::where('status_id',2)->where('category_id',$this->category)
                ->paginate(20);
        }else{
            $resources=Resource::where('status_id',2)->paginate(20);
        }


        return view('livewire.health-resource',[
            'resources'=>$resources,
        ]);
    }
}
