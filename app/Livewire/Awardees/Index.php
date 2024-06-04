<?php

namespace App\Livewire\Awardees;

use App\Models\Awardee;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $search = '';
    public function render()
    {
        $awardees = Awardee::query()
            ->whereLike(['first_name', 'middle_name', 'last_name'], $this->search)
            ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ['%' . $this->search . '%'])
            ->orWhereRaw("CONCAT(last_name, ' ', first_name) LIKE ?", ['%' . $this->search . '%'])
            ->with('spouse')
            ->paginate(10, ['*'], 'awardees');

        return view('livewire.awardees.index', compact('awardees'));
    }
}
