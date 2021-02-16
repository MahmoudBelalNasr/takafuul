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
    تكافل للرعاية الصحية | اضافة صلاحيات المشرفين
@endsection

@section('content')
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-4">
            <h4 class="font-weight-bolder"><span class="badge badge-pill badge-danger">إضافة الصلاحيات</span> </h4>
        </div>


        <div class="d-flex align-items-center float-left">
            {{--
            <div class="mr-4">
                <a class="btn btn-success" href="{{ route('users.create') }}"><i class="fas fa-plus-square"></i>إضافة مستخدم جديد </a>
            </div>
            <div class="dropdown">
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item" onclick="printDiv()"><i class="fas fa-print"></i>طباعة </button>
                </div>
            </div>
            --}}
        </div>
        <!--end::Info-->
    </div>


    <div class="card-body" id="print">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>خطا</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
    <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mg-b-20">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <p>اسم الصلاحية :</p>
                                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- col -->
                            <div class="col-lg-4">
                                <ul id="treeview1">
                                    <li><a href="#">الصلاحيات</a>
                                            <ul>
                                                <li>
                                                    @foreach($permission as $value)
                                                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                            {{ $value->name }}</label>
                                                        <br />
                                                    @endforeach
                                                </li>
                                            </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">تاكيد</button>
                                <a href="{{ route('roles.index') }}" class="btn btn-danger">إلغاء</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
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

    <!-- Internal Treeview js -->
    <script src="{{ asset('dashboard_assets/assets/plugins/treeview/treeview.js')}}"></script>

@endsection

