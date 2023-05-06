<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\contact;
class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::factory()->count(35)->create();    // 追
    }
}
