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
    تكافل للرعاية الصحية | الطلبات
@endsection

@section('content')
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-4">
            <h4 class="font-weight-bolder">
                <span class="badge badge-pill badge-danger">الطلبات </span>
            </h4>
        </div>


        <div class="d-flex align-items-center float-left">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    الاجراءات
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item" onclick="printDiv()"><i class="fas fa-print"></i>طباعة </button>

                    <a class="dropdown-item" href="{{ route('order.export.excel') }}"><i class="fas fa-file-excel"></i> تصدير Excel</a>

                    <a class="dropdown-item" href="{{ route('order.export.csv') }}"><i class="fas fa-file-excel"></i> تصدير CSV</a>

                    <a class="dropdown-item" href="{{ route('order.export.pdf') }}"><i class="fas fa-file-pdf"></i> تصدير PDF </a>
                </div>
            </div>
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
                                                <th>{{ \App\Models\City::find($order->city_id)->name }}</th>
                                                <th>{{ $order->title }}</th>
                                                <th>
                                                    @if( $order->status == 0 )
                                                        <span class="badge badge-pill badge-warning">جديد</span>
                                                    @elseif( $order->status == 1 )
                                                        <span class="badge badge-pill badge-warning">تم الارسال</span>
                                                    @elseif( $order->status == 2 )
                                                        <span class="badge badge-pill badge-warning">تم التسليم</span>
                                                    @elseif( $order->status == 3 )
                                                        <span class="badge badge-pill badge-warning">تأجلت</span>
                                                    @elseif( $order->status == 4 )
                                                        <span class="badge badge-pill badge-warning">عدم رد</span>
                                                    @elseif( $order->status == 5 )
                                                        <span class="badge badge-pill badge-warning">ملغية</span>
                                                    @endif
                                                </th>
                                                <th><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($order->created_at))->format('d/m/Y h:i A') ?></th>
                                                <th id="print_hidden">
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <a href="{{ route('order.delete', $order->id) }}" class="dropdown-item" type="button"> <i class="fas fa-edit"></i> نقل إلى المهملات </a>
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
                        },

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
