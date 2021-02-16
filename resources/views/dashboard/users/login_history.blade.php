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
    تكافل للرعاية الصحية | سجلات الدخول للنظام
@endsection

@section('content')
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-4">
            <h4 class="font-weight-bolder">
                <span class="badge badge-pill badge-danger">سجلات الدخول للنظام </span>
            </h4>
        </div>


        <div class="d-flex align-items-center float-left">
            <button class="btn btn-primary" onclick="printDiv()"><i class="fas fa-print"></i>طباعة </button>
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
                                            <th scope="col">اسم المستخدم</th>
                                            <th scope="col">تاريخ الدخول</th>
                                            <th scope="col">تاريخ الخروج</th>
                                            <th scope="col">مدة التواجد</th>
                                            <th scope="col">الاجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i =0?>
                                            @foreach( $histories as $history )
                                            <?php $i++?>
                                            <tr>
                                                <th>{{ $i }}</th>
                                                <th>{{ \App\User::find($history->user_id)->name }}</th>
                                                <th>{{ $history->login_at }}</th>
                                                <th>{{ $history->logout_at }}</th>
                                                <th>
                                                    <span class="badge badge-primary">
                                                        {{ $history->stay_time }}
                                                    </span>
                                                </th>
                                                <th id="print_hidden">
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <a href="" class="dropdown-item" type="button"> <i class="fas fa-edit"></i>حذف </a>
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
