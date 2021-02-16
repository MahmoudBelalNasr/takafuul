<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\models\Order;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:كل الطلبات', ['only' => ['index', 'delete']]);
        $this->middleware('permission:المهملات', ['only' => ['pin', 'ForceDeleted', 'restore']]);
        $this->middleware('permission:الطلبات الجديدة', ['only' => ['new_order']]);
        $this->middleware('permission:الطلبات تم الارسال', ['only' => ['sent_order']]);
        $this->middleware('permission:الطلبات تم التسليم', ['only' => ['delivered_order']]);
        $this->middleware('permission:الطلبات تأجلت', ['only' => ['delayed_order']]);
        $this->middleware('permission:الطلبات عدم الرد', ['only' => ['noreply_order']]);
        $this->middleware('permission:الطلبات الملغية', ['only' => ['canceled_order']]);
    }

    public function index(){
        $orders = Order::all();
        return view('dashboard.order.index', compact('orders'));
    }

    public function delete($id){
        $order = Order::find($id);
        if (!$order)
            return abort(404);
        $order->delete();
        toast('تم نقل الطلب إلى المهملات','success');
        return redirect()->route('order.index');
    }

    public function pin(){
        $orders = Order::onlyTrashed()->get();
        return view('dashboard.order.pin', compact('orders'));
    }

    public function ForceDeleted($id){
        $order = Order::withTrashed()->find($id);
        if (!$order)
            return abort(404);
        $order->forceDelete();
        toast('تم حذف الطلب نهائيا','success');
        return redirect()->route('order.pin');
    }

    public function restore($id){
        $order = Order::withTrashed()->find($id);
        if (!$order)
            return abort(404);
        $order->restore();
        toast('تم استرجاع الطلب بنجاح','success');
        return redirect()->route('order.pin');
    }

######################################################################################

    public function exportEXCEL()
    {
        return Excel::download(new OrderExport, 'orders.xlsx');
    }

    public function exportCSV()
    {
        return Excel::download(new OrderExport, 'orders.csv');
    }

    public function downloadPDF(){
        $orders = Order::all();
        $pdf = PDF::loadview('dashboard.order.index', compact('orders'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('orders.pdf');
    }

#######################################################################################

    // 0 -> new
    // 1 -> sent
    // 2 -> delivered
    // 3 -> delayed
    // 4 -> noreply
    // 5 -> canceled
    public function new_order(){
        $orders = Order::where('status' , 0)->get();
        return view('dashboard.order_details.new', compact('orders'));
    }

    public function sent_order(){
        $orders = Order::where('status' , 1)->get();
        return view('dashboard.order_details.sent', compact('orders'));
    }

    public function delivered_order(){
        $orders = Order::where('status' , 2)->get();
        return view('dashboard.order_details.delivered', compact('orders'));
    }

    public function delayed_order(){
        $orders = Order::where('status' , 3)->get();
        return view('dashboard.order_details.delayed', compact('orders'));
    }

    public function noreply_order(){
        $orders = Order::where('status' , 4)->get();
        return view('dashboard.order_details.noreply', compact('orders'));
    }

    public function canceled_order(){
        $orders = Order::where('status' , 5)->get();
        return view('dashboard.order_details.canceled', compact('orders'));
    }

########################################################################################

    public function status_sent($id){
        $order = Order::find($id);
        if (!$order)
            return abort(404);
        $order->status = '1';
        $order->update();
        toast('تم نقل الطلب لقسم تم الارسال','success');
        return redirect()->route('order.new');
    }

    public function status_delivered($id){
        $order = Order::find($id);
        if (!$order)
            return abort(404);
        $order->status = '2';
        $order->update();
        toast('تم نقل الطلب لقسم تم التسليم','success');
        return redirect()->route('order.new');
    }

    public function status_delayed($id){
        $order = Order::find($id);
        if (!$order)
            return abort(404);
        $order->status = '3';
        $order->update();
        toast('تم نقل الطلب لقسم التأجيل','success');
        return redirect()->route('order.new');
    }

    public function status_noreply($id){
        $order = Order::find($id);
        if (!$order)
            return abort(404);
        $order->status = '4';
        $order->update();
        toast('تم نقل الطلب لقسم عدم الرد','success');
        return redirect()->route('order.new');
    }

    public function status_canceled($id){
        $order = Order::find($id);
        if (!$order)
            return abort(404);
        $order->status = '5';
        $order->update();
        toast('تم نقل الطلب لقسم الملغى','success');
        return redirect()->route('order.new');
    }

    public function delete_from_status($id){
        $order = Order::find($id);
        if (!$order)
            return abort(404);
        //$order->status = 0;
        //$order->update();
        $order->delete();
        toast('تم نقل الطلب إلى المهملات','success');
        return redirect()->back();
    }

##########################################################################################

}
