@extends('layouts.cp')
@section('title')
    {{__('common.add')}}  {{__('cp.new_manager')}}
@endsection
@section('css')

    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjOp2BjQx-ruFkTnb4mB_2m3eFtcCyPbU&sensor=false&libraries=places">
            </script>
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
                              style="color: #e02222 !important;"> {{__('common.add')}}  {{__('cp.new_manager')}}</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form method="post" action="{{url(app()->getLocale().'/admin/managers')}}"
                          enctype="multipart/form-data" class="form-horizontal" role="form">
                        {{ csrf_field() }}

                        <div class="form-body">

                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('common.name')}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control"  value="{{ old('name') }}"
                                               placeholder=" {{__('common.name')}}"  required>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('common.email')}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text"  class="form-control" name="email" value="{{ old('email') }}"
                                               placeholder=" {{__('common.email')}}"  required>
                                    </div>
                                </div>
                            </fieldset>


                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('common.mobile')}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}"
                                               placeholder=" {{__('common.mobile')}}"  required>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('common.password')}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password" value="{{ old('passowrd') }}"
                                               placeholder=" {{__('common.password')}} "  required>
                                    </div>
                                </div>
                            </fieldset>


                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('common.confirm_password')}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="confirm_password" value="{{ old('confirm_password') }}"
                                               placeholder=" {{__('common.confirm_password')}} "  required>
                                    </div>
                                </div>
                            </fieldset>




                            <fieldset>
                                <legend>{{__('common.image')}}</legend>
                                <div class="form-group {{ $errors->has('avatar') ? ' has-error' : '' }}">
                                    <div class="col-md-6 col-md-offset-3">
                                        @if ($errors->has('avatar'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('avatar') }}</strong>
                                            </span>
                                        @endif
                                        <div class="fileinput-new thumbnail"
                                             onclick="document.getElementById('avatar').click()"
                                             style="cursor:pointer">
                                            <img src=" {{url('images/ChoosePhoto.png')}}"  id="avatarImage">
                                        </div>
                                        <label class="control-label">{{__('common.image')}}</label>
                                        <div class="btn red"
                                             onclick="document.getElementById('avatar').click()">
                                            <i class="fa fa-pencil"></i>{{__('common.change_image')}}
                                        </div>
                                        <input type="file" class="form-control" name="avatar"
                                               id="avatar"
                                               style="display:none">
                                    </div>
                                </div>
                            </fieldset>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">{{__('common.submit')}}</button>
                                        <a href="{{url(getLocal().'/admin/managers')}}" class="btn default">{{__('common.cancel')}}</a>
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
        $('#avatar').on('change', function (e) {
            readURL(this, $('#avatarImage'));
        });



        /* script Map */
        function initialize() {
            var latlng = new google.maps.LatLng('', '');
            var map = new google.maps.Map(document.getElementById('map'), {
                center: latlng,
                zoom: 10
            });
            var marker = new google.maps.Marker({
                map: map,
                position: latlng,
                draggable: true,
                anchorPoint: new google.maps.Point(0, -29)
            });
            var input = document.getElementById('searchInput');
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            var geocoder = new google.maps.Geocoder();
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);
            var infowindow = new google.maps.InfoWindow();
            autocomplete.addListener('place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    return;
                }

                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }

                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                bindDataToForm(place.formatted_address, place.geometry.location.lat(), place.geometry.location.lng());
                infowindow.setContent(place.formatted_address);
                infowindow.open(map, marker);

            });
            // this function will work on marker move event into map
            google.maps.event.addListener(marker, 'dragend', function () {
                geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            bindDataToForm(results[0].formatted_address, marker.getPosition().lat(), marker.getPosition().lng());
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);
                        }
                    }
                });
            });
        }

        function bindDataToForm(address, lat, lng) {
            document.getElementById('location').value = address;
            document.getElementById('lat').value = lat;
            document.getElementById('lng').value = lng;
//                                                console.log('location = ' + address);
//                                                console.log('lat = ' + lat);
//                                                console.log('lng = ' + lng);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection
