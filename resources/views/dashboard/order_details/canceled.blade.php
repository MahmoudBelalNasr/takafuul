@extends('layouts.dashboard.master')

@section('style')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @media print{
            #print_hidden{
                display: none;
            }
        }
    </style>
@endsection

@section('title')
    تكافل للرعاية الصحية | الطلبات عدم الرد
@endsection

@section('content')
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-4">
            <h4 class="font-weight-bolder">
                <span class="badge badge-pill badge-danger">الطلبات الملغية</span>
            </h4>
        </div>

        <div class="d-flex align-items-center float-left">
            <button class="btn btn-success" onclick="printDiv()"><i class="fas fa-print"></i>طباعة </button>
        </div>
    <!--end::Info-->
    </div>

    <div class="content d-flex flex-column flex-column-fluid" id="">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card wow margin">
                    <div class="row margin">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body" id="print">
                                    <table class="table table-bordered text-center myTable" style="border: 1px solid black;" >
                                        <thead>
                                        <tr id="print_hidden">
                                            <th scope="col">#</th>
                                            <th scope="col">الاسم</th>
                                            <th scope="col">رقم الهوية او جواز السفر</th>
                                            <th scope="col">رقم الجوال</th>
                                            <th scope="col">تاريخ الميلاد</th>
                                            <th scope="col">المدينة</th>
                                            <th scope="col">العنوان</th>
                                            <th scope="col">الحالة</th>
                                            <th scope="col">تاريخ الارسال</th>
                                            <th scope="col">الاجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i =0?>
                                        @foreach($orders as $order)
                                            <?php $i++?>
                                            <tr>
                                                <th>{{ $i }}</th>
                                                <th>{{ $order->username }}</th>
                                                <th><span class="badge badge-info">{{ $order->identity_number }}</span></th>
                                                <th><span class="badge badge-primary">{{ $order->phone1 }}</span></th>
                                                <th>{{ $order->birth_date }}</th>
                                                <th>{{ $order->city_id }}</th>
                                                <th>{{ $order->title }}</th>
                                                <th><span class="badge badge-pill badge-warning">ملغية</span></th>
                                                <th><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($order->created_at))->format('d/m/Y h:i A') ?></th>
                                                <th id="print_hidden">
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <a href="{{ route('order.delete.status', $order->id) }}" class="dropdown-item" type="button"> <i class="far fa-trash-alt"></i> نقل إلى المهملات </a>
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('scripts')
            <script>
                $(document).ready(function() {
                    $('.myTable').DataTable( {
                        "order": [],
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Arabic.json"
                        }
                    } );
                } );
            </script>

            <script>
                function printDiv() {
                    var printContents = document.getElementById('print').innerHTML;
                    var getOriginalContent = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    window.print();
                    document.body.innerHTML = getOriginalContent;
                    location.reload();
                }
            </script>
@endsection
