<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(roleSeed::class);
        $this->call(userSeed::class);
        $this->call(seedSetting::class);
        $this->call(wargaSeed::class);
    }
}
