<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\CityExport;
use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade as PDF;


class CityController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:المدن', ['only' => ['index', 'create', 'store', 'edit', 'update', 'delete']]);
    }

    public function index(){
        $cities = City::all();
        return view('dashboard.city.index', compact('cities'));
    }

    public function create(){
        return view('dashboard.city.create');
    }


    public function store(Request $request){
        $rules = [
            'name' => 'required|unique:cities',
        ];
        $error_messages =[
            'name.required' => 'برجاء ادخال اسم المدينة',
            'name.unique' => 'اسم المدينة مستخدم مسبقا',
        ];
        $validator = Validator::make($request->all(), $rules , $error_messages);
        if ($validator ->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $city = new City();
        $city->name = $request->input('name');
        $city->save();
        toast('تم اضافة المدينة بنجاح','success');
        return redirect()->route('city.index');
    }


    public function edit($id){
        $city = City::find($id);
        if (!$city)
            return abort(404);
        return view('dashboard.city.edit', compact('city'));
    }


    public function update(Request $request, $id){
        $rules = [
            'name' => 'required|unique:cities,name,'.$id,
        ];
        $error_messages =[
            'name.required' => 'برجاء ادخال اسم المدينة',
            'name.unique' => 'اسم المدينة مستخدم مسبقا',
        ];
        $validator = Validator::make($request->all(), $rules , $error_messages);
        if ($validator ->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $city = City::find($id);
        if (!$city)
            return abort(404);
        $city->name = $request->input('name');
        $city->update();
        toast('تم تعديل المدينة بنجاح','success');
        return redirect()->route('city.index');
    }


    public function delete($id){
        $city = City::find($id);
        if (!$city)
            return abort(404);
        $city->delete();
        toast('تم حذف المدينة بنجاح','success');
        return redirect()->route('city.index');
    }


    public function exportEXCEL()
    {
        return Excel::download(new CityExport, 'cities.xlsx');
    }

    public function exportCSV()
    {
        return Excel::download(new CityExport, 'cities.csv');
    }

    public function downloadPDF(){
        $cities = City::all();
        $pdf = PDF::loadview('dashboard.city.index', compact('cities'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('cities.pdf');
    }

}
