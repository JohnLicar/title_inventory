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
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    #[Validate]
    public string $last_name;
    public string $middle_name;
    public string $first_name;
    public string $birthday;
    public string $civil_status;

    public string $spouse_last_name;
    public string $spouse_middle_name;
    public string $spouse_first_name;
    public string $spouse_birthday;

    public string $site_id;
    public string $phase;
    public string $block;
    public string $lot;
    public string $reblocking_phase;
    public string $reblocking_block;
    public string $reblocking_lot;

    public $reblocking = Reblocking::NO_REBLOCKING;



    public function rules()
    {
        return [
            'last_name' => 'required|max:255',
            'middle_name' => 'nullable|max:255',
            'first_name' => 'required|max:255',
            'birthday' => 'required|date_format:Y-m-d',
            'civil_status' => ['required', new Enum(CivilStatus::class)],

            'spouse_last_name' => 'required_unless:civil_status,Single|max:255',
            'spouse_middle_name' => 'nullable|max:255',
            'spouse_first_name' => 'required_unless:civil_status,Single|max:255',
            'spouse_birthday' => 'required_unless:civil_status,Single|max:255|nullable|date_format:Y-m-d',

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
            $awardee =  Awardee::create($validated);

            if ($this->spouse_last_name && $this->spouse_first_name) {
                $awardee->spouse()->create($validated);
            }

            $awardee->unit()->create($validated);

            session()->flash('success', 'Storing  ' . $this->awardee->full_name . ' info successful');
        });


        return redirect()->route('awardees.index');
    }

    public function render()
    {
        return view('livewire.awardees.create');
    }
}
