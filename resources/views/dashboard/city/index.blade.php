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
    تكافل للرعاية الصحية | المدن
@endsection

@section('content')
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-4">
            <h4 class="font-weight-bolder"><span class="badge badge-pill badge-danger">المدن</span> </h4>
        </div>


        <div class="d-flex align-items-center float-left">
            <div class="mr-4">
                <a class="btn btn-success" href="{{ route('city.create') }}"><i class="fas fa-plus-square"></i>إضافة مدينة جديدة </a>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    الاجراءات
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <button class="dropdown-item" onclick="printDiv()"><i class="fas fa-print"></i>طباعة </button>

                    <a class="dropdown-item" href="{{ route('city.export.excel') }}"><i class="fas fa-file-excel"></i> تصدير Excel</a>

                    <a class="dropdown-item" href="{{ route('city.export.csv') }}"><i class="fas fa-file-excel"></i> تصدير CSV</a>

                    <a class="dropdown-item" href="{{ route('city.export.pdf') }}"><i class="fas fa-file-pdf"></i> تصدير PDF </a>
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
                                            <th scope="col">إسم المدينة</th>
                                            <th scope="col">الاجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i =0?>
                                        @foreach($cities as $city)
                                        <?php $i++?>
                                        <tr>
                                            <th>{{ $i }}</th>
                                            <td>{{ $city->name }}</td>
                                            <td id="print_hidden">
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        العمليات
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                        <a href="{{ route('city.edit', $city->id) }}" class="dropdown-item" type="button"> <i class="fas fa-edit"></i> تعديل </a>
                                                        <a href="{{ route('city.delete', $city->id) }}" class="dropdown-item" type="button"> <i class="far fa-trash-alt"></i> حذف </a>
                                                    </div>
                                                </div>
                                            </td>
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
