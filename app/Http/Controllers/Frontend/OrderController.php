<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function store(Request $request){
        $rules = [
            'username' => 'required',
            'identity_number' => 'required|max:14|min:14|unique:orders',
            'birth_date' => 'required',
            'phone1' => 'required|max:11|min:11|unique:orders',
            'city_id' => 'required',
            'title' => 'required',
            'conditions' => 'accepted',
        ];
        $error_messages =[
            'username.required' => 'برجاء ادخال الاسم ثلاثى ',
            'identity_number.required' => 'برجاء إدخال رقم الهوية',
            'identity_number.max' => 'برجاء إدخال رقم الهوية المكون من 14 رقم',
            'identity_number.min' => 'برجاء إدخال رقم الهوية المكون من 14 رقم',
            'identity_number.unique' => 'هذا الرقم مستخدم بالفعل',
            'birth_date.required' => 'برجاء إدخال تاريخ الميلاد',
            'phone1.required' => 'برجاء إدخال رقم الجوال بشكل صحيح',
            'phone1.unique' => 'هذا الرقم مستخدم بالفعل',
            'phone1.max' => 'برجاء إدخال رقم الجوال المكون من 11 رقم',
            'phone1.min' => 'برجاء إدخال رقم الجوال المكون من 11 رقم',
            'city_id.required' => 'برجاء اختيار المدينة',
            'title.required' => 'برجاء ادخال العنوان بشكل صحيح',
            'conditions.accepted' => 'برجاء الموافقة على الشؤوط والاحكام ',
        ];
        $validator = Validator::make($request->all(), $rules , $error_messages);
        if ($validator ->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $order = new Order();
        $order->username = $request->input('username');
        $order->identity_number = $request->input('identity_number');
        $order->birth_date = $request->input('birth_date');
        $order->phone1 = $request->input('phone1');
        $order->city_id = $request->input('city_id');
        $order->title = $request->input('title');
        $order->save();
        Alert::info('تم ارسال طلبك بنجاح', 'سيتم التواصل معك بأقرب وقت');
        return redirect()->back();
    }
}
