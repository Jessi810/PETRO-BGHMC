<?php

use Illuminate\Database\Seeder;
use App\Trainer;
use App\Certification;

class CertificationTableSeeder extends Seeder
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

        $cert = new Certification();
        $cert->title = 'Hackathon';
        $cert->description = 'Hackathon';
        $cert->date = date('2017-11-11');
        $cert->trainer()->associate($trainer1)->save();
        
        $cert = new Certification();
        $cert->title = 'PHP & Laravel';
        $cert->description = 'Web development using PHP and Laravel';
        $cert->date = date('2017-11-11');
        $cert->trainer()->associate($trainer2)->save();
    }
}
