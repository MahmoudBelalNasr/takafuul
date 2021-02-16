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
    تكافل للرعاية الصحية | المشرفين والاداريين
@endsection

@section('content')
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-4">
            <h4 class="font-weight-bolder"><span class="badge badge-pill badge-danger"> المشرفين والاداريين</span> </h4>
        </div>


        <div class="d-flex align-items-center float-left">
            <div class="mr-4">
                @can('اضافة مستخدم')
                <a class="btn btn-success" href="{{ route('users.create') }}"><i class="fas fa-plus-square"></i>إضافة مستخدم جديد </a>
                @endcan
            </div>
            {{--
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
                                    <table class="table table-bordered text-center myTable" style="border: 1px solid black;" >
                                        <thead>
                                        <tr id="print_hidden">
                                            <th scope="col">#</th>
                                            <th scope="col">الاسم</th>
                                            <th scope="col">البريد الالكترونى</th>
                                            <th scope="col">الصلاحية</th>
                                            <th scope="col">حالة المستخدم</th>
                                            <th scope="col">الاجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i =0?>
                                            @foreach($data as $user)
                                            <?php $i++?>
                                            <tr>
                                                <th>{{ $i }}</th>
                                                <th>{{ $user->name }}</th>
                                                <th>{{ $user->email }}</th>

                                                <th>
                                                    @if (!empty($user->getRoleNames()))
                                                        @foreach ($user->getRoleNames() as $v)
                                                            <label class="badge badge-success">{{ $v }}</label>
                                                        @endforeach
                                                    @endif
                                                </th>

                                                <th>
                                                    @if( $user->status == 1 )
                                                        <span class="badge badge-danger">مفعل</span>
                                                    @elseif( $user->status == 2 )
                                                        <span class="badge badge-warning">غير مفعل</span>
                                                    @endif
                                                </th>
                                                <td id="print_hidden">
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            @can('تعديل مستخدم')
                                                            <a href="{{ route('users.edit', $user->id) }}" class="dropdown-item" type="button"> <i class="fas fa-edit"></i> تعديل </a>
                                                            @endcan

                                                            @can('حذف مستخدم')
                                                            <a href="{{ route('users.destroy', $user->id) }}" class="dropdown-item" type="button"> <i class="far fa-trash-alt"></i> حذف </a>
                                                            @endcan
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

