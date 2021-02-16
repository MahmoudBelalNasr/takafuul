@extends('layouts.dashboard.master')

@section('style')

@endsection

@section('title')
    تكافل للرعاية الصحية | رد
@endsection

@section('content')
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-4">
            <h4 class="font-weight-bolder"><span class="badge badge-pill badge-danger"> رد على الرسالة </span></h4>
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
                                    <form action="{{ route('contact.post.reply') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">إلى:</label>
                                            <input type="text" class="form-control" name="email" value="{{ $contact->email }}" aria-describedby="emailHelp" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">الرسالة:</label>
                                            <textarea type="text" rows="4" class="form-control" name="message" placeholder="أكتب الرد"></textarea>
                                            @error('message')
                                            <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">إرسال الرد</button>
                                        <a href="{{ route('contact.index') }}" class="btn btn-danger">إلغاء</a>
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
