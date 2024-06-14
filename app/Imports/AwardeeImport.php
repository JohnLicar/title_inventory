<?php

namespace App\Imports;

use App\Models\Awardee;
use App\Models\Site;
use App\Models\Spouse;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AwardeeImport implements WithHeadingRow, ToCollection
{


    private $sites;

    public function __construct()
    {
        $this->sites = Site::select('id', 'site')->get();
    }

    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {

            $site = $this->sites->where('site', $row['site'])->first();

            $unit = Unit::updateOrCreate([
                'site_id' => $site->id,
                'phase' => $row['phase'] ?? null,
                'block' => $row['block'],
                'lot' => $row['lot'],
                'reblocking_phase' => $row['reblocking_phase'] ?? null,
                'reblocking_block' => $row['reblocking_block'] ?? null,
                'reblocking_lot' => $row['reblocking_lot'] ?? null,
            ], [
                'site_id' => $site->id,
                'phase' => $row['phase'] ?? null,
                'block' => $row['block'],
                'lot' => $row['lot'],
                'reblocking_phase' => $row['reblocking_phase'] ?? null,
                'reblocking_block' => $row['reblocking_block'] ?? null,
                'reblocking_lot' => $row['reblocking_lot'] ?? null,
            ]);

            $awardee = Awardee::updateOrCreate(
                [
                    'unit_id' => $unit->id,
                ],
                [
                    'unit_id' => $unit->id,
                    'first_name' => $row['first_name'],
                    'middle_name' => $row['middle_name'] ?? null,
                    'last_name' => $row['last_name'],
                    'birthday' =>  Carbon::parse($row['birthday'])->format('Y-m-d') ?? null,
                    'civil_status' => $row['civil_status'],
                ]
            );

            if ($awardee) {
                Spouse::create([
                    'awardee_id' => $awardee->id,
                    'spouse_first_name' => $row['spouse_first_name'],
                    'spouse_middle_name' => $row['spouse_middle_name'] ?? null,
                    'spouse_last_name' => $row['spouse_last_name'],
                    'spouse_birthday' =>  Carbon::parse($row['spouse_birthday'])->format('Y-m-d') ?? null,
                ]);
            }
        }
    }
}
