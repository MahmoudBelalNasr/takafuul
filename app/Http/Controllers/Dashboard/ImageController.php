<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function index(){
        $images = Image::all();
        return view('dashboard.attachment.image.index', compact('images'));
    }

    public function create(){
        return view('dashboard.attachment.image.create');
    }

    public function store(Request $request){
        $rules = [
            'upload_img' => 'required|mimes:jpg,jpeg,png,webp',
        ];
        $error_messages =[
            'upload_img.required' => 'برجاء تحميل صورة',
        ];
        $validator = Validator::make($request->all(), $rules , $error_messages);
        if ($validator ->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = new Image();
        $data->user_id = Auth::user()->id;

        if ($request->hasFile('upload_img')){
            $file = $request->file('upload_img');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('uploads/images_library/', $file_name);
            $data->image = $file_name;
        }
        $data->save();
        toast('تم اضافة الصورة بنجاح','success');
        return redirect()->route('image.index');
    }

    public function edit($id){
        $image = Image::find($id);
        if (!$image)
            return abort(404);
        return view('dashboard.attachment.image.edit', compact('image'));
    }

    public function update(Request $request, $id){
        $rules = [
            'upload_img' => 'required|mimes:jpg,jpeg,png,webp',
        ];
        $error_messages =[
            'upload_img.required' => 'برجاء تحميل صورة',
        ];
        $validator = Validator::make($request->all(), $rules , $error_messages);
        if ($validator ->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $image = Image::find($id);
        if (!$image)
            return abort(404);
        if ($request->hasFile('upload_img')){
            $destination = 'uploads/images_library/'.$image->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('upload_img');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('uploads/images_library/', $file_name);
            $image->image = $file_name;
        }
        $image->update();
        toast('تم تعديل الصورة بنجاح','success');
        return redirect()->route('image.index');
    }

    public function delete($id){
        $image = Image::find($id);
        if (!$image)
            return abort(404);
        $image->delete();
        toast('تم حذف الصورة بنجاح','success');
        return redirect()->route('image.index');
    }

    public function download($image){
        return Response::download('uploads/images_library/'.$image);
    }
}
