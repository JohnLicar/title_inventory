<?php

namespace App\Livewire\Awardees;

use App\Enums\CivilStatus;
use App\Enums\Reblocking;
use App\Models\Awardee;
use App\Models\Site;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Update extends Component
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

    public string $site_id;
    public string $phase;
    public string $block;
    public string $lot;
    public string $reblocking_phase;
    public string $reblocking_block;
    public string $reblocking_lot;

    public $reblocking = Reblocking::NO_REBLOCKING;

    public function mount()
    {
        $this->awardee->load('spouse', 'unit');

        $this->first_name = $this->awardee->first_name;
        $this->middle_name = $this->awardee->middle_name;
        $this->last_name = $this->awardee->last_name;
        $this->birthday = $this->awardee->formatted_birthday;
        $this->civil_status = $this->awardee->civil_status;

        $this->spouse_first_name = $this->awardee->spouse?->spouse_first_name;
        $this->spouse_middle_name = $this->awardee->spouse?->spouse_middle_name;
        $this->spouse_last_name = $this->awardee->spouse?->spouse_last_name;
        $this->spouse_birthday = $this->awardee->spouse?->formatted_birthday;

        $this->site_id = $this->awardee->unit->id;
        $this->phase = $this->awardee->unit?->phase;
        $this->block = $this->awardee->unit->block;
        $this->lot = $this->awardee->unit->lot;

        $this->reblocking_phase = $this->awardee->unit->reblocking_phase ?? '';
        $this->reblocking_block = $this->awardee->unit->reblocking_block ?? '';
        $this->reblocking_lot = $this->awardee->unit->reblocking_lot ?? '';
    }

    public function rules()
    {
        return [
            'last_name' => 'required|max:255',
            'middle_name' => 'nullable|max:255',
            'first_name' => 'required|max:255',
            'birthday' => 'required|date|max:255',
            'civil_status' => ['required', new Enum(CivilStatus::class)],

            'spouse_last_name' => 'required_unless:civil_status,Single|max:255',
            'spouse_middle_name' => 'nullable|max:255',
            'spouse_first_name' => 'required_unless:civil_status,Single|max:255',
            'spouse_birthday' => 'required_unless:civil_status,Single|max:255|nullable',

            'reblocking' => ['required', new Enum(Reblocking::class)],

            'site_id' => 'required|exists:sites,id',
            'phase' => 'nullable|max:255',
            'block' => 'required|max:255',
            'lot' => 'required|max:255',
            'reblocking_phase' => 'nullable',
            'reblocking_block' => Rule::requiredIf($this->reblocking == Reblocking::REBLOCKING),
            'reblocking_lot' => Rule::requiredIf($this->reblocking == Reblocking::REBLOCKING),
        ];
    }

    #[Computed()]
    public function sites()
    {
        return Site::get();
    }

    public function store()
    {
        $validated = $this->validate();

        DB::transaction(function () use ($validated) {
            $this->awardee->update($validated);

            if ($this->spouse_last_name && $this->spouse_first_name) {
                $this->awardee->spouse()->updateOrCreate(
                    ['awardee_id' => $this->awardee->id],
                    $validated
                );
            }

            $this->awardee->unit()->updateOrCreate(
                ['awardee_id' => $this->awardee->id],
                $validated
            );
        });

        session()->flash('success', 'Updating ' . $this->awardee->full_name . ' successfully');

        return redirect()->route('awardees.update', $this->awardee);
    }

    public function render()
    {
        return view('livewire.awardees.update');
    }
}
