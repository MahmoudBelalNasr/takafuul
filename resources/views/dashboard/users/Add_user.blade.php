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
    تكافل للرعاية الصحية | اضافة المشرفين والاداريين
@endsection

@section('content')
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-4">
            <h4 class="font-weight-bolder"><span class="badge badge-pill badge-danger">إضافة المشرفين والاداريين</span> </h4>
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

    <div class="content d-flex flex-column flex-column-fluid" id="">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card wow margin">
                    <div class="row margin">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body" id="print">



                                    <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                                          action="{{route('users.store','test')}}" method="post">
                                        {{csrf_field()}}

                                        <div class="">

                                            <div class="row mg-b-20">
                                                <div class="parsley-input col-md-6" id="fnWrapper">
                                                    <label>اسم المستخدم: <span class="tx-danger">*</span></label>
                                                    <input class="form-control form-control-sm mg-b-20"
                                                           data-parsley-class-handler="#lnWrapper" name="name" required="" type="text">
                                                </div>

                                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                                    <label>البريد الالكتروني: <span class="tx-danger">*</span></label>
                                                    <input class="form-control form-control-sm mg-b-20"
                                                           data-parsley-class-handler="#lnWrapper" name="email" required="" type="email">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mg-b-20">
                                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                                <label>كلمة المرور: <span class="tx-danger">*</span></label>
                                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                                       name="password" required="" type="password">
                                            </div>

                                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                                <label> تاكيد كلمة المرور: <span class="tx-danger">*</span></label>
                                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                                       name="confirm-password" required="" type="password">
                                            </div>
                                        </div>

                                        <div class="row row-sm mg-b-20">
                                            <div class="col-lg-6">
                                                <label class="form-label">حالة المستخدم</label>
                                                <select name="status" id="select-beast" class="form-control  nice-select  custom-select">
                                                    <option value="1">مفعل</option>
                                                    <option value="2">غير مفعل</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mg-b-20">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label"> صلاحية المستخدم</label>
                                                    {!! Form::select('roles_name[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mg-b-20 text-center">
                                            <button class="btn btn-primary pd-x-20" type="submit">تاكيد</button>
                                            <a class="btn btn-danger pd-x-20" href="{{ route('users.index') }}">رجوع</a>
                                        </div>
                                    </form>

                                </div>
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

