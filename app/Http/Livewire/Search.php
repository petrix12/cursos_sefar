<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class Search extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.search');
    }

    // Esta función es una propiedad computada: get[Results]Property
    // Se le invoca desde la vista como $this->results
    public function getResultsProperty(){
        return Course::where('title', 'LIKE', '%' . $this->search . '%')
                ->where('status',3)
                ->take(8)
                ->get();
    }
}