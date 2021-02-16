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
        $this->call(SliderTableSeeder::class);
        $this->call(AdvantageTableSeeder::class);
        $this->call(BenefitTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(SettingTableSeeder::class);
    }
}
