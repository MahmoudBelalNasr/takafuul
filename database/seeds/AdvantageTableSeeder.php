<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvantageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('adnvantages')->insert(array(
            array(
                'text' => 'تشمل جميع فئات المجتمع  حكومين ـ قطاع خاص ـ مقيمين ـ زائرين ـ عمره او حج',
                'icon' => 'flaticon-team'
            ),
            array(
                'text' => 'السعر موحد للجميع وعدم ارتفاعها  لكبار السن ومعاناتهم من اسعار بطاقات التأمين',
                'icon' => 'flaticon-money-bag'
            ),
            array(
                'text' => 'يمكن استخدام البطاقة مباشرةً',
                'icon' => 'flaticon-check-mark'
            ),
            array(
                'text' => 'يمكن استخدام البطاقة مباشرةً عند الحصول عليها',
                'icon' => 'flaticon-id-card-2'
            ),
            array(
                'text' => 'لا يوجد حد ائتماني لاستخدام البطاقة',
                'icon' => 'flaticon-profit'
            ),
            array(
                'text' => 'بطاقة تكافل تقدم خدمات انسانية واقتصادية للمجتمع تتوافق مع رؤية 2030',
                'icon' => 'flaticon-social-care'
            )
        ));
    }
}
