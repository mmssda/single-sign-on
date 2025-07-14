<?php

use Illuminate\Database\Seeder;

class OwnerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         factory(App\User::class)->state('owner')->create([
            'email' => 'owner@example.com',
        ]);
    }
}
