<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert(array(
            array(
                'text' => 'نقدم لكم بطاقة تكافل العربية تمنح حاملها خصم على جميع التخصصات الطبية في القطاع الصحي',
                'image' => 'sliderImg.png'
            ),
            array(
                'text' => 'نقدم لكم بطاقة تكافل العربية تمنح حاملها خصم على جميع التخصصات الطبية في القطاع الصحي',
                'image' => 'sliderImg.png'
            )
        ));
    }

}
