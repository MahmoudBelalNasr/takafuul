<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\CityExport;
use App\Exports\ContactExport;
use App\Http\Controllers\Controller;
use App\Mail\SendReplyMail;
use App\Models\City;
use App\Models\Contact;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;


class ContactController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:الاتصال بنا', ['only' => ['index', 'getReply', 'postReply', 'delete', 'exportEXCEL',
            'exportCSV', 'downloadPDF']]);
    }

    public function index(){
        $contacts = Contact::all();
        return view('dashboard.contact.index', compact('contacts'));
    }

    public function getReply($id){
        $contact = Contact::find($id);
        if (!$contact)
            return abort(404);
        return view('dashboard.contact.reply', compact('contact'));
    }

    public function postReply(Request $request){
        $rules = [
            'message' => 'required|min:30',
        ];
        $error_messages =[
            'message.required' => 'برجاء كتابة رسالتك',
            'message.min' => 'الرسالة يجب أن تكون 30 حرف على الأقل',
        ];
        $validator = Validator::make($request->all(), $rules , $error_messages);
        if ($validator ->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = array(
            'email'      =>  $request->email,
            'message'   =>   $request->message
        );

        Mail::to($request->input('email'))->send(new SendReplyMail($data));
        toast('تم إرسال الرد بنجاح','success');
        return redirect()->route('contact.index');
    }

    public function delete($id){
        $contact = Contact::find($id);
        if (!$contact)
            return abort(404);
        $contact->delete();
        toast('تم حذف الرسالة بنجاح','success');
        return redirect()->back();
    }

    public function exportEXCEL()
    {
        return Excel::download(new ContactExport, 'contact-us.xlsx');
    }

    public function exportCSV()
    {
        return Excel::download(new ContactExport, 'contact-us.csv');
    }

    public function downloadPDF(){
        $contacts = Contact::all();
        $pdf = PDF::loadview('dashboard.contact.index', compact('contacts'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('contact-us.pdf');
    }
}
