<?php

namespace App\Http\Livewire;

use App\Models\Recieve;
use Livewire\Component;

class RecieveSearch extends Component
{
    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.recieve-search', [
            'recieves' => Recieve::where('user_id', 'like', '%'.$this->search.'%')->paginate(5),
        ]);
    }
}
