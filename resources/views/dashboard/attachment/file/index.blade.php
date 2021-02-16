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
    تكافل للرعاية الصحية | الملفات
@endsection

@section('content')
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-4">
            <h4 class="font-weight-bolder"><span class="badge badge-pill badge-danger">مكتبة الملفات</span> </h4>
        </div>


        <div class="d-flex align-items-center float-left">
            <div class="mr-4">
                <a class="btn btn-success" href="{{ route('attachment.create') }}"><i class="fas fa-plus-square"></i>إضافة ملف جديد </a>
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
                                            <th scope="col">إسم الملف</th>
                                            <th scope="col">رابط التحميل</th>
                                            <th scope="col">إسم المستخدم الذى رفع الملف</th>
                                            <th scope="col">تاريخ التحميل</th>
                                            <th scope="col">الاجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i =0?>
                                            @foreach($attachments as $attachment)
                                            <?php $i++?>
                                            <tr>
                                                <th>{{ $i }}</th>
                                                <td>{{ $attachment->attachment }}</td>
                                                <td>
                                                    <a href="{{ route('downloadFile', $attachment->attachment) }}"><span class="badge badge-warning">من هنا</span></a>
                                                </td>
                                                <td><span class="badge badge-info">{{ $attachment->user->name }}</span></td>
                                                <td>{{ $attachment->created_at }}</td>
                                                <td id="print_hidden">
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <a href="{{ route('attachment.edit', $attachment->id) }}" class="dropdown-item" type="button"> <i class="fas fa-edit"></i> تعديل </a>
                                                            <a href="{{ route('attachment.delete', $attachment->id) }}" class="dropdown-item" type="button"> <i class="far fa-trash-alt"></i> حذف </a>
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
