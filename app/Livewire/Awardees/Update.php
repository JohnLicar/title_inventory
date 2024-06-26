<?php

namespace App\Livewire\Awardees;

use App\Enums\CivilStatus;
use App\Enums\Reblocking;
use App\Models\Site;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Update extends Component
{

    public Unit $unit;

    public string $site_id;
    public string $phase;
    public string $block;
    public string $lot;
    public string $reblocking_phase;
    public string $reblocking_block;
    public string $reblocking_lot;

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

    public $reblocking = Reblocking::NO_REBLOCKING;

    public function mount()
    {

        $this->unit->load('awardee.spouse');

        $this->first_name = $this->unit->awardee->first_name;
        $this->middle_name = $this->unit->awardee->middle_name;
        $this->last_name = $this->unit->awardee->last_name;
        $this->birthday = $this->unit->awardee->formatted_birthday;
        $this->civil_status = $this->unit->awardee->civil_status;

        $this->spouse_first_name = $this->unit->awardee->spouse?->spouse_first_name;
        $this->spouse_middle_name = $this->unit->awardee->spouse?->spouse_middle_name;
        $this->spouse_last_name = $this->unit->awardee->spouse?->spouse_last_name;
        $this->spouse_birthday = $this->unit->awardee->spouse?->formatted_birthday;

        $this->site_id = $this->unit->id;
        $this->phase = $this->unit?->phase;
        $this->block = $this->unit->block;
        $this->lot = $this->unit->lot;

        $this->reblocking_phase = $this->unit->reblocking_phase ?? '';
        $this->reblocking_block = $this->unit->reblocking_block ?? '';
        $this->reblocking_lot = $this->unit->reblocking_lot ?? '';
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

    public function update()
    {
        $validated = $this->validate();

        DB::transaction(function () use ($validated) {


            // $unit =  Unit::create($validated);

            // $awardee =  $unit->awardee()->create($validated);

            // if ($this->spouse_last_name && $this->spouse_first_name) {
            //     $awardee->spouse()->create($validated);
            // }

            $this->unit->update($validated);

            if ($this->spouse_last_name && $this->spouse_first_name) {
                $this->unit->awardee->spouse()->updateOrCreate(
                    ['awardee_id' => $this->unit->awardee->id],
                    $validated
                );
            }

            $this->unit->awardee()->updateOrCreate(
                ['id' => $this->unit->awardee->id],
                $validated
            );
        });

        session()->flash('success', 'Updating ' . $this->unit->awardee->full_name . ' successfully');

        return redirect()->route('awardees.update', $this->unit);
    }

    public function render()
    {
        return view('livewire.awardees.update');
    }
}
