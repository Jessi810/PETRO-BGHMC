<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(TrainerTableSeeder::class);
        $this->call(EducationTableSeeder::class);
        $this->call(WorkTableSeeder::class);
        $this->call(CertificationTableSeeder::class);
        $this->call(ReferenceTableSeeder::class);
    }
}
