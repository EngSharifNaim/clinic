<!DOCTYPE html>
@if(app()->getLocale() == "de") 
<html lang="de"> 
@else
@endif
<!-- start HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>
        @yield('title')
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Preview page of Metronic Admin Theme #4 for statistics, charts, recent events and reports"
          name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    @yield('css')

    <link href="{{admin_assets('/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"
              type="text/css"/>
    <link href="{{admin_assets('/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet"
              type="text/css"/>
    <link href="{{admin_assets('/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"
              type="text/css"/>
    <link href="{{admin_assets('/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet"
              type="text/css"/>

    @yield('css_file_upload')
 
    <link href="{{admin_assets('/global/css/components.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{admin_assets('/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{admin_assets('/layouts/layout4/css/layout.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{admin_assets('/layouts/layout4/css/themes/default.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{admin_assets('/layouts/layout4/css/custom.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{admin_assets('global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{admin_assets('global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet"
              type="text/css"/>
    <link href="{{admin_assets('global/plugins/bootstrap-sweetalert/sweetalert.css')}}" rel="stylesheet"
              type="text/css"/>
    <link href="{{admin_assets('layouts/layout4/css/customize-style.css')}}" rel="stylesheet"
              type="text/css"/>
    <link href="{{admin_assets('global/plugins/datatables/datatables.min.css')}}" rel="stylesheet"
              type="text/css"/>
    <link href="{{admin_assets('global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet"
              type="text/css"/>


    @yield('css')



    <link rel="shortcut icon" href="{{url('/frontend/assets/images/favicon.png')}}"/>
</head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="{{url('/admin/home')}}">
              <img src="{{url($setting->logo)}}" style="
                margin: 8px 30px 0 !important;
                width: 135px;
                height: 60px;
               " alt="logo">
            </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="separator hide"></li>
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <span class="username username-hide-on-mobile"> {{auth()->guard('admin')->user()->name}} </span>
                            <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                            <img alt="" class="img-circle" src="{{url(auth()->guard('admin')->user()->avatar)}}"/>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li><a href="{{ route('edit_profile') }}"> {{__('common.edit_profile')}}</a></li>
                            <li><a href="{{ route('change_password') }}"> {{__('common.change_password')}}</a></li>
                            <li><a href="{{ route('logout') }}"> {{__('common.logout')}}</a></li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user dropdown-dark">
                        @foreach($locales as $locale)
                            @if($locale->lang == app()->getLocale())
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                   data-close-others="true">
                            <span class="username username-hide-on-mobile">
                                {{$locale->name}} </span>
                                    <img alt="" class="img-circle" src="{{url($locale->flag)}}"/>
                                </a>
                            @endif
                        @endforeach
                        <ul class="dropdown-menu dropdown-menu-default">
                            @foreach($locales as $locale) 
                                <li @if($locale->lang == app()->getLocale()) style="background-color: white !important;" @endif><a href="{{ LaravelLocalization::getLocalizedURL($locale->lang, null, [], true) }}"> <span class="username username-hide-on-mobile">
                                {{$locale->name}} </span><i class="zmdi zmdi-globe-alt"></i></a></li>

                            @endforeach

                        </ul>
                    </li>
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>

