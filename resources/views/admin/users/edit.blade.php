@extends('layouts.cp')
@section('title') {{ucwords(__('cp.edit_user'))}} @endsection
@section('css') @endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase"
                              style="color: #e02222 !important;">{{__('cp.edit_user')}}</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form method="post" action="{{url(app()->getLocale().'/admin/users/'.$item->id)}}"
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
                                        <input type="text" name="name" class="form-control"  value="{{ old('name',$item->name) }}"
                                               placeholder=" {{__('common.name')}}" required>
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
                                        <input type="text"  class="form-control" name="email" value="{{ old('email',$item->email) }}"
                                               placeholder=" {{__('common.email')}}"  required>
                                    </div>
                                </div>
                            </fieldset>
                             <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('common.country')}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text"  class="form-control" name="country" value="{{ old('country',$item->country) }}"
                                               placeholder=" {{__('common.country')}}"  required>
                                    </div>
                                </div>
                            </fieldset>
                             <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('common.city')}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text"  class="form-control" name="city" value="{{ old('city',$item->city) }}"
                                               placeholder=" {{__('common.city')}}"  required>
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
                                        <input type="text" class="form-control" name="mobile" value="{{ old('mobile',$item->mobile) }}"
                                               placeholder=" {{__('common.mobile')}}" required>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="category_id">
                                    {{__('common.status')}}
                                    <span class="symbol">*</span>
                                </label>
                                <div class="col-md-6">
                                    <select class="form-control select2" name="status" required  id="status_id">
                                        <option value="" > {{__('common.select')}}</option>
                                        
                                            <option value="0"  @if($item->status == 0 ) selected @endif >
                                                {{__('common.not_active')}}
                                            </option>

                                            <option value="1"  @if($item->status == 1) selected @endif >
                                                {{__('common.active')}}
                                            </option>
                                            <option value="2"  @if($item->status == 2) selected @endif >
                                                {{__('common.Prohibited')}}
                                            </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">{{__('common.submit')}}</button>
                                        <a href="{{url(getLocal().'/admin/users')}}" class="btn default">{{__('common.cancel')}}</a>
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
    </script>
@endsection
