<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class SettingController extends Controller
{
    public function index(){
        $setting_title = Setting::where('key', 'title')->select('value')->first();
        $setting_keywords = Setting::where('key', 'keywords')->select('value')->first();
        $setting_description = Setting::where('key', 'description')->select('value')->first();
        $setting_email_manage = Setting::where('key', 'email_manage')->select('value')->first();
        $setting_email_message = Setting::where('key', 'email_message')->select('value')->first();
        $setting_phone = Setting::where('key', 'phone')->select('value')->first();
        $setting_whatsapp = Setting::where('key', 'whatsapp')->select('value')->first();
        $setting_video = Setting::where('key', 'video')->select('value')->first();
        $setting_google = Setting::where('key', 'google')->select('value')->first();
        return view('dashboard.setting.index', compact('setting_title', 'setting_keywords', 'setting_description', 'setting_email_manage',
        'setting_email_message', 'setting_phone', 'setting_whatsapp', 'setting_video', 'setting_google'));
    }


    public function update(Request $request){
        DB::table('settings')->where(['key' => 'title'])->update([
            'value' => $request->input('title'),
        ]);
        DB::table('settings')->where(['key' => 'keywords'])->update([
            'value' => $request->input('keywords'),
        ]);
        DB::table('settings')->where(['key' => 'description'])->update([
            'value' => $request->input('description'),
        ]);
        DB::table('settings')->where(['key' => 'email_manage'])->update([
            'value' => $request->input('email_manage'),
        ]);
        DB::table('settings')->where(['key' => 'email_message'])->update([
            'value' => $request->input('email_message'),
        ]);
        DB::table('settings')->where(['key' => 'phone'])->update([
            'value' => $request->input('phone'),
        ]);
        DB::table('settings')->where(['key' => 'whatsapp'])->update([
            'value' => $request->input('whatsapp'),
        ]);
        DB::table('settings')->where(['key' => 'video'])->update([
            'value' => $request->input('video'),
        ]);
        DB::table('settings')->where(['key' => 'video'])->update([
            'value' => $request->input('video'),
        ]);
        DB::table('settings')->where(['key' => 'google'])->update([
            'value' => $request->input('google'),
        ]);

        toast('تم حفظ الاعدادات بنجاح','success');
        return redirect()->back();
    }
}
