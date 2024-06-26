<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VisitsSubmissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('visits_submissions')->insert([
            [
                'type_name' =>'Prywatna',
                'visits_type_id' =>'1',
                'visit_name' => 'SzybkiPrezent',
                'visits_name_id' => '1',
                'length_visit' => '10',
                'visit_qty' => '2',
                'client_firstname' => 'Jan',
                'client_lastname' => 'Kowalski',
                'phone' => '500111222',
                'email' => 'mikolaje@miko.com',
                'visit_date' => '2023-12-24',
                'preffered_time' => '09.15',
                'interval_hours' => '09.00 - 11.00',
                'guaranted' => 'no',
                'price_net' => '100',
                'price_gross' => '123',
                'additional_information' => 'Proszę o wizytę grubego Mikołaja',
                'street_address' => 'Sucharskiego',
                'street_number' => '12',
                'flat_number' => '14',
                'zipcode' => '35-328',
                'district' => 'bemowo',
                'city' => 'Warszawa',
                'voivodeship' => 'mazowieckie',
                'drive_fee' => '50',
                'accepted_statue' => 'yes',
                'accepted_marketing' => 'no',
                'remind_visit' => 'yes',
                'status' => 'new',
            ]
        ]);
    }
}
