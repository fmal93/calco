<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowCategories extends Component
{
    public $message = [];
    public $message2 = [];  

    public function render()
    {
        return view('livewire.show-categories');
    }

    public function mount()
    {
        
    }
}
