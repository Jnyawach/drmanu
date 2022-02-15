<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Response extends Component

{
    public $message;
    public $response;
    protected $rules=([
        'response'=>'required|min:3|max:3000'
    ]);
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createResponse(){

        $message=Contact::findOrFail($this->message->id);

        $this->validate();
        $message->update([
            'response'=>$this->response,
            'user_id'=>Auth::id(),
        ]);
        return redirect(request()->header('Referer'));
    }
    public function render()
    {
        return view('livewire.response');
    }
}
