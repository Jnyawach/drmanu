<?php

namespace App\Http\Livewire;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    use WithFileUploads;
    public User $user;
    public  $profile;
    public $profileCard;
    public $name;
    public $lastname;
    public $cellphone;
    public $title;
    public $about;
    public $profession;
    public $password;
    public $password_confirmation;
    public $success=false;
    public $password_updated=false;
    protected $rules=[
        'name' => 'required|string|max:50',
        'lastname' => 'required|string|max:50',
        'cellphone' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'profession' => 'required|string|max:255',
        'about' => 'required|string',


    ];
    public  function mount(){
        $this->user=Auth::user();
        $this->name=$this->user->name;
        $this->lastname=$this->user->lastname;
        $this->cellphone=$this->user->cellphone;
        if ($this->user->bio){
            $this->profession=$this->user->bio->profession;
            $this->about=$this->user->bio->about;
            $this->title=$this->user->bio->title;
        }
        $this->profile=$this->user->getFirstMediaUrl('profile');
        $this->profileCard=$this->user->getFirstMediaUrl('profile','profile-card');
    }
    public function render()
    {
        return view('livewire.profile');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedProfile() {
        $this->validate([
           'profile'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);


        if (Auth::user()->getMedia('profile')->count()>0){
            Auth::user()->clearMediaCollection('profile');
            Auth::user()->addMedia($this->profile)->toMediaCollection('profile');
        }else{
            Auth::user()->addMedia($this->profile)->toMediaCollection('profile');
        }
       return redirect()->back();
    }
    public function updateUser(){
        $this->validate();
        $this->user->update([
            'name'=>$this->name,
            'lastname'=>$this->lastname,
            'cellphone'=>$this->cellphone
        ]);
        if ($this->user->bio){
            $this->user->bio()->update([
                'title'=>$this->title,
                'profession'=>$this->profession,
                'about'=>$this->about,
            ]);
        }else{
            $this->user->bio()->create([
                'title'=>$this->title,
                'profession'=>$this->profession,
                'about'=>$this->about,
            ]);
        }


        $this->success=true;
    }

    public function updatePassword(){

        $validated=$this->validate([
            'password' =>'required|string|min:8|confirmed',
            'password_confirmation'=>'required'
        ]);
       $this->user->update([
        'password' => Hash::make($this->password)
       ]);
        $this->password_updated=true;
        $this->resetForm();


    }
    public function resetForm(){
        $this->password=null;
        $this->password_confirmation=null;
    }
}
