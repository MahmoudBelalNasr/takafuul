@extends('layouts.dashboard.master')

@section('style')

@endsection

@section('title')
    تكافل للرعاية الصحية | اضافة مدينة
@endsection

@section('content')
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-4">
            <h4 class="font-weight-bolder"><span class="badge badge-pill badge-danger"> اضافة مدينة </span></h4>
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
                                <div class="card-body">
                                    <form action="{{ route('city.store') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">اسم المدينة:</label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" aria-describedby="emailHelp" placeholder="اسم المدينة">
                                            @error('name')
                                            <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">اضافة</button>
                                        <a href="{{ route('city.index') }}" class="btn btn-danger">إلغاء</a>
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

@endsection
