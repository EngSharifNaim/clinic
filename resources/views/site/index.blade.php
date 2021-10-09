@extends('layouts.site')
@section('content')
    <!--Start Slider-->
      <div class="row">
        <div class="col-xs-12" style="padding-right:0px;padding-left:0px;">
          <div id="jssor_1" style="position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
                        <!-- Loading Screen -->
                        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                          <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
                        </div>
                        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
                           @forelse($sliders as $slider)
                          <div>
                            <img data-u="image" src="{{ $slider->image }}" />
                            <img data-u="thumb" src="{{ $slider->image }}" />
                          </div>
                          @empty
                        {{__('common.no')}}
                         @endforelse
                        </div><a data-scale="0" href="https://www.jssor.com" style="display:none;position:absolute;">web animation</a>
                        <!-- Thumbnail Navigator -->
                        <div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;bottom:0px;width:980px;height:100px;background-color:#fff;" data-autocenter="1" data-scale-bottom="0.75">
                          <div data-u="slides">
                            <div data-u="prototype" class="p" style="width:190px;height:90px;">
                              <div data-u="thumbnailtemplate" class="t"></div>
                              <svg viewbox="0 0 16000 16000" class="cv">
                                <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                                <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                                <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                              </svg>
                            </div>
                          </div>
                        </div>
                        <!-- Arrow Navigator -->
                        <div data-u="arrowleft" class="jssora106" style="width:55px;height:55px;top:162px;left:30px;" data-scale="0.75">
                          <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                            <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                            <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
                          </svg>
                        </div>
                        <div data-u="arrowright" class="jssora106" style="width:55px;height:55px;top:162px;right:30px;" data-scale="0.75">
                          <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                            <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                            <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
                          </svg>
                        </div>
          </div>
          <script type="text/javascript">jssor_1_slider_init();
          </script>
        </div>
      </div>
    <!--End Slider-->
    <div class="container con-content">
        <div class="row row-heading-content" >
            <div class="col-xs-12" id="about-section">
                <h3 class="heading-of-content">About Us</h3>
                <div class="c-line-center-projects c-theme-bg aos-init"></div>
            </div>
        </div>
            <div class="row row-content" >
                <div class="col-sm-6 col-xs-12">
                    <img src="http://zgp-elmodalal.de/public/images/about.jpg" class="img-doctor-home" alt="Doctor"/>
                </div>

                <div class="col-sm-6 col-xs-12">
                    <h3 class="name-doctor">
                        Herzlich Willkommen auf unserer Internetseite
                    </h3>
                    <h5 class="description-doctor">
                        Sie sind auf der Suche nach einer professionellen Zahnarztpraxis in Mainz-Laubenheim?
                        Wir sind eine zahnärztliche Gemeinschaftspraxis in Mainz- Laubenheim.
                        Wir bieten das gesamte Leistungsspektrum der modernen Zahnheilkunde unter einem Dach einschließlich eines klein zahntechnischen Labors.
                        In unseren modernen Räumen bieten wir Ihnen individuelle Zahnheilkunde in einem entspannten Umfeld.
                        Wir stehen für qualitativ hochwertige Zahnmedizin mit Herz und sorgen nicht nur für schöne, sondern nachhaltig auch für gesunde Zähne.
                        Bei uns wird Einfühlungsvermögen groß geschrieben, um keine Angst aufkommen zu lassen.
                        Ob groß oder klein – bei uns ist Ihre ganze Familie willkommen.

                    </h5>
                </div>
            </div>
    </div>

    <!--Start Content-->
      <div class="container con-content">
        <div class="row row-heading-content" >
          <div class="col-xs-12" id="doctors-section">
            <h3 class="heading-of-content">{{__('common.our-doctors-staff')}}</h3>
            <div class="c-line-center-projects c-theme-bg aos-init"></div>
          </div>
        </div>
        <?php $i=1?>
        @forelse($doctors as $doctor)
        <?php if($i % 2){?>
        <div class="row row-content" >
          <div class="col-sm-6 col-xs-12">
            <h3 class="name-doctor">
              @if(app()->getLocale() == 'de')
                {{$doctor->name_de}}
                @else
                {{$doctor->name_en}}
              @endif
            </h3>
            <h5 class="description-doctor">
              @if(app()->getLocale() == 'de')
                  {!! strip_tags($doctor->description_de) !!}
                  @else
                  {!! strip_tags($doctor->description_en) !!}
              @endif
            </h5>
          </div>
          <div class="col-sm-6 col-xs-12">
            <img src="{{ $doctor->image }}" class="img-doctor-home" alt="Doctor"/>
          </div>
        </div>
        <?php }else{?>
        <div class="row row-content" >
          <div class="col-sm-6 col-xs-12" data-aos="flip-down">
            <img src="{{ $doctor->image }}" class="img-doctor-home" alt="Doctor"/>
          </div>
          <div class="col-sm-6 col-xs-12" data-aos="flip-up">
            <h3 class="name-doctor">
              @if(app()->getLocale() == 'de')
                {{$doctor->name_de}}
                @else
                {{$doctor->name_en}}
              @endif
            </h3>
            <h5 class="description-doctor">
                @if(app()->getLocale() == 'de')
                    {!! strip_tags($doctor->description_de) !!}
                @else
                    {!! strip_tags($doctor->description_en) !!}
                @endif
            </h5>
          </div>
        </div>
          <?php } $i++ ?>
        @empty
        {{__('common.no')}}
      
         @endforelse
        <div class="row row-heading-content" id="services-section">
          <div class="col-xs-12">
            <h3 class="heading-of-content">{{__('common.our-services')}}</h3>
            <div class="c-line-center-projects c-theme-bg aos-init"></div>
          </div>
        </div>
        <div class="contaienr">
          <div class="row">
            @forelse($services as $service)
            <a href="{{url(getLocal().'/services'). '/' .$service->id}}">
              <div class="col-sm-6 col-xs-12 col-service" data-aos="fade-up"
                data-aos-anchor-placement="top-bottom">
                <div class="col-sm-6 col-xs-12">
                  <img src="{{ $service->image }}" class="img-services" alt="Service"/>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <h3 class="name-of-services">
                    @if(app()->getLocale() == 'de')
                        {{$service->name_de}}
                        @else
                        {{$service->name_en}}
                    @endif
                  </h3>
                  <h6 class="desc-of-services">
                    @if(app()->getLocale() == 'de')
                        {{strip_tags($service->short_details_de)}}
                        @else
                        {{strip_tags($service->short_details_en)}}
                    @endif
                  </h6>
                </div>
              </div>
            </a>
            @empty
            {{__('common.no')}}
            @endforelse
          </div>
        </div>
      </div>
    <!--End Content-->
    
    <!--sectionTestimonials-->
      <div class="row">
        <div class="col-xs-12">
          <section class="sectionTestimonials" style="background-image: url({{ $setting->image_client }});">
            <div class="rgba-clients">
              <div class="container" data-aos="zoom-in">
                <div class="secHead">
                  <div class="row row-heading-content">
                    <div class="col-xs-12">
                      <h3 class="heading-of-client">{{__('common.client-stories')}}</h3>
                      <div class="c-line-center-clients c-theme-bg aos-init"></div>
                    </div>
                  </div>
                </div>
                <div class="owl-carousel" id="testimonials-slider">
                  @forelse($clients as $client)
                    <div class="item">
                      <div class="client-item">
                        <div class="client-link">
                          <img src="{{ $client->image }}"  alt="" class="img-responsive">
                        </div>
                        <div class="secTitle">
                          <p>
                            @if(app()->getLocale() == 'de')
                                {{strip_tags($client->details_de)}}
                                @else
                                {{strip_tags($client->details_en)}}
                            @endif
                          </p>
                          <h4>
                            @if(app()->getLocale() == 'de')
                                {{$client->name_de}}
                                @else
                                {{$client->name_en}}
                            @endif
                          </h4>
                          <span><i class="ti-location-pin"></i>
                            @if(app()->getLocale() == 'de')
                                {{strip_tags($client->location_de)}}
                                @else
                                {{strip_tags($client->location_en)}}
                            @endif
                          </span>
                        </div>
                      </div>
                    </div>
                  @empty
                  {{__('common.no')}}
                  @endforelse
                    
                  </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    <!--sectionTestimonials-->

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

    <!--Start Contact US-->
      <div class="container" data-aos="fade-up"
     data-aos-anchor-placement="center-bottom">
        <div class="row row-heading-content" id="contactus-section">
          <div class="col-xs-12">
            <h3 class="heading-of-content">{{__('common.contactus')}}</h3>
            <div class="c-line-center-projects c-theme-bg aos-init"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-contact">
           <form method="post" action="{{url(app()->getLocale().'/index')}}"
                          enctype="multipart/form-data" class="form-horizontal form-contact" role="form" class="row"> 
                          {{ csrf_field() }}
              <div class="input-group inputs-in-contact">
                <div class="form-group label-floating">
                  <input  name="name" value="{{ old('name') }}"  type="text" class="form-control input-register" required placeholder="{{__('common.name')}}"style="border-radius:5px;  ">
                </div>
              </div>
              <div class="input-group inputs-in-contact">
                <div class="form-group label-floating">
                  <input  name="mobile" value="{{ old('mobile') }}"  type="text" class="form-control input-register" required placeholder="{{__('common.mobile')}}"style="border-radius:5px;">
                </div>
              </div>
              <div class="input-group inputs-in-contact">
                <div class="form-group label-floating">
                  <input  name="email" required value="{{ old('email') }}"  type="email" class="form-control input-register" placeholder="{{__('common.email')}}" style="border-radius:5px;">
                </div>
              </div>
              <div class="input-group inputs-in-contact">
                <div class="form-group label-floating">
                  <textarea  name="comment" required value="{{ old('comment') }}"  type="text" rows="6" class="form-control input-register" style="border-radius:5px;" placeholder="{{__('common.message')}}"></textarea>
                </div>
              </div>
              <button class="btn btn-contact">{{__('common.send')}}</button>
            </form>
          </div>
          
        </div>
      </div>
    <!--End Contact US-->
    
@endsection