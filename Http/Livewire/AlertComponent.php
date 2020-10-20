<?php

namespace Modules\Factory\Http\Livewire;

use Livewire\Component;

class AlertComponent extends Component
{

    protected $listeners = ['alertComponentSuccess', 'messageDanger', 'messageSuccess'];

    public function alertComponentSuccess($message){
        session()->flash('alert-component-success', $message);
    }

    public function messageDanger($message){
        session()->flash('message-danger', $message);
    }

    public function messageSuccess($message){
        session()->flash('message-success', $message);
    }

    public function render()
    {
        return view('factory::livewire.alert-component');
    }
}
