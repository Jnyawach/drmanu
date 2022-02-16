<?php

namespace App\Http\Livewire;

use App\Models\Subscription;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class SubscribeForm extends Component

{
    public $name;
    public $email;
    public $success=false;
    protected $rules=[
        'name'=>'string|max:50|required',
        'email'=>'required|unique:subscriptions|email|string'
    ];
    protected $messages = [
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
        'email.unique'=>'You have an active subscription to Dr. Manu'
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.subscribe-form');
    }
    public function userSubscribe(){

        $this->validate();
        $subscription=Subscription::create([
            'email'=>$this->email,
            'name'=>$this->name
        ]);

        Mail::send('mailing.subscribe', ['mess'=>$subscription], function ($message) use($subscription){
            $message->to($subscription->email);
            $message->from('nyawach41@gmail.com');
            $message->subject('Dr. Manu Subscription');

        });
        $this->success="Thank you for subscribing to our Newsletter";
        $this->clearForm();

    }
    public  function clearForm(){
        $this->name=null;
        $this->email=null;
        $this->subject=null;
        $this->message=null;
    }

}
