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
    تكافل للرعاية الصحية | الواجهه الرئيسية | مميزاتنا
@endsection

@section('content')
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-4">
            <h4 class="font-weight-bolder"><span class="badge badge-pill badge-danger">مميزاتنا</span></h4>
        </div>

        <div class="d-flex align-items-center float-left">
            <div class="mr-4">
                <a class="btn btn-success" href="{{ route('advantage.create') }}"><i class="fas fa-plus-square"></i>إضافة إلى مميزاتنا </a>
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
                                            <th scope="col">العنوان</th>
                                            <th scope="col">الايقونة</th>
                                            <th scope="col">الاجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i =0?>
                                            @foreach($advantages as $advantage)
                                            <?php $i++?>
                                            <tr>
                                                <th>{{ $i }}</th>
                                                <td>{{ $advantage->text }}</td>
                                                <td>{{ $advantage->icon }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <a href="{{ route('advantage.edit', $advantage->id) }}" class="dropdown-item" type="button"> <i class="fas fa-edit"></i> تعديل </a>
                                                            <form method="post" action="{{route('advantage.destroy',$advantage->id)}}">
                                                                @csrf
                                                                @method("DELETE")
                                                                <button type="submit" class="dropdown-item"> <i class="fas fa-trash"></i> حذف </button>
                                                            </form>
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
@endsection

