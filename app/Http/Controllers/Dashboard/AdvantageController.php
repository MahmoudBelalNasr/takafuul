<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdvantageController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:مميزاتنا', ['only' => ['index', 'create', 'store', 'edit', 'update', 'delete']]);
    }

    public function index(){
        $advantages = Advantage::all();
        return view('dashboard.home.advantage.index', compact('advantages'));
    }

    public function create(){
        return view('dashboard.home.advantage.create');
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
        $advantages = new Advantage();
        $advantages->text = $request->input('text');
        $advantages->icon = $request->input('icon');
        $advantages->save();
        toast('تمت الاضافة الى مميزاتنا بنجاح','success');
        return redirect()->route('advantage.index');
    }

    public function edit($id){
        $advantage = Advantage::find($id);
        if (!$advantage)
            return abort(404);
        return view('dashboard.home.advantage.edit', compact('advantage'));
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

        $advantage = Advantage::find($id);
        if (!$advantage)
            return abort(404);

        $advantage->text = $request->input('text');
        $advantage->icon = $request->input('icon');
        $advantage->update();
        toast('تم تعديل مميزاتنا بنجاح','success');
        return redirect()->route('advantage.index');
    }


    public function destroy($id){
        $advantage = Advantage::find($id);
        if (!$advantage)
            return abort(404);
        $advantage->delete();
        toast('تم الحذف من مميزاتنا بنجاح','success');
        return redirect()->route('advantage.index');
    }
}
