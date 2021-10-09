@extends('layouts.cp')
@section('title') {{ucwords(__('cp.edit_service'))}}
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
                              style="color: #e02222 !important;">{{ucwords(__('cp.edit_service'))}}</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form method="post" action="{{url(app()->getLocale().'/admin/service/'.$item->id)}}"
                          enctype="multipart/form-data" class="form-horizontal" role="form">
                        {{ csrf_field() }}
                        <fieldset>
                            <legend>{{__('common.name')}}</legend>
                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="name_{{$locale->lang}}">
                                        {{__('common.name_'.$locale->lang)}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name_{{$locale->lang}}"
                                               placeholder="{{__('common.name_'.$locale->lang)}}"
                                               id="name_{{$locale->lang}}"
                                               value="{{ old('name_'.$locale->lang,$item->translate($locale->lang)->name) }}" required>
                                    </div>
                                </div>
                            @endforeach
                        </fieldset>
                         <fieldset>
                            <legend>{{__('common.short_details')}}</legend>
                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="short_details_{{$locale->lang}}">
                                        {{__('common.short_details_'.$locale->lang)}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                            <textarea rows="5" class="form-control ckeditor" name="short_details_{{$locale->lang}}"
                                                      placeholder=" {{__('common.short_details_'.$locale->lang)}}"
                                                      id="short_details_{{$locale->lang}}"
                                                      required>{{ old('short_details_'.$locale->lang,$item->translate($locale->lang)->short_details) }}</textarea>
                                    </div>
                                </div>

                            @endforeach
                        </fieldset>
                        <fieldset>
                            <legend>{{__('common.details')}}</legend>
                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="details_{{$locale->lang}}">
                                        {{__('common.details_'.$locale->lang)}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                            <textarea rows="5" class="form-control ckeditor" name="details_{{$locale->lang}}"
                                                      placeholder=" {{__('common.details_'.$locale->lang)}}"
                                                      id="details_{{$locale->lang}}"
                                                      required>{{ old('details_'.$locale->lang,$item->translate($locale->lang)->details) }}</textarea>
                                    </div>
                                </div>

                            @endforeach
                        </fieldset>
                        <fieldset>
                                <legend>{{__('common.image')}}</legend>
                                <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                    <div class="col-md-6 col-md-offset-3">
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                        <div class="fileinput-new thumbnail"
                                             onclick="document.getElementById('edit_image').click()"
                                             style="cursor:pointer">
                                            <img src="{{ isset($item) && $item->image ? url($item->image) :  url('/images/ChoosePhoto.png')}}" id="editImage">
                                        </div>
                                        <label class="control-label">{{__('common.image')}}</label>
                                        <div class="btn red"
                                             onclick="document.getElementById('edit_image').click()">
                                            <i class="fa fa-pencil"></i>{{__('common.change_image')}}
                                        </div>
                                        <input type="file" class="form-control" name="image"
                                               id="edit_image"
                                               style="display:none">
                                    </div>
                                </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="status">
                                    {{__('common.status')}}
                                    <span class="symbol">*</span>
                                </label>
                                <div class="col-md-6">
                                    <select class="form-control select2" name="status" required>
                                        <option value="active" @if(old('status',$item->status)=='active') selected @endif>{{__('common.active')}}</option>
                                        <option value="not_active" @if(old('status',$item->status)=='not_active') selected @endif> {{__('common.not_active')}}</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">{{__('common.submit')}}</button>
                                    <a href="{{url(getLocal().'/admin/services')}}" class="btn default">{{__('common.cancel')}}</a>
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
