<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VisitsSubmissions>
 */
class VisitsSubmissionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_name' =>fake()->randomElement(['Prywatna','Przedszkolna','Firmowa']),
            'visit_name' =>fake()->randomElement(['SzybkaWizyta','Standard','EkstraM','Long','SzybkiPrezent']),
            'length_visit' => fake()->randomElement(['10','20','30','60']),
            'visit_qty' => fake()->randomElement(['1','2','3','6']),
            'facility_name' => fake(locale:'pl_PL')->company(),
            'client_name' => fake(locale:'pl_PL')->name(),
            'phone' => fake(locale:'pl_PL')->phoneNumber(),
            'email' => fake(locale:'pl_PL')->unique()->safeEmail(),
            'visit_date' => fake()->date(),
            'preffered_time' => fake()->time(),
            'interval_hours' => fake()->randomElement(['09.00 - 11.00','13.00 - 15.00','18.00 - 20.00','20.30 - 22.30']),
            'guaranted' => fake()->randomElement(['yes','no']),
            'price' => fake()->randomElement(['230','360','550','780']),
            'additional_information' => fake(locale:'pl_PL')->text(),
            'street_address' => fake(locale:'pl_PL')->streetAddress(),
            'street_number' => fake(locale:'pl_PL')->buildingNumber(),
            'flat_number' => fake(locale:'pl_PL')->buildingNumber(),
            'zipcode' => fake(locale:'pl_PL')->postcode(),
            'district' => fake()->randomElement(['bemowo','ursynów','załęże','rudniki']),
            'city' => fake(locale:'pl_PL')->city(),
            'voivodeship' => fake()->randomElement(['mazowieckie','podkarpackie','łódzkie','wielkopolskie']),
            'counties' => fake(locale:'pl_PL')->country(),
            'drive_fee' => fake(locale:'pl_PL')->numberBetween(10,50),
            'accepted_statue' => fake()->randomElement(['yes','no']),
            'accepted_marketing' => fake()->randomElement(['yes','no']),
            'remind_visit' => fake()->randomElement(['yes','no']),
            'status' => fake()->randomElement(['new', 'not_paid','paid','done','cancelled','reserve_list','complaint']),
        ];
    }
}
