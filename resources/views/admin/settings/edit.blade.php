@extends('layouts.cp')
@section('title') {{ucwords(__('common.edit'))}} {{ucwords(__('common.setting'))}}
@endsection
@section('css')
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjOp2BjQx-ruFkTnb4mB_2m3eFtcCyPbU&sensor=false&libraries=places"></script>
    <style type="text/css">
        .input-controls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }
        #searchInput {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 50%;
        }

        #searchInput:focus {
            border-color: #4d90fe;
        }
    </style>

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
                              style="color: #e02222 !important;">{{__('common.edit')}}{{__('common.setting')}}</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form method="post" action="{{url(app()->getLocale().'/admin/settings')}}"
                          enctype="multipart/form-data" class="form-horizontal" role="form">
                        {{ csrf_field() }}
                        <div class="form-body">



                            @foreach($locales as $locale)
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="order">
                                            {{__('common.name_'.$locale->lang)}}
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="name_{{$locale->lang}}" value="{{old('name_'.$locale->lang, $setting->translate($locale->lang)->name)}}" id="name"
                                                   placeholder=" {{__('common.name_'.$locale->lang)}}" >
                                        </div>
                                    </div>
                                </fieldset>
                            @endforeach



                            @foreach($locales as $locale)
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="order">
                                            {{__('common.description_'.$locale->lang)}}
                                        </label>
                                        <div class="col-md-6">
                                            <textarea type="text" class="form-control" name="description_{{$locale->lang}}" id="description"
                                                      placeholder=" {{__('common.description_'.$locale->lang)}}" >{{old('description',$setting->translate($locale->lang)->description)}}</textarea>
                                        </div>
                                    </div>
                                </fieldset>
                             @endforeach
                              @foreach($locales as $locale)
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="order">
                                            {{__('common.goals_'.$locale->lang)}}
                                        </label>
                                        <div class="col-md-6">
                                                      <textarea rows="5" class="form-control ckeditor" name="goals_{{$locale->lang}}"
                                                      placeholder=" {{__('common.goals_'.$locale->lang)}}"
                                                      id="goals_{{$locale->lang}}"
                                                      required>{{old('goals',$setting->translate($locale->lang)->goals)}}</textarea>
                                        </div>
                                    </div>
                                </fieldset>
                             @endforeach

                            @foreach($locales as $locale)
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="order">
                                            {{__('common.key_words_'.$locale->lang)}}
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="keywords_{{$locale->lang}}" value="{{ old('keywords_'.$locale->lang, $setting->translate($locale->lang)->keywords)}}" id="key_words"
                                                   placeholder=" {{__('common.key_words_'.$locale->lang)}}" >
                                        </div>
                                    </div>
                                </fieldset>
                             @endforeach


                              @foreach($locales as $locale)
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="order">
                                            {{__('common.our_vision_'.$locale->lang)}}
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="our_vision_{{$locale->lang}}" value="{{ old('our_vision_'.$locale->lang, $setting->translate($locale->lang)->our_vision)}}" id="our_vision"
                                                   placeholder=" {{__('common.our_vision_'.$locale->lang)}}" >
                                        </div>
                                    </div>
                                </fieldset>
                             @endforeach




                              @foreach($locales as $locale)
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="order">
                                            {{__('common.our_mision_'.$locale->lang)}}
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="our_mision_{{$locale->lang}}" value="{{ old('our_mision_'.$locale->lang, $setting->translate($locale->lang)->our_mision)}}" id="our_mision"
                                                   placeholder=" {{__('common.our_mision_'.$locale->lang)}}" >
                                        </div>
                                    </div>
                                </fieldset>
                             @endforeach
                             @foreach($locales as $locale)
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="order">
                                            {{__('common.our_history_'.$locale->lang)}}
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="our_history_{{$locale->lang}}" value="{{ old('our_history_'.$locale->lang, $setting->translate($locale->lang)->our_history)}}" id="our_history"
                                                   placeholder=" {{__('common.our_history_'.$locale->lang)}}" >
                                        </div>
                                    </div>
                                </fieldset>
                             @endforeach

                            @foreach($locales as $locale)
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="order">
                                            {{__('common.address_'.$locale->lang)}}
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="address_{{$locale->lang}}" value="{{$setting->translate($locale->lang)->address}}" id="address"
                                                   placeholder=" {{__('common.address_'.$locale->lang)}}">
                                        </div>
                                    </div>
                                </fieldset>
                            @endforeach
                             @foreach($locales as $locale)
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="order">
                                            {{__('common.scedule_'.$locale->lang)}}
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="scedule_{{$locale->lang}}" value="{{$setting->translate($locale->lang)->scedule}}" id="scedule"
                                                   placeholder=" {{__('common.scedule_'.$locale->lang)}}">
                                        </div>
                                    </div>
                                </fieldset>
                            @endforeach
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('common.Url')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="url" class="form-control" name="url" value="{{ old('url',$setting->url)}}" id="url"
                                               placeholder="  {{__('common.Url')}}" >
                                    </div>
                                </div>
                            </fieldset>


                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('common.email')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email" value=" {{old('email',$setting->email)}}" id="email"
                                               placeholder="  {{__('common.email')}}" >
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('common.mobile')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="mobile" value="{{old('mobile',$setting->mobile)}}" id="mobile"
                                               placeholder="  {{__('common.mobile')}}" >
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('common.facebook')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="facebook" value="{{old('facebook',$setting->facebook)}}" id="facebook"
                                               placeholder="  {{__('common.facebook')}}" >
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('common.twitter')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="twitter" value="{{ old('twitter',$setting->twitter) }}" id="twitter"
                                               placeholder="  {{__('common.twitter')}}" >
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('common.instagram')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="instagram" value="{{old('instagram',$setting->instagram)}}" id="instagram"
                                               placeholder="  {{__('common.instagram')}}" >
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('common.youtube')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="youtube" value="{{old('youtube',$setting->youtube)}}" id="youtube"
                                               placeholder="  {{__('common.youtube')}}" >
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('common.linked_in')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="linked_in" value="{{old('linked_in',$setting->linked_in)}}" id="linked_in"
                                               placeholder="  {{__('common.linked_in')}}" >
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('common.google')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="google" value="{{old('google',$setting->google)}}" id="google"
                                               placeholder="  {{__('common.google')}}" >
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('common.location')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="location" value="{{old('location',$setting->location)}}" id="location"
                                               placeholder="  {{__('common.location')}}" >
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('common.code')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="code" value="{{old('code',$setting->code)}}" id="code"
                                               placeholder="  {{__('common.code')}}" >
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>{{__('common.logo')}}</legend>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="fileinput-new thumbnail"
                                             onclick="document.getElementById('edit_logo').click()"
                                             style="cursor:pointer">
                                            <img src="{{url($setting->logo)}}" id="editlogo">
                                        </div>
                                        <label class="control-label">{{__('common.logo')}}</label>
                                        <div class="btn red"
                                             onclick="document.getElementById('edit_logo').click()">
                                            <i class="fa fa-pencil"></i>{{__('common.change_image')}}
                                        </div>
                                        <input type="file" class="form-control" name="logo"
                                               id="edit_logo"
                                               style="display:none">
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>{{__('common.imagelogo')}}</legend>
                                <div class="form-group {{ $errors->has('imagelogo') ? ' has-error' : '' }}">
                                    <div class="col-md-6 col-md-offset-3">
                                        @if ($errors->has('imagelogo'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('imagelogo') }}</strong>
                                            </span>
                                        @endif
                                        <div class="fileinput-new thumbnail"
                                             onclick="document.getElementById('edit_imagelogo').click()"
                                             style="cursor:pointer">
                                            <img src="{{ isset($setting) && $setting->imagelogo ? url($setting->imagelogo) :  url('/images/ChoosePhoto.png')}}" id="editImagelogo">
                                        </div>
                                        <label class="control-label">{{__('common.image')}}</label>
                                        <div class="btn red"
                                             onclick="document.getElementById('edit_imagelogo').click()">
                                            <i class="fa fa-pencil"></i>{{__('common.change_icon')}}
                                        </div>
                                        <input type="file" class="form-control" name="imagelogo"
                                               id="edit_imagelogo"
                                               style="display:none">
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>{{__('common.imageback')}}</legend>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="fileinput-new thumbnail"
                                             onclick="document.getElementById('edit_imageback').click()"
                                             style="cursor:pointer">
                                            <img src="{{url($setting->imageback)}}" id="editimageback">
                                        </div>
                                        <label class="control-label">{{__('common.imageback')}}</label>
                                        <div class="btn red"
                                             onclick="document.getElementById('edit_imageback').click()">
                                            <i class="fa fa-pencil"></i>{{__('common.change_image')}}
                                        </div>
                                        <input type="file" class="form-control" name="imageback"
                                               id="edit_imageback"
                                               style="display:none">
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                 <legend>{{__('common.clients')}}</legend>
                            </fieldset>
                            <fieldset>
                                <legend>{{__('common.image_client')}}</legend>
                                <div class="form-group {{ $errors->has('image_client') ? ' has-error' : '' }}">
                                    <div class="col-md-6 col-md-offset-3">
                                        @if ($errors->has('image_client'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('image_client') }}</strong>
                                            </span>
                                        @endif
                                        <div class="fileinput-new thumbnail"
                                             onclick="document.getElementById('edit_image_client').click()"
                                             style="cursor:pointer">
                                            <img src="{{ isset($setting) && $setting->image_client ? url($setting->image_client) :  url('/images/ChoosePhoto.png')}}" id="editImage_client">
                                        </div>
                                        <label class="control-label">{{__('common.image')}}</label>
                                        <div class="btn red"
                                             onclick="document.getElementById('edit_image_client').click()">
                                            <i class="fa fa-pencil"></i>{{__('common.change_icon')}}
                                        </div>
                                        <input type="file" class="form-control" name="image_client"
                                               id="edit_image_client"
                                               style="display:none">
                                    </div>
                                </div>
                            </fieldset>



                            
                                <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">{{__('common.submit')}}</button>
                                        <a href="{{url(getLocal().'/admin/home')}}" class="btn default">{{__('common.cancel')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
@section('script')
    <script>
        $('#edit_image').on('change', function (e) {
            readURL(this, $('#editImage'));
        });

        $('#edit_imagelogo').on('change', function (e) {
            readURL(this, $('#editImagelogo'));
        });

        $('#edit_imageabout').on('change', function (e) {
            readURL(this, $('#editImageabout'));
        });


        $('#edit_logo').on('change', function (e) {
            readURL(this, $('#editlogo'));
        });

         $('#edit_imagefeature').on('change', function (e) {
            readURL(this, $('#editimagefeature'));
        });


        $('#edit_imageback').on('change', function (e) {
            readURL(this, $('#editimageback'));
        });
         $('#edit_image_client').on('change', function (e) {
            readURL(this, $('#editImage_client'));
        });

        $('#edit_imageForEmail').on('change', function (e) {
            readURL(this, $('#editImageForEmail'));
        });

        function format(){
            var e = document.getElementById("type");
            var type = e.options[e.selectedIndex].value;
            //alert(type);

            if(type == 2){

                $('#park').removeClass('hidden');
                $('#edu').prop('required',true);
            }

            if(type == 1){
                $('#park').addClass('hidden');
                $('#edu').prop('required',false);
            }

        }



    </script>
@endsection
