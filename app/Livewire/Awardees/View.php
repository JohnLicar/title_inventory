<?php

namespace App\Livewire\Awardees;

use App\Enums\CivilStatus;
use App\Enums\Reblocking;
use App\Models\Awardee;
use App\Models\Site;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Livewire\Attributes\Computed;
use Livewire\Component;

class View extends Component
{
    public Awardee $awardee;

    public $first_name;
    public $middle_name;
    public $last_name;
    public $birthday;
    public $civil_status;

    public $spouse_first_name;
    public $spouse_middle_name;
    public $spouse_last_name;
    public $spouse_birthday;
    public $spouse_civil_status;

    public string $site;
    public string $phase;
    public string $block;
    public string $lot;
    public string $reblocking_phase;
    public string $reblocking_block;
    public string $reblocking_lot;

    public function mount()
    {
        $this->awardee->load('spouse', 'unit.site');

        $this->first_name = $this->awardee->first_name;
        $this->middle_name = $this->awardee->middle_name;
        $this->last_name = $this->awardee->last_name;
        $this->birthday = $this->awardee->formatted_birthday;
        $this->civil_status = $this->awardee->civil_status;

        $this->spouse_first_name = $this->awardee->spouse?->spouse_first_name;
        $this->spouse_middle_name = $this->awardee->spouse?->spouse_middle_name;
        $this->spouse_last_name = $this->awardee->spouse?->spouse_last_name;
        $this->spouse_birthday = $this->awardee->spouse?->formatted_birthday;

        $this->site = $this->awardee->unit->site->site;
        $this->phase = $this->awardee->unit?->phase;
        $this->block = $this->awardee->unit->block;
        $this->lot = $this->awardee->unit->lot;
        $this->reblocking_phase = $this->awardee->unit->reblocking_phase ?? '';
        $this->reblocking_block = $this->awardee->unit->reblocking_block ?? '';
        $this->reblocking_lot = $this->awardee->unit->reblocking_lot ?? '';
    }


    #[Computed()]
    public function sites()
    {
        return Site::get();
    }

    public function render()
    {
        return view('livewire.awardees.view');
    }
}
