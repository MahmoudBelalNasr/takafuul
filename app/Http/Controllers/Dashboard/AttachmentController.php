<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class AttachmentController extends Controller
{
    public function index(){
        $attachments = Attachment::all();
        return view('dashboard.attachment.file.index', compact('attachments'));
    }

    public function create(){
        return view('dashboard.attachment.file.create');
    }

    public function store(Request $request){
        $rules = [
            'attach' => 'required|mimes:pdf,docx,csv,xlsx,zip,rar,txt',
        ];
        $error_messages =[
            'attach.required' => 'برجاء تحميل ملف',
        ];
        $validator = Validator::make($request->all(), $rules , $error_messages);
        if ($validator ->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = new Attachment();
        $data->user_id = Auth::user()->id;

        if ($request->hasFile('attach')){
            $file = $request->file('attach');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('uploads/files_library/', $file_name);
            $data->attachment = $file_name;
        }
        $data->save();
        toast('تم اضافة الملف بنجاح','success');
        return redirect()->route('attachment.index');
    }

    public function edit($id){
        $attachment = Attachment::find($id);
        if (!$attachment)
            return abort(404);
        return view('dashboard.attachment.file.edit', compact('attachment'));
    }

    public function update(Request $request, $id){
        $rules = [
            'attach' => 'required|mimes:pdf,docx,csv,xlsx,zip,rar,txt',
        ];
        $error_messages =[
            'attach.required' => 'برجاء تحميل ملف',
        ];
        $validator = Validator::make($request->all(), $rules , $error_messages);
        if ($validator ->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $attachment = Attachment::find($id);
        if (!$attachment)
            return abort(404);
        if ($request->hasFile('attach')){
            $destination = 'uploads/files_library/'.$attachment->attachment;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('attach');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('uploads/files_library/', $file_name);
            $attachment->attachment = $file_name;
        }
        $attachment->update();
        toast('تم تعديل الملف بنجاح','success');
        return redirect()->route('attachment.index');
    }

    public function delete($id){
        $attach = Attachment::find($id);
        if (!$attach)
            return abort(404);
        $attach->delete();
        toast('تم حذف الملف بنجاح','info');
        return redirect()->route('attachment.index');
    }


    public function downloadFile($attachment){
        return Response::download('uploads/files_library/'.$attachment);
    }
}
