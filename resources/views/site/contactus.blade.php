@extends('layouts.site')
@section('content')

    <!--Start Cover Image-->
      <div class="row">
        <div class="col-xs-12" style="padding-left:0px;padding-right:0px;">
          <div class="cover-img" style="background-image: url({{ $setting->imageback }});" data-aos="zoom-in">
            <div class="rgba-serices">
              <h4 class="heading-services">Contact Us</h4>  
            </div>
          </div>
        </div>
      </div>
    <!--End Cover Image-->
    <!--Flash Message-->
    <div class="container" style="margin-top:20px;">
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
          <ul style="border: 1px solid #018005;background-color: #fff; padding-right:10px;">
              <li class="validation-role" style="font-weight: bold; color: #018005; margin: 15px">{{  session('status')  }}</li>
          </ul>
      @endif
    </div>
    <!--Flash Message-->
    <!--Start Content-->
      <div class="container">
        <div class="row row-contactus">
          <div class="col-sm-8 col-xs-12">
            <div class="col-sm-6 col-xs-12 col-contactus">
              <div class="col-xs-4">
                <span class="ti-mobile icon"></span>
              </div>
              <div class="col-xs-8">
                <h4>mobile number</h4>
                <h5>{{ $setting->mobile }}</h5>
              </div>
            </div>
            <div class="col-sm-6 col-xs-12 col-contactus">
              <div class="col-xs-4">
                <span class="ti-email icon"></span>
              </div>
              <div class="col-xs-8">
                <h4>email address</h4>
                <h5>{{ $setting->email }}</h5>
              </div>
            </div>
            <div class="col-sm-6 col-xs-12 col-contactus">
              <div class="col-xs-4">
                <span class="ti-location-pin icon"></span>
              </div>
              <div class="col-xs-8">
                <h4>location</h4>
                <h5>{{ $setting->location }}</h5>
              </div>
            </div>
            <div class="col-sm-6 col-xs-12 col-contactus">
              <div class="col-xs-4">
                <span class="ti-time icon"></span>
              </div>
              <div class="col-xs-8">
                <h4>scedule</h4>
                <h5>{{ $setting->scedule }}</h5>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-xs-12">
            <form method="post" action="{{url(app()->getLocale().'/contactus')}}"
                          enctype="multipart/form-data" class="form-horizontal form-contact-page" role="form" class="row"> 
                          {{ csrf_field() }}
              <div class="input-group inputs-in-contactus-page">
                <div class="form-group label-floating">
                  <input name="name" value="{{ old('name') }}" required type="text" class="form-control input-register" placeholder="Name" style="border-radius:5px;">
                </div>
              </div>
              <div class="input-group inputs-in-contactus-page">
                <div class="form-group label-floating"> 
                  <input name="mobile" value="{{ old('mobile') }}" required type="text" class="form-control input-register" placeholder="Mobile" style="border-radius:5px;">
                </div>
              </div>
              <div class="input-group inputs-in-contactus-page">
                <div class="form-group label-floating">
                  <input name="email" value="{{ old('email') }}" required type="email" class="form-control input-register" placeholder="Email" style="border-radius:5px;">
                </div>
              </div>
              <div class="input-group inputs-in-contactus-page">
                <div class="form-group label-floating">
                  <textarea name="comment" value="{{ old('comment') }}" required type="text" rows="3" class="form-control input-register" style="border-radius:5px;" placeholder="Comment"></textarea>
                </div>
              </div>
              <button class="btn btn-contactpage">Send message</button>
            </form>
          </div>
        </div>
      </div>
    <!--End Content-->
@endsection