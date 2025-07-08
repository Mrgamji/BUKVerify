<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Students;

class OrganizationView extends Component
{
    public $search = '';
    public $students = [];
    public $hasSearched = false;

    public function searchStudent()
    {
        $this->hasSearched = true;

        $this->students = Students::when($this->search, function ($query) {
            $query->where('first_name', 'like', "%{$this->search}%")
                  ->orWhere('last_name', 'like', "%{$this->search}%")
                  ->orWhere('matriculation_number', 'like', "%{$this->search}%")
                  ->orWhere('email', 'like', "%{$this->search}%");
        })->get();
    }

    public function render()
    {
        return view('livewire.organization-view');
    }
}
