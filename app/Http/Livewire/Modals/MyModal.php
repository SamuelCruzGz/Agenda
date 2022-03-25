<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;


class MyModal extends Component
{
    public $show;

    public function mount() {
        $this->show = false;
    }

    public function doShow() {
        $this->show = true;
    }

    public function doClose(){
        $this->show=false;
    }

    public function modalDisplay(){
        dd(Controller::getData());
        if(Controller::getData()==false ){
            $this->doShow();
        }else{
            $this->doClose();
        }
    }

    public function render()
    {
        return view('livewire.modals.my-modal');
    }
}
