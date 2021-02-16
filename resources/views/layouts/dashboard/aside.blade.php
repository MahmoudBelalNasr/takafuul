<!--begin::Aside Menu-->
<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">

            <li class="menu-item menu-item-active" aria-haspopup="true">
                <a href="{{ route('dashboard.index') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </span>
                    <span class="menu-text text-right">الرئيسية</span>
                </a>
            </li>

            {{--
            <li class="menu-item menu-item-active" aria-haspopup="true">
                <a href="#" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <i class="fas fa-bars"></i>
                    </span>
                    <span class="menu-text">القوائم العلوية</span>
                </a>
            </li>

            <li class="menu-item menu-item-active" aria-haspopup="true">
                <a href="#" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <i class="fas fa-bars"></i>
                    </span>
                    <span class="menu-text">القوائم السفلية</span>
                </a>
            </li>
            --}}

            @can('الواجهه الرئيسية')
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <i class="fas fa-home"></i>
                    </span>
                    <span class="menu-text">الواجهه الرئيسية</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">

                        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <ul class="menu-subnav">

                                @can('الاسلايدر')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ route('slider.index') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">الاسلايدر</span>
                                    </a>
                                </li>
                                @endcan

                                @can('مميزاتنا')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ route('advantage.index') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">مميزاتنا</span>
                                    </a>
                                </li>
                                @endcan

                                @can('فوائدنا')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ route('benefit.index') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">فوائدنا</span>
                                    </a>
                                </li>
                                @endcan

                                @can('المدن')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ route('city.index') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">المدن</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
            @endcan

            @can('الطلبات')
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <i class="fas fa-home"></i>
                    </span>
                    <span class="menu-text">الطلبات</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <ul class="menu-subnav">
                                @can('كل الطلبات')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ route('order.index') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">كل الطلبات</span>
                                    </a>
                                </li>
                                @endcan

                                @can('المهملات')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ route('order.pin') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">المهملات</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
            @endcan

            @can('تفاصيل الطلبات')
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="#" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <i class="fas fa-home"></i>
                    </span>
                    <span class="menu-text">تفاصيل الطلبات</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <ul class="menu-subnav">
                                @can('الطلبات الجديدة')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ route('order.new') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">الطلبات الجديدة</span>
                                    </a>
                                </li>
                                @endcan

                                @can('الطلبات تم الارسال')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ route('order.sent') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">الطلبات تم الارسال</span>
                                    </a>
                                </li>
                                @endcan

                                @can('الطلبات تم التسليم')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ route('order.delivered') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text"> الطلبات تم التسليم</span>
                                    </a>
                                </li>
                                @endcan

                                @can('الطلبات تأجلت')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ route('order.delayed') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text"> الطلبات تاجلت</span>
                                    </a>
                                </li>
                                @endcan

                                @can('الطلبات عدم الرد')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ route('order.noreply') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text"> الطلبات عدم الرد</span>
                                    </a>
                                </li>
                                @endcan

                                @can('الطلبات الملغية')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ route('order.canceled') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text"> الطلبات الملغية</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
            @endcan

            @can('الاتصال بنا')
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="#" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <span class="menu-text">الاتصال بنا</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <ul class="menu-subnav">
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ route('contact.index') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">الاتصال بنا</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
            @endcan

            @can('المشرفين والاداريين')
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <i class="fas fa-users"></i>
                    </span>
                    <span class="menu-text">المشرفين والاداريين</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <ul class="menu-subnav">

                                @can('مجموعات المستخدمين')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ url('/dashboard/users') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text"> المستخدمين</span>
                                    </a>
                                </li>
                                @endcan

                                @can('صلاحيات المستخدمين')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ url('/dashboard/roles') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">صلاحيات المستخدمين </span>
                                    </a>
                                </li>
                                @endcan

                                @can('صلاحيات الدخول للنظام')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ route('login.history') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">سجلات الدخول للنظام</span>
                                    </a>
                                </li>
                                @endcan

                            </ul>
                        </li>

                    </ul>
                </div>
            </li>
            @endcan

            @can('مكاتب الملفات')
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="#" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <i class="fas fa-file"></i>
                    </span>
                    <span class="menu-text">مكاتب الملفات</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <ul class="menu-subnav">

                                @can('مكتبة الملفات')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ route('attachment.index') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">مكتبة الملفات</span>
                                    </a>
                                </li>
                                @endcan

                                @can('مكتبة الصور')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ route('image.index') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">مكتبة الصور</span>
                                    </a>
                                </li>
                                @endcan

                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
            @endcan

            @can('ادارة النظام')
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="#" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <i class="fas fa-cog"></i>
                    </span>
                    <span class="menu-text">ادارة النظام</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <ul class="menu-subnav">

                                @can('اعدادات عامة')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ route('setting.index') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">اعدادات عامة</span>
                                    </a>
                                </li>
                                @endcan

                                @can('اعدادات لوحة التحكم')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="#" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">اعدادات لوحة التحكم</span>
                                    </a>
                                </li>
                                @endcan

                               @can('الاعضاء المحظورة')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="#" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">الاعضاء المحظورة</span>
                                    </a>
                                </li>
                                @endcan

                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
            @endcan

            @can('تسجيل الخروج')
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('logout') }}" class="menu-link" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <span class="svg-icon menu-icon">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>
                    <span class="menu-text">تسجيل الخروج</span>
                    <i class=""></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            @endcan
        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>
<!--end::Aside Menu-->
