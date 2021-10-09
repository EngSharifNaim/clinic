@extends('layouts.site')
@section('content')

    <!--Start Cover Image-->
      <div class="row">
        <div class="col-xs-12" style="padding-left:0px;padding-right:0px;">
          <div class="cover-img" style="background-image: url({{ $setting->imageback }});" data-aos="zoom-in">
            <div class="rgba-serices">
              <h4 class="heading-services">
                @if(app()->getLocale() == 'de')
                      {{$service->name_de}}
                      @else
                      {{$service->name_en}}
                @endif
              </h4>  
            </div>
          </div>
        </div>
      </div>
    <!--End Cover Image-->
    
    
    
    <!--Start Content-->
      <div class="container">
        <div class="row row-services">
          <div class="col-xs-12">
            <h4>
                @if(app()->getLocale() == 'de')
                      {{$service->name_de}}
                      @else
                      {{$service->name_en}}
                @endif
            </h4>
            <h5>
               @if(app()->getLocale() == 'de')
                      {{strip_tags($service->details_de)}}
                      @else
                      {{strip_tags($service->details_en)}}
                @endif
            </h5>
          </div>
        </div>
      </div>
    <!--End Content-->
@endsection