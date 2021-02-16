@extends('layouts.frontend.master')

@section('style')

@endsection

@section('title')
    تكافل للرعاية الصحية
@endsection

@section('content')
    <div class="newCard" data-scroll-index="1">
        <div class="form wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <form class="formCard" action="{{ route('order.store') }}" method="post">
                            @csrf
                            <h2 class="titleForm">طلب بطاقة جديدة</h2>
                            <div class="inputStyle">
                                <label class="nameInput">الإسم :</label>
                                <input type="text" name="username" value="{{ old('username') }}" placeholder="ضع اسمك الثلاثي هنا" />
                                @error('username')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="inputStyle">
                                <label class="nameInput">رقم الهوية أو جواز السفر :</label>
                                <input type="number" name="identity_number" value="{{ old('identity_number') }}" placeholder="ضع رقم الهوية أو جواز السفر" />
                                @error('identity_number')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="inputStyle">
                                <label class="nameInput dateInput">ضع تاريخ ميلادك هنا :</label>
                                <input type="date" id="dateInput" name="birth_date" value="{{ old('birth_date') }}" placeholder="ضع تاريخ ميلادك هنا" />
                                @error('birth_date')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="inputStyle inputNumb">
                                <label class="nameInput">أضف رقم جوالك الحالي</label>
                                <input type="number" name="phone1" id="inputNumb" value="{{ old('phone1') }}" placeholder="رقم الجوال :" />
                                @error('phone1')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="inputStyle">
                                <label class="nameInput">المدينة :</label>
                                <select name="city_id" class="selectmenu" id="selectmenu">
                                    <option value="">-- أختر مدينة --</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}"  {{ (old("city_id") == $city->id ? "selected":" ") }}>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                <label for="selectmenu" class="iconLeft fa fa-angle-down"></label>
                                @error('city_id')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="inputStyle">
                                <label class="nameInput">أضف العنوان بشكل صحيح</label>
                                <input type="text" placeholder="العنوان :" name="title" value="{{ old('title') }}"/>
                                @error('title')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            {{--
                            <div class="inputStyle">
                                <label class="nameInput">اكتب الرقم الظاهر امامك : <span>93</span></label>
                                <input type="number" placeholder="أضف الرقم هنا" />
                            </div>
                            --}}
                            <div class="checkDiv">
									<span class="text">
										الموافقة على الشروط والأحكام
									</span>
                                <label class="switch">
                                    <input type="checkbox" name="conditions">
                                    <span class="sliderSwitch round"></span>
                                </label>
                            </div>
                            @error('conditions')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                            <button type="submit">ارسل الآن</button>
                        </form>
                    </div>
                    <div class="col-md-7">
                        <div class="imgDiv">
                            <img src="{{ asset('frontend_assets/images/imgForm.png') }}" alt="" />
                            <div class="privcyDiv">
                                <h3 class="PrivacyTitle">سياسة الخصوصية</h3>
                                <div class="privcyDesc">بطلبك البطاقة فانت توافق علي سياسة الخصوصية الخاصة بنا <a href="#"  data-toggle="modal" data-target="#ModalPrivacy">الخصوصية</a></div>
                                <div class="copyRights">
                                    Copyright 2018 - 2020, All Rights Reserved <span class="copy">&copy;</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="features" data-scroll-index="2">
        <div class="container">
            <center>
                <ul class="tabsBtns clearfix">
                    <li id="tab1" class="active">من مميزات البطاقة</li>
                    <li id="tab2">فائدة البطاقة</li>
                </ul>
            </center>
            <div class="tabs">
                <div class="tab1 tab">
                    <div class='row'>
                        @foreach($advantages as $advantage)
                            <div class="col-md-6 wow fadeInUp">
                                <div class="itemFeatures">
                                    <i class="{{ $advantage->icon }}"></i>
                                    <div class="desc">
                                        {{ $advantage->text }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="tab2 tab">
                    <div class='row'>
                        @foreach($benefits as  $benefit)
                        <div class="col-md-6 wow fadeInUp">
                            <div class="itemFeatures">
                                <i class="{{ $benefit->icon }}"></i>
                                <div class="desc">
                                    {{ $benefit->text }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="JoinNow background-cover">
        <div class="container">
            <h2 class="title">عرض لفترة محدودة</h2>
            <div class="desc">
                سنة عليك وسنة علينا فقط بـ 200 ريال لمدة سنتين
            </div>
            <div class="btns">
                <a href="#" data-toggle="modal" data-target="#video" class="btnVid wow fadeInUp flaticon-play-button"></a>
                <a class="btnNow " href="#" data-scroll-nav="1">اشترك الان</a>
            </div>
        </div>
    </div>


    <!--
    <div class="btnsFixed">
        <a href="tel:0599997579" class="phone flaticon-phone-call"></a>
        <a href="https://api.whatsapp.com/send?phone=966599997579&text=السلام عليكم" class="whats fa fa-whatsapp"></a>
    </div>-->

    <div id="ModalPrivacy" class="modal fade ModalMore ModalPrivacy" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="desc">
                        هنا يدرج شروط موافقة الاستخدام عند الضغط عليها من خلال
                        <br>
                        فورم التسجيل في الهوم بيدج
                        <br>
                        هي العضوية الاولى الشاملة والداعمة بالمملكة العربية السعودية و المجتمعات الخليجية كما في مؤسسات تكافل الخيرية لدول مجلس التعاون تعتمد على فكرة العلاج النقدي بلا انتظار للموافقات او ارسال اي حالة تستوجب تقديم الخدمات للمشتركين الى الشركة كما في شركات مشابهة بنظام الخصم النقدي المباشر بأفضل وأقل الأسعار (بنسب خصم مميزة توفر لك الكثير خلال مدة أشتراكك) في المجال


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('contact_modal')
    <div id="contactUs" class="modal fade  contactUs" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="title">اتصل بنا</h2>
                    <form class="Contact" action="{{ route('contact.us') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    @error('name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="أضف الاسم :" />
                            </div>
                            <div class="col-md-6">
                                <div>
                                    @error('email')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="البريد الإلكتروني :" />
                            </div>
                            <div class="col-md-6">
                                <div>
                                    @error('phone')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <input type="number" name="phone" value="{{ old('phone') }}" placeholder="رقم الجوال :" />
                            </div>
                            <div class="col-md-6">
                                <div>
                                    @error('title')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <input type="text" name="title" value="{{ old('title') }}" placeholder="عنوان الرسالة :" />
                            </div>
                            <div class="col-md-12">
                                <div>
                                    @error('body')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <textarea name="body" placeholder="تفاصيل الرسالة :">{{ old('body') }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="send">ارسل الآن</button>
                    </form>

                </div>
            </div>
        </div>
    </div>



    <div id="video" class="modal fade order-box" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-body">

                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/WKKyvZHWjrc" frameborder="0" allowfullscreen=""></iframe>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
