<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'site' => 'NORTH HILL ARBOURS',
                'location' => 'North Hill Arbours, Brgy. 106 Sto. Niño, Tacloban City',
                'description' => 'North Hill Arbours Residents, Tacloban City',
                'type' => 'NHA'
            ],
            [
                'site' => 'ST. FRANCIS VILLAGE',
                'location' => 'St. Francis Village, Brgy. 105 Suhi, Tacloban City',
                'description' => 'St. Francis Village, Brgy. 105 Suhi, Tacloban City',
                'type' => 'NHA'
            ],
            [
                'site' => 'GUADALUPE HEIGHTS',
                'location' => 'Guadalupe Heights Village, Brgy. 105 San Isidro, Tacloban City',
                'description' => 'Guadalupe Heights Village, Brgy. 105 San Isidro, Suhi, Tacloban City',
                'type' => 'NHA'
            ],
            [
                'site' => 'GREENDALE RESIDENCE',
                'location' => 'Barangay 105, San Isidro, Suhi, Tacloban City',
                'description' => 'Barangay 105, San Isidro, Suhi, Tacloban City',
                'type' => 'NHA'
            ],
            [
                'site' => 'RIDGEVIEW PARK',
                'location' => 'Brgy. 97 Ridge View Park Cabalawan, Tacloban City',
                'description' => 'Brgy. 97 Ridge View Park Cabalawan, Tacloban City',
                'type' => 'NHA'
            ],
            [
                'site' => 'SALVACION HEIGHTS',
                'location' => 'Brgy. 104 Salvacion , Tacloban City',
                'description' => 'Brgy. 104 Salvacion , Tacloban City, Tacloban City',
                'type' => 'NHA'
            ],
            [
                'site' => 'VILLA DIANA',
                'location' => 'Brgy. 101 New Kawayan, Tacloban City, Tacloban City',
                'description' => 'Brgy. 101 New Kawayan, Tacloban City, Tacloban City',
                'type' => 'NHA'
            ],
            [
                'site' => 'VILLA SOFIA',
                'location' => 'Brgy. 108 Tagpuro , Tacloban City, Tacloban City',
                'description' => 'Brgy. 108 Tagpuro , Tacloban City, Tacloban City',
                'type' => 'NHA'
            ],
            [
                'site' => 'NEW HOPE VILLAGE',
                'location' => 'Brgy. 107 Sta. Elena, Tacloban City, Tacloban City',
                'description' => 'Brgy. 107 Sta. Elena, Tacloban City, Tacloban City',
                'type' => 'NHA'
            ],
            [
                'site' => 'KNIGHTSRIDGE RESIDENCE',
                'location' => 'Brgy. 98 Camansihay, Tacloban City, Tacloban City',
                'description' => 'Brgy. 98 Camansihay, Tacloban City, Tacloban City',
                'type' => 'NHA'
            ],
            [
                'site' => 'HABITAT VILLAGE (LOT 4428)',
                'location' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'description' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'type' => 'NGO'
            ],
            [
                'site' => 'HABITAT VILLAGE (LOT 4466)',
                'location' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'description' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'type' => 'NGO'
            ],
            [
                'site' => 'GMA KAPUSO VILLAGE',
                'location' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'description' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'type' => 'NGO'
            ],
            [
                'site' => 'GPICE VILLAGE',
                'location' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'description' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'type' => 'NGO'
            ],
            [
                'site' => 'CORE SHELTER',
                'location' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'description' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'type' => 'NGO'
            ],
            [
                'site' => 'GLOBAL MEDIC',
                'location' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'description' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'type' => 'NGO'
            ],
            [
                'site' => 'SOS NORTH VILLAGE',
                'location' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'description' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'type' => 'NGO'
            ],
            [
                'site' => 'AEROVILLE',
                'location' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'description' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'type' => 'Multi Part'
            ],
            [
                'site' => 'LION\'S VILLAGE',
                'location' => 'Brgy. 97 Cabalawan, Tacloban City, Tacloban City',
                'description' => 'Brgy. 97 Cabalawan, Tacloban City, Tacloban City',
                'type' => 'NGO'
            ],
            [
                'site' => 'UNDP',
                'location' => 'Brgy. 97 Cabalawan, Tacloban City, Tacloban City',
                'description' => 'Brgy. 97 Cabalawan, Tacloban City, Tacloban City',
                'type' => 'NGO'
            ],
            [
                'site' => 'CRS',
                'location' => 'Brgy. 93 Bagacay, Tacloban City, Tacloban City',
                'description' => 'Brgy. 93 Bagacay, Tacloban City, Tacloban City',
                'type' => 'NGO'
            ],
            [
                'site' => 'POPE FRANCIS',
                'location' => 'Brgy. 99 Diit, Tacloban City, Tacloban City',
                'description' => 'Brgy. 99 Diit, Tacloban City, Tacloban City',
                'type' => 'NGO'
            ],
            [
                'site' => 'SM CARES',
                'location' => 'Brgy. 101 New Kawayan , Tacloban City',
                'description' => 'Brgy. 101 New Kawayan , Tacloban City',
                'type' => 'NGO'
            ],
            [
                'site' => 'COMMUNITY OF HOPE (OB)',
                'location' => 'Brgy. 103 Palanog , Tacloban City',
                'description' => 'Brgy. 103 Palanog , Tacloban City',
                'type' => 'NGO'
            ],

        ];

        foreach ($data as $housingSite) {
            Site::create(
                $housingSite
            );
        }
    }
}
