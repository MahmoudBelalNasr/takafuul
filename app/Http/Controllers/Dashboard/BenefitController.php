<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BenefitController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:فوائدنا', ['only' => ['index', 'create', 'store', 'edit', 'update', 'delete']]);
    }

    public function index(){
        $benefits = Benefit::all();
        return view('dashboard.home.benefit.index', compact('benefits'));
    }

    public function create(){
        return view('dashboard.home.benefit.create');
    }

    public function store(Request $request){
        $rules = [
            'text' => 'required',
            'icon' => 'required',
        ];
        $error_messages =[
            'text.required' => 'أدخل النص',
            'icon.required' => 'أدخل الايقونة',
        ];
        $validator = Validator::make($request->all(), $rules , $error_messages);
        if ($validator ->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $benefit = new Benefit();
        $benefit->text = $request->input('text');
        $benefit->icon = $request->input('icon');
        $benefit->save();
        toast('تمت الاضافة الى فوائدنا بنجاح','success');
        return redirect()->route('benefit.index');
    }

    public function edit($id){
        $benefit = Benefit::find($id);
        if (!$benefit)
            return abort(404);
        return view('dashboard.home.benefit.edit', compact('benefit'));
    }

    public function update(Request $request ,$id){
        $rules = [
            'text' => 'required',
            'icon' => 'required',
        ];
        $error_messages =[
            'text.required' => 'أدخل النص',
            'icon.required' => 'أدخل الايقونة',
        ];
        $validator = Validator::make($request->all(), $rules , $error_messages);
        if ($validator ->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $benefit = Benefit::find($id);
        if (!$benefit)
            return abort(404);

        $benefit->text = $request->input('text');
        $benefit->icon = $request->input('icon');
        $benefit->update();
        toast('تم تعديل فوادئدنا بنجاح بنجاح','success');
        return redirect()->route('benefit.index');
    }

    public function delete($id){
        $benefit = Benefit::find($id);
        if (!$benefit)
            return abort(404);
        $benefit->delete();
        toast('تم الحذف من فؤائدنا بنجاح','success');
        return redirect()->route('benefit.index');
    }
}
