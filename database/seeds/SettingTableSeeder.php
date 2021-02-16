<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert(array(
            array(
                'key' => 'title',
                'value' => 'تكافل العربية',
                'created_at' => \Carbon\Carbon::now()
            ),
            array(
                'key' => 'keywords',
                'value' => 'تكافل العربية للرعاية الصحية',
                'created_at' => \Carbon\Carbon::now()
            ),
            array(
                'key' => 'description',
                'value' => 'تكافل العربية',
                'created_at' => \Carbon\Carbon::now()
            ),
            array(
                'key' => 'email_manage',
                'value' => 'support@takafulcard.com',
                'created_at' => \Carbon\Carbon::now()
            ),
            array(
                'key' => 'email_message',
                'value' => 'ridaa6834@gmail.com',
                'created_at' => \Carbon\Carbon::now()
            ),
            array(
                'key' => 'phone',
                'value' => '0534526709',
                'created_at' => \Carbon\Carbon::now()
            ),
            array(
                'key' => 'whatsapp',
                'value' => '966594313566',
                'created_at' => \Carbon\Carbon::now()
            ),
            array(
                'key' => 'video',
                'value' => 'https://www.youtube.com/embed/WE6TbidDKh4',
                'created_at' => \Carbon\Carbon::now()
            ),
            array(
                'key' => 'google',
                'value' => '',
                'created_at' => \Carbon\Carbon::now()
            )

        ));
    }
}
