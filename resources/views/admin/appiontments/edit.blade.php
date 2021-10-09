@extends('layouts.cp')
@section('title') {{ucwords(__('cp.edit_appiontment'))}}
@endsection
@section('css_file_upload')
    <link href="{{admin_assets('/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('css')

    <link href="{{admin_assets('/global/plugins/bootstrap-colorpicker/css/colorpicker.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{admin_assets('/global/plugins/jquery-minicolors/jquery.minicolors.css')}}" rel="stylesheet" type="text/css"/>
        
        
    <link href="{{admin_assets('/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{admin_assets('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{admin_assets('/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{admin_assets('/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{admin_assets('/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{admin_assets('/global/plugins/clockface/css/clockface.css')}}" rel="stylesheet" type="text/css"/>

@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase"
                              style="color: #e02222 !important;">{{ucwords(__('cp.edit_appiontment'))}}</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form method="post" action="{{url(app()->getLocale().'/admin/appiontment/'.$item->id)}}"
                          enctype="multipart/form-data" class="form-horizontal" role="form">
                        {{ csrf_field() }}
                        <fieldset>
                            <legend>{{__('common.name')}}</legend>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="name">
                                        {{__('common.name')}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name"
                                               placeholder="{{__('common.name')}}"
                                               id="name"
                                               value="{{ old('name',$item->name) }}" required>
                                    </div>
                                </div>
                        </fieldset>
                        <fieldset>
                            <legend>{{__('common.mobile')}}</legend>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="mobile">
                                        {{__('common.mobile')}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="mobile"
                                               placeholder="{{__('common.mobile')}}"
                                               id="mobile"
                                               value="{{ old('mobile',$item->mobile) }}" required>
                                    </div>
                                </div>
                        </fieldset>
                        <fieldset>
                            <legend>{{__('common.email')}}</legend>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="email">
                                        {{__('common.email')}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="email"
                                               placeholder="{{__('common.email')}}"
                                               id="email"
                                               value="{{ old('email',$item->email) }}" required>
                                    </div>
                                </div>
                        </fieldset>
                          <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="typeuser">
                                    {{__('common.typeuser')}}
                                    <span class="symbol">*</span>
                                </label>
                                <div class="col-md-6">
                                    <select class="form-control select2" name="gender" required>
                                    <option value="male"
                                     @if(old('age',$item->age)=='male') selected @endif> {{__('common.male')}}
                                    </option>
                                    <option value="female"
                                     @if(old('age',$item->age)=='female') selected @endif> {{__('common.female')}}
                                    </option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>{{__('common.age')}}</legend>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="age">
                                        {{__('common.age')}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="age"
                                               placeholder="{{__('common.age')}}"
                                               id="age"
                                               value="{{ old('age',$item->age) }}" required>
                                    </div>
                                </div>
                        </fieldset>
                        <fieldset>
                            <legend>{{__('common.resone')}}</legend>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="resone">
                                        {{__('common.resone')}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <textarea type="text" class="form-control" name="resone"
                                               placeholder="{{__('common.resone')}}"
                                               id="resone"
                                               value="{{ old('resone',$item->resone) }}" required>
                                               {{ old('resone',$item->resone) }}</textarea>
                                    </div>
                                </div>
                        </fieldset>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">{{__('common.submit')}}</button>
                                    <a href="{{url(getLocal().'/admin/appiontments')}}" class="btn default">{{__('common.cancel')}}</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    
    



@endsection
@section('js_file_upload')
    <script src="{{admin_assets('/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>

@endsection
@section('js')
@endsection
@section('script')
    <style>
        .thumbnail_flicer{
            margin: 10px;
        }
        .thumbnail_flicer1{
            height: 100px;
            width: 100px;
        }
    </style>
    <script>
 

$('#edit_image').on('change', function (e) {
            readURL(this, $('#editImage'));
        });
    </script>
@endsection
