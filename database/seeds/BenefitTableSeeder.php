<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BenefitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('benefits')->insert(array(
            array(
                'text' => 'تغطي جميع التخصصات الطبية',
                'icon' => 'flaticon-heart'
            ),
            array(
                'text' => 'خصم على العمليات الجراحية والتجميلية',
                'icon' => 'flaticon-surgery'
            ),
            array(
                'text' => 'خصم على كافة الفحوصات والتحاليلً',
                'icon' => 'flaticon-scientist'
            ),
            array(
                'text' => 'خصم على الولادة الطبيعية والقيصرية ومتابعة الحمل',
                'icon' => 'flaticon-maternity'
            ),
            array(
                'text' => 'تخصم على تصحيح النظر بالليزك والليزر والنظارات الشمسية والطبية',
                'icon' => 'flaticon-vision'
            ),
            array(
                'text' => 'خصم على العناية بالبشرة',
                'icon' => 'flaticon-makeup-1'
            ),
            array(
                'text' => 'خصم على جميع خدمات الاسنان الحشو والتركيبات وتقويم الاسنان حتى التجميلية',
                'icon' => 'flaticon-braces'
            ),
        ));
    }
}
