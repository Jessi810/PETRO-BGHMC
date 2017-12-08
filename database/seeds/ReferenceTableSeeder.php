<?php

use App\Trainer;
use App\Reference;
use Illuminate\Database\Seeder;

class ReferenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trainer1 = Trainer::find(1);
        $trainer2 = Trainer::find(2);

        $ref = new Reference();
        $ref->name = 'Jin Mishima';
        $ref->company_name = 'Mishima Inc.';
        $ref->position = 'CEO';
        $ref->mobile = '777 7777';
        $ref->email = 'jin@mail.com';
        $ref->trainer()->associate($trainer1)->save();
        
        $ref = new Reference();
        $ref->name = 'Hei Kazama';
        $ref->company_name = 'Mishima Inc.';
        $ref->position = 'CEO';
        $ref->mobile = '123 4567';
        $ref->email = 'hei@mail.com';
        $ref->trainer()->associate($trainer1)->save();
    }
}
