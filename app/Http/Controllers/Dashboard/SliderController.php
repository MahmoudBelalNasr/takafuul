<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:الاسلايدر', ['only' => ['index', 'create', 'store', 'edit', 'update', 'delete']]);
    }

    public function index(){
        $sliders = Slider::all();
        return view('dashboard.home.slider.index', compact('sliders'));
    }


    public function create(){
        return view('dashboard.home.slider.create');
    }


    public function store(Request $request){
        $rules = [
            'text' => 'required',
            'image' => 'required',
        ];
        $error_messages =[
            'text.required' => 'أدخل النص',
            'image.required' => 'تحميل صورة',
        ];
        $validator = Validator::make($request->all(), $rules , $error_messages);
        if ($validator ->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $slider = new Slider();
        $slider->text = $request->input('text');
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('uploads/images/', $file_name);
            $slider->image = $file_name;
        }
        $slider->save();
        toast('تم حفظ الاسلايدر بنجاح','success');
        return redirect()->route('slider.index');
    }


    public function edit($id){
        $slider = Slider::find($id);
        if (!$slider)
            return abort(404);
        return view('dashboard.home.slider.edit', compact('slider'));
    }


    public function update(Request $request, $id){
        $rules = [
            'text' => 'required',
        ];
        $error_messages =[
            'text.required' => 'أدخل النص',
        ];
        $validator = Validator::make($request->all(), $rules , $error_messages);
        if ($validator ->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $slider = Slider::find($id);
        if (!$slider)
            return abort(404);

        $slider->text = $request->input('text');
        if ($request->hasFile('image'))
        {
            $destination = 'uploads/images/'.$slider->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('uploads/images/', $file_name);
            $slider->image = $file_name;
        }
        $slider->update();
        toast('تم تعديل الاسلايدر بنجاح','success');
        return redirect()->route('slider.index');
    }


    public function delete($id){
        $slider = Slider::find($id);
        if (!$slider)
            return abort(404);
        $slider->delete();
        toast('تم حذف الاسلايدر بنجاح','success');
        return redirect()->route('slider.index');
    }


}
