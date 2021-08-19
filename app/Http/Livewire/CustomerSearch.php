<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class CustomerSearch extends Component
{
    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.customer-search', [
            'users' => User::where('name', 'like', '%'.$this->search.'%')->paginate(5),
        ]);
    }
}
