@extends('layouts.dashboard.master')

@section('style')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    {{--
    <style>
        @media print{
            #print_hidden{
                display: none;
            }
        }
    </style>
    --}}
@endsection

@section('title')
    تكافل للرعاية الصحية | الاعدادات
@endsection

@section('content')
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-4">
            <h4 class="font-weight-bolder"><span class="badge badge-pill badge-danger">الاعدادات العامة</span> </h4>
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

                                    <form action="{{ route('setting.update') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label><span class="badge badge-dark">العنوان عربى: </span></label>
                                            <input type="text" name="title" class="form-control" value="{{ $setting_title->value }}">
                                            @error('title')
                                            <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label><span class="badge badge-dark">الكلمات الدليلية عربى: </span></label>
                                            <input type="text" name="keywords" class="form-control" value="{{ $setting_keywords->value }}">
                                            @error('keywords')
                                            <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label><span class="badge badge-dark">الوصف عربى: </span></label>
                                            <textarea type="text" name="description" class="form-control" rows="2">{{ $setting_description->value }}</textarea>
                                            @error('description')
                                            <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label><span class="badge badge-dark">البريد الالكترونى (الادارة): </span></label>
                                            <input type="email" name="email_manage" class="form-control" value="{{ $setting_email_manage->value }}">
                                            @error('email_manage')
                                            <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label><span class="badge badge-dark">البريد الالكترونى (للرسائل): </span></label>
                                            <input type="email" name="email_message" class="form-control" value="{{ $setting_email_message->value }}">
                                            @error('email_message')
                                            <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label><span class="badge badge-dark">رقم الهاتف: </span></label>
                                            <input type="number" name="phone" class="form-control" value="{{ $setting_phone->value }}">
                                            @error('phone')
                                            <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label><span class="badge badge-dark">رقم الواتس اب: </span></label>
                                            <input type="number" name="whatsapp" class="form-control" value="{{ $setting_whatsapp->value }}">
                                            @error('whatsapp')
                                            <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label><span class="badge badge-dark">الفيديو التعريفى: </span></label>
                                            <input type="text" name="video" class="form-control" value="{{ $setting_video->value }}"><br>
                                            <div class="text-center">
                                                <iframe width="560" height="315" src="{{ $setting_video->value }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>
                                            @error('video')
                                            <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label><span class="badge badge-dark">تحليلات جوجل :</span></label>
                                            <input type="text" name="google" class="form-control" value="{{ $setting_google->value }}">
                                            @error('google')
                                            <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary">حفظ</button>
                                    </form>

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

            {{--
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
            --}}
@endsection
