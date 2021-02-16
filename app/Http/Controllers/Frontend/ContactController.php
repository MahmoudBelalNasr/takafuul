<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
Use Alert;


class ContactController extends Controller
{
    public function store(Request $request){
        $rules = [
            'name' => 'required|min:10',
            'email' => 'required|email|unique:contact_us',
            'phone' => 'required|max:11|min:11|unique:contact_us',
            'title' => 'required',
            'body' => 'required',

        ];
        $error_messages =[
            'name.required' => 'برجاء ادخال الاسم ثلاثى ',
            'name.min' => 'يجب ألا يقل الاسم عن 10 حروف',
            'email.required' => 'يجب ادخال البريد الالكترونى',
            'email.email' => 'برجاء ادخال بريد الالكترونى صحيح',
            'email.unique' => 'هذا البريد الالكترونى مستخدم مسبقا',
            'phone.required' => 'يجب ادخال رقم جوال للتواصل',
            'phone.min' => 'برجاء إدخال رقم الجوال المكون من 11 رقم',
            'phone.max' => 'برجاء إدخال رقم الجوال المكون من 11 رقم',
            'phone.unique' => 'برجاء إدخال رقم الجوال بشكل صحيح',
            'title.required' => 'يجب ادخال عنوان للرسالة',
            'body.required' => 'يجب ادخال محتوى للرسالة',
        ];
        $validator = Validator::make($request->all(), $rules , $error_messages);
        if ($validator ->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $contacts = new Contact();
        $contacts->name = $request->input('name');
        $contacts->email = $request->input('email');
        $contacts->phone = $request->input('phone');
        $contacts->title = $request->input('title');
        $contacts->body = $request->input('body');
        $contacts->save();
        Alert::info('تم ارسال رسالتك بنجاح', 'سيتم التواصل معك فى اقرب وقت');
        return redirect()->back();
    }
}
