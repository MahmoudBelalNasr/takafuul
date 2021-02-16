@extends('layouts.dashboard.master')

@section('style')

@endsection

@section('title')
    تكافل للرعاية الصحية | تعديل الاسلايدر
@endsection

@section('content')
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-4">
            <h4 class="font-weight-bolder"><span class="badge badge-pill badge-danger">تعديل الاسلايدر</span></h4>
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
                                    <form action="{{ route('slider.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">العنوان:</label>
                                            <input type="text" class="form-control" name="text" value="{{ $slider->text }}" aria-describedby="emailHelp" placeholder="ادخل النص">
                                            @error('text')
                                            <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">تحميل صورة:</label>
                                            <input type="file" class="form-control-file" name="image">
                                        </div>

                                        <div class="form-group">
                                            <img src="{{ asset('/uploads/images/'.$slider->image) }}" width="200px" height="150px">
                                        </div>

                                        <button type="submit" class="btn btn-primary">تعديل</button>
                                        <a href="{{ route('slider.index') }}" class="btn btn-danger">إلغاء</a>
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
