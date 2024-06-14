<?php

namespace App\Livewire\Awardees;

use App\Imports\AwardeeImport;
use App\Models\Awardee;
use App\Models\Site;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{

    use WithPagination, WithFileUploads;

    #[Url()]
    public $search = '';


    public string $site_id = '';
    public string $phase = '';
    public string $block = '';
    public string $lot = '';

    #[Validate('required|mimes:csv,xlsx,xls|max:10000')]
    public $file;


    #[Computed()]
    public function sites()
    {
        return Site::get();
    }

    public function render()
    {
        $awardees = Awardee::query()
            ->filter(
                $this->search,
                $this->site_id,
                $this->phase,
                $this->block,
                $this->lot
            )
            ->with('spouse', 'unit.site')
            ->latest()
            ->paginate(10, ['*'], 'awardees');

        return view('livewire.awardees.index', compact('awardees'));
    }

    public function importFile()
    {
        $this->validate();
        Excel::import(new AwardeeImport, $this->file);

        $this->dispatch('close-modal', 'upload-excel');

        session()->flash('success', 'Uploading  ' . $this->file->getClientOriginalName() . ' successful');
        $this->resetFile();
    }

    public function resetFile()
    {
        $this->reset('file');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