<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="nav-item {{(Request::is(getLocal().'/admin/home') ? 'active start' : '')}}">
                    <a href="{{url('/admin/home')}}" class="nav-link">
                        <i class="icon-home"></i>
                        <span class="title">{{__('cp.dashboard')}}</span>
                    </a>
                </li>


                <li class="nav-item {{(Request::is(getLocal().'/admin/managers') ? 'active open' : '')}}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-user "></i>
                        <span class="title">{{__('cp.managers')}}</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{url(getLocal().'/admin/managers')}}" class="nav-link ">
                                <i class="fa fa-server"></i>
                                <span class="title">{{__('cp.all_managers')}}</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{url(getLocal().'/admin/managers/create')}}" class="nav-link ">
                                <i class="fa fa-plus-square-o"></i>
                                <span class="title">{{__('cp.new_manager')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{(Request::is(getLocal().'/admin/doctors') ? 'active open' : '')}}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-th-large"></i>
                        <span class="title">{{__('cp.doctors')}}</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{url(getLocal().'/admin/doctors')}}" class="nav-link ">
                                <i class="fa fa-server"></i>
                                <span class="title">{{__('cp.all_doctors')}}</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{url(getLocal().'/admin/doctor/create')}}" class="nav-link ">
                                <i class="fa fa-plus-square-o"></i>
                                <span class="title">{{__('cp.new_doctor')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                 <li class="nav-item {{(Request::is(getLocal().'/admin/photos') ? 'active open' : '')}} ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-th-large"></i>
                        <span class="title">{{__('cp.photos')}}</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{url(getLocal().'/admin/photos')}}" class="nav-link ">
                                <i class="fa fa-server"></i>
                                <span class="title">{{__('cp.all_photos')}}</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{url(getLocal().'/admin/photo/create')}}" class="nav-link ">
                                <i class="fa fa-plus-square-o"></i>
                                <span class="title">{{__('cp.new_photo')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
               
              <li class="nav-item {{(Request::is(getLocal().'/admin/services') ? 'active open' : '')}} ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-th-large"></i>
                        <span class="title">{{__('cp.services')}}</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{url(getLocal().'/admin/services')}}" class="nav-link ">
                                <i class="fa fa-server"></i>
                                <span class="title">{{__('cp.all_services')}}</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{url(getLocal().'/admin/service/create')}}" class="nav-link ">
                                <i class="fa fa-plus-square-o"></i>
                                <span class="title">{{__('cp.new_service')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{(Request::is(getLocal().'/admin/sliders') ? 'active open' : '')}} ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-th-large"></i>
                        <span class="title">{{__('cp.sliders')}}</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{url(getLocal().'/admin/sliders')}}" class="nav-link ">
             
                                <i class="fa fa-server"></i>
                                <span class="title">{{__('cp.all_sliders')}}</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{url(getLocal().'/admin/slider/create')}}" class="nav-link ">
                                <i class="fa fa-plus-square-o"></i>
                                <span class="title">{{__('cp.new_slider')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                 <li class="nav-item {{(Request::is(getLocal().'/admin/clients') ? 'active open' : '')}} ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-users"></i>
                        <span class="title">{{__('cp.clients')}}</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{url(getLocal().'/admin/clients')}}" class="nav-link ">
                                <i class="fa fa-server"></i>
                                <span class="title">{{__('cp.all_clients')}}</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{url(getLocal().'/admin/client/create')}}" class="nav-link ">
                                <i class="fa fa-plus-square-o"></i>
                                <span class="title">{{__('cp.new_client')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item  {{(Request::is(getLocal().'/admin/contacts') ? 'active open' : '')}}  ">
                    <a href="{{url(getLocal().'/admin/contacts')}}" class="nav-link">
                        <i class="fa fa-users"></i>
                        <span class="title">{{__('cp.contacts')}}</span>
                    </a>
                </li>
                <li class="nav-item  {{(Request::is(getLocal().'/admin/appiontments') ? 'active open' : '')}}  ">
                    <a href="{{url(getLocal().'/admin/appiontments')}}" class="nav-link">
                        <i class="fa fa-comments"></i>
                        <span class="title">{{__('cp.appiontments')}}</span>
                    </a>
                </li>
                <li class="nav-item  {{(Request::is(getLocal().'/admin/settings') ? 'active open' : '')}}  ">
                    <a href="{{url(getLocal().'/admin/settings')}}" class="nav-link">
                        <i class="fa fa-cogs"></i>
                        <span class="title">{{__('cp.settings')}}</span>
                    </a>
                </li>


            </ul>
        </div>
    </div>
    {{--Begin Content--}}
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>@yield('title')
                    </h1>
                </div>
                <div class="page-toolbar" style="display: none;">
                    <div class="btn-group btn-theme-panel">
                        <a href="javascript:;" class="btn dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-settings"></i>
                        </a>
                        <div class="dropdown-menu theme-panel pull-right dropdown-custom hold-on-click">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <h3>HEADER</h3>
                                    <ul class="theme-colors">
                                        <li class="theme-color theme-color-default active" data-theme="default">
                                            <span class="theme-color-view"></span>
                                            <span class="theme-color-name">Dark Header</span>
                                        </li>
                                        <li class="theme-color theme-color-light " data-theme="light">
                                            <span class="theme-color-view"></span>
                                            <span class="theme-color-name">Light Header</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-12 seperator">
                                    <h3>LAYOUT</h3>
                                    <ul class="theme-settings">
                                        <li> Theme Style
                                            <select class="layout-style-option form-control input-small input-sm">
                                                <option value="square">Square corners</option>
                                                <option value="rounded" selected="selected">Rounded corners</option>
                                            </select>
                                        </li>
                                        <li> Layout
                                            <select class="layout-option form-control input-small input-sm">
                                                <option value="fluid" selected="selected">Fluid</option>
                                                <option value="boxed">Boxed</option>
                                            </select>
                                        </li>
                                        <li> Header
                                            <select class="page-header-option form-control input-small input-sm">
                                                <option value="fixed" selected="selected">Fixed</option>
                                                <option value="default">Default</option>
                                            </select>
                                        </li>
                                        <li> Top Dropdowns
                                            <select class="page-header-top-dropdown-style-option form-control input-small input-sm">
                                                <option value="light">Light</option>
                                                <option value="dark" selected="selected">Dark</option>
                                            </select>
                                        </li>
                                        <li> Sidebar Mode
                                            <select class="sidebar-option form-control input-small input-sm">
                                                <option value="fixed">Fixed</option>
                                                <option value="default" selected="selected">Default</option>
                                            </select>
                                        </li>
                                        <li> Sidebar Menu
                                            <select class="sidebar-menu-option form-control input-small input-sm">
                                                <option value="accordion" selected="selected">Accordion</option>
                                                <option value="hover">Hover</option>
                                            </select>
                                        </li>
                                        <li> Sidebar Position
                                            <select class="sidebar-pos-option form-control input-small input-sm">
                                                <option value="left" selected="selected">Left</option>
                                                <option value="right">Right</option>
                                            </select>
                                        </li>
                                        <li> Footer
                                            <select class="page-footer-option form-control input-small input-sm">
                                                <option value="fixed">Fixed</option>
                                                <option value="default" selected="selected">Default</option>
                                            </select>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="{{url('/admin/home')}}">{{__('cp.dashboard')}}</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">@yield('title')</span>
                </li>
            </ul>
            @if (count($errors) > 0)
                <ul style="border: 1px solid #e02222; background-color: white">
                    @foreach ($errors->all() as $error)
                        <li style="color: #e02222; margin: 15px">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            @if (session('error'))
                <ul style="border: 1px solid #e02222; background-color: white">
                        <li style="color: #e02222; margin: 15px">{{ $error }}</li>
                </ul>
            @endif
            @if (session('status'))
                <ul style="border: 1px solid #01b070; background-color: white">
                    <li style="color: #01b070; margin: 15px">{{  session('status')  }}</li>
                </ul>
            @endif
            @yield('content')
        </div>
    </div>
    <!-- END CONTENT -->
    <!-- footer start -->
    <div class="page-footer">
        <div class="page-footer-inner"> {{'2019 &copy; Theme By Clinic'}}
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>

    <!-- footer end -->
</div>
<script src="{{admin_assets('/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
@yield('js_file_upload')

<script src="{{admin_assets('/global/plugins/moment.min.js')}}" type="text/javascript"></script>




<script src="{{admin_assets('/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('/global/scripts/app.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('/layouts/layout4/scripts/layout.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('/global/plugins/bootstrap-sweetalert/sweetalert.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('/pages/scripts/components-select2.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('/pages/scripts/ui-sweetalert.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('global/scripts/datatable.js')}}" type="text/javascript"></script>


<script src="{{admin_assets('global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('global/plugins/ckeditor/ckeditor.js')}}" type="text/javascript"></script>


<script src="{{admin_assets('sweet_alert/sweetalert.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>


@yield('js')


<script>
    $(document).ready(function () {
        $('#clickmewow').click(function () {
            $('#radio1003').attr('checked', 'checked');
        });
    });


{{--$r = '{{app()->getLocale()}}'; --}}
 {{--if($r == 'ar'){     --}}
{{--$(".select2-search__field").attr("placeholder", "اختار");--}}
{{--}else{--}}
{{--$(".select2-search__field").attr("placeholder", "Select");--}}

{{--}--}}

</script>
<script>
    $('#toolsTable').DataTable({
        dom: 'Bfrtip',
        searching: true,
        "oLanguage": {
           "sSearch": "{{__('common.search')}}"
         },
        bInfo: true, //Dont display info e.g. "Showing 1 to 4 of 4 entries"
        paging: true,//Dont want paging
        bPaginate: true,//Dont want paging
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ]
    });
    $('.btn--filter').click(function () {

        $('.box-filter-collapse').slideToggle(500);
 $r = '{{app()->getLocale()}}';
 if($r == 'ar'){
$(".select2-search__field").attr("placeholder", "اختر");
     $(".js-example-rtl").select2({
         dir: "rtl"
     });
}else{
$(".select2-search__field").attr("placeholder", "Select");

}


    });
    var IDArray = [];
    $("input:checkbox[name=chkBox]:checked").each(function () {
        IDArray.push($(this).val());
    });
    if (IDArray.length == 0) {
        $('.event').attr('disabled', 'disabled');
    }
    $('.chkBox').on('change', function () {
        var IDArray = [];
        $("input:checkbox[name=chkBox]:checked").each(function () {
            IDArray.push($(this).val());
        });
        if (IDArray.length == 0) {
            $('.event').attr('disabled', 'disabled');
        } else {
            $('.event').removeAttr('disabled');
        }
    });
    $('.event').on('click', function () {
        var event = $(this).attr('id');
        //alert(event);
        var url = $('#urlToChangeStatus').val();
        //alert(url);
        var csrf_token = '{{csrf_token()}}';
        var IDsArray = [];
        $("input:checkbox[name=chkBox]:checked").each(function () {
            IDsArray.push($(this).val());
            //alert(IDsArray);
        });

        if (IDsArray.length > 0) {
            $.ajax({
                type: 'POST',
                headers: {'X-CSRF-TOKEN': csrf_token},
                url: url,
                data: {event: event, IDsArray: IDsArray, _token: csrf_token},
                success: function (response) {
                    if (response === 'active') {
                        $.each(IDsArray, function (index, value) {
                            $('#label-' + value).removeClass('label-danger');
                            $('#label-' + value).addClass('label-info');
                             $r = '{{app()->getLocale()}}'; 
                            if($r == 'ar'){
                            $('#label-' + value).text('فعال ');
                            }else{
                               $('#label-' + value).text('active'); 
                                
                            }
                        });
                    } else if (response === 'not_active') {
                        $.each(IDsArray, function (index, value) {
                            $('#label-' + value).removeClass('label-info');
                            $('#label-' + value).addClass('label-danger');
                            $r = '{{app()->getLocale()}}'; 
                            if($r == 'ar'){
                            $('#label-' + value).text('غير فعال');
                            }else{
                               $('#label-' + value).text('Not Active'); 
                                
                            }
                        });
                    } else if (response === 'delete') {
                        $.each(IDsArray, function (index, value) {
                            $('#tr-' + value).hide(2000);
                        });
                    }

                },
                fail: function (e) {
                    alert(e);
                }
            });
        } else {
            alert('{{__('common.not_selected')}}');
        }
    });

    function readURL(input, target) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                target.attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

@yield('script')
</body>

</html>