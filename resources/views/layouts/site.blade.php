<!DOCTYPE html lang="{{ app()->getLocale() }}" dir="{{(app()->getLocale()=='ar') ? 'rtl' : 'ltr'}}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <!-- Title -->
  <title>Clinic</title>
  <!-- Stylesheets -->

  <link href="{{url('public/frontend/assets/css/aos.css')}}" rel="stylesheet">
  <link href="{{url('public/frontend/assets/css/themify-icons.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{url('public/frontend/assets/css/fontawesome.min.css')}}">
  <link href="{{url('public/frontend/assets/css/bootstrap.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Krub|Oswald" rel="stylesheet">
  <link href="{{url('public/frontend/assets/css/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{url('public/frontend/assets/css/responsive.css')}}" rel="stylesheet">
  <link href="{{url('public/frontend/assets/css/animate.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{url('public/frontend/assets/css/style.css')}}" rel="stylesheet">
  <link href="{{url('public/frontend/assets/css/media.css')}}" rel="stylesheet">
  <script src="{{url('public/frontend/assets/js/script.js')}}"></script>
  <script src="{{url('public/frontend/assets/js/jquery-1.12.2.min.js')}}"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $( function() {
      $( "#tabs" ).tabs();
    } );
  </script>
  <script src="{{url('public/frontend/assets/js/jquery-1.12.2.min.js')}}"></script>

  <script type="text/javascript">
    $(document).on('click','.nav-link',function(){
      $(this).addClass('scale').siblings().removeClass('scale')
    })
  </script>
  <script src="{{url('public/frontend/assets/js/jssor.slider-28.0.0.min.js')}}" type="text/javascript"></script>
  <script type="text/javascript">
    window.jssor_1_slider_init = function() {

      var jssor_1_SlideshowTransitions = [
        {$Duration:800,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
        {$Duration:800,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
        {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
        {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
        {$Duration:800,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
        {$Duration:800,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
        {$Duration:800,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
        {$Duration:800,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
        {$Duration:800,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
        {$Duration:800,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
        {$Duration:800,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
        {$Duration:800,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
        {$Duration:800,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
        {$Duration:800,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
        {$Duration:800,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
        {$Duration:800,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
        {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
        {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
        {$Duration:800,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
        {$Duration:800,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
        {$Duration:800,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
        {$Duration:800,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
      ];

      var jssor_1_options = {
        $AutoPlay: 1,
        $SlideshowOptions: {
          $Class: $JssorSlideshowRunner$,
          $Transitions: jssor_1_SlideshowTransitions,
          $TransitionsOrder: 1
        },
        $ArrowNavigatorOptions: {
          $Class: $JssorArrowNavigator$
        },
        $ThumbnailNavigatorOptions: {
          $Class: $JssorThumbnailNavigator$,
          $SpacingX: 5,
          $SpacingY: 5
        }
      };

      var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

      /*#region responsive code begin*/

      var MAX_WIDTH = 1920;

      function ScaleSlider() {
        var containerElement = jssor_1_slider.$Elmt.parentNode;
        var containerWidth = containerElement.clientWidth;

        if (containerWidth) {

          var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

          jssor_1_slider.$ScaleWidth(expectedWidth);
        }
        else {
          window.setTimeout(ScaleSlider, 30);
        }
      }

      ScaleSlider();

      $Jssor$.$AddEvent(window, "load", ScaleSlider);
      $Jssor$.$AddEvent(window, "resize", ScaleSlider);
      $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
      /*#endregion responsive code end*/
    };
  </script>
  <script>
    $(document).ready(function(){
      // Add smooth scrolling to all links
      $(".scroll").on('click', function(event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();
          // Store hash
          var hash = this.hash;
          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 1000, function(){

            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        } // End if
      });
    });
  </script>

  <!--new product area start-->
  <link rel="shortcut icon" href="{{url('public/frontend/assets/images/favicon.png')}}"/>
</head>
<body>
<div class="fluied_container">
  <!--menu-->
  <div class="mobile-menu">
    <div class="menu-mobile">
      <div class="mmenu">
        <ul>
          <li href="{{url(app()->getLocale().'/')}}">
            <img class="logo"src="{{ $setting->imagelogo }}" alt=""/>
          </li>
          <li>
            <a  @if(\Request::route()->getName() == 'main') href="#services-section" @else href="{{url(app()->getLocale().'/')}}" @endif class="scroll" class="dropdown">{{__('common.our-services')}}</a>
          </li>
          <li>
            <a  @if(\Request::route()->getName() == 'main') href="#doctors-section" @else href="{{url(app()->getLocale().'/')}}" @endif class="scroll" class="dropdown">{{__('common.doctors')}}</a>
          </li>
          <li href="{{url(app()->getLocale().'/contactus')}}">
            <a class="dropdown">{{__('common.contactus')}}</a>
          </li>
          <li data-toggle="modal" data-target="#formDonate">
            <a class="dropdown" >{{__('common.make-appiontment')}}</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="m-overlay"></div>
  </div>
  <!--End menu-->

  <!--Start First Section-->
  <div class="first-section">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-xs-6">
          <span class="ti-location-pin icon icon-location"></span>
          <h5>{{__('common.location')}} : {{ $setting->location }}</h5>
        </div>
        <div class="col-sm-6 col-xs-6">
          <h5>{{__('common.mobile')}} : {{ $setting->mobile }}</h5>
        </div>
        <div class="col-sm-3 col-xs-12" style="text-align: right;">
          <h4>
            @if(app()->getLocale() == 'en')
              <a style="color:#fff; font-weight: bold;" href="{{ LaravelLocalization::getLocalizedURL('de', null, [], true) }}">German</a>
            @else
              <a style="color:#fff; font-weight: bold;" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">English</a>
            @endif
          </h4>
        </div>
      </div>
    </div>
  </div>
  <!--End First Section-->


  <!--Start main menu-->
  <div class="container header" id="myHeader" style="z-index:2000">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-7 col-logo">
        <a href="{{url(app()->getLocale().'/')}}">
          <img class="logo"src="{{ $setting->imagelogo }}" alt=""/>
        </a>
      </div>
      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-5" style="padding-left:0px;">
        <ul class="main_menu clearfix">
          <a href="{{url(app()->getLocale().'/')}}">
            <li class="listitemsecandarynav1 dropdown active">{{__('common.home')}}</li>
          </a>
          <a  @if(\Request::route()->getName() == 'main') href="#about-section" @else href="{{url(app()->getLocale().'/')}}" @endif class="scroll">
            <li class="listitemsecandarynav dropdown drop-home">{{__('common.about_us')}}</li>
          </a>
          <a  @if(\Request::route()->getName() == 'main') href="#doctors-section" @else href="{{url(app()->getLocale().'/')}}" @endif class="scroll">
            <li class="listitemsecandarynav dropdown drop-home">{{__('common.doctors')}}</li>
          </a>

          <a  @if(\Request::route()->getName() == 'main') href="#services-section" @else href="{{url(app()->getLocale().'/')}}" @endif class="scroll">
            <li class="listitemsecandarynav dropdown drop-home">{{__('common.our-services')}}</li>
          </a>

          <a href="{{url(app()->getLocale().'/contactus')}}"  class="scroll">
            <li class="listitemsecandarynav dropdown drop-home">{{__('common.contactus')}}</li>
          </a>
          <a  data-toggle="modal" data-target="#formDonate">
            <li class="listitemsecandarynav dropdown drop-home btn_login" style="color:#eee; position: relative;top: 5px;left:40px;">{{__('common.make-appiontment')}}</li>
          </a>
        </ul>
        <button type="button" class="hamburger is-closed">
          <span class="hamb-top"></span>
          <span class="hamb-middle"></span>
          <span class="hamb-bottom"></span>
        </button>
      </div>

    </div>
  </div>
  <!--End main menu-->

@yield('content')

<!--Start Footer-->
  <div class="row footer">
    <div class="col-sm-2 col-xs-12">
      <h4 class="title-footer">{{__('common.links')}}</h4>
      <ul>
        <li class="li-footer">
          <a href="{{url(app()->getLocale().'/')}}">{{__('common.home')}}</a>
        </li>
        <li class="li-footer">
          <a  @if(\Request::route()->getName() == 'main') href="#services-section" @else href="{{url(app()->getLocale().'/')}}" @endif class="scroll">{{__('common.our-services')}}</a>
        </li>
        <li class="li-footer">
          <a href="{{url(app()->getLocale().'/contactus')}}">{{__('common.contactus')}}</a></li>
      </ul>
    </div>
    <div class="col-sm-7 col-xs-12">
      <h4 class="title-footer">{{__('common.gallary')}}</h4>
      @forelse($photos as $photo)
        <div class="col-sm-3 col-xs-6">
          <img src="{{ $photo->image }}" class="img-footer" alt="img-footer"/>
        </div>
        @empty
        {{__('common.no')}}
        @endforelse
        </ul>
    </div>
    <div class="col-sm-3 col-xs-12">
      <img src="{{ $setting->logo }}" class="img-footer-final" alt=""/>
      <h4 class="copy-footer">{{__('common.copy-right')}}</h4>
    </div>
  </div>
  <!--End Footer-->
</div>
<!--End Fulid Container-->


<!-- Modal -->
<div class="modal fade" id="formDonate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog class1" role="document">
    <div class="modal-content class2">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title error-product" id="myModalLabel" class="name-of-register">{{__('common.make-appiontment')}}</h4>
      </div>
      <div class="row">
        <div class="col-sm-6 col-xs-12">
          @forelse($doctors as $doctor)
            <div class="row row-doctors">
              <div class="col-xs-4">
                <img src="{{ $doctor->image }}" class="img-popup" alt=""/>
              </div>
              <div class="col-xs-8">
                <h4 class="name-pop-up">
                  @if(app()->getLocale() == 'de')
                    {{$doctor->name_de}}
                  @else
                    {{$doctor->name_en}}
                  @endif
                </h4>
              </div>
            </div>
          @empty
            {{__('common.no')}}
          @endforelse
        </div>
        <div class="col-sm-6 col-xs-12">
          <form method="post" action="{{url(app()->getLocale().'/index')}}"
                enctype="multipart/form-data"  role="form" class="row">
            {{ csrf_field() }}
            <div class="col-sm-12 col-xs-12 col-register-home">
              <div class="input-group input-in-register">
                <div class="form-group label-floating" style="border-radius: 5px;" >
                  <select  name="doctor" required class="form-control input-register-home input-background" placeholder="{{__('common.doctor')}}">
                    @forelse($all_doctors as $doctor)
                      <option value="
                         @if(app()->getLocale() == 'de')
                      {{$doctor->name_de}}
                      @else
                      {{$doctor->name_en}}
                      @endif
                              ">
                        @if(app()->getLocale() == 'de')
                          {{$doctor->name_de}}
                        @else
                          {{$doctor->name_en}}
                        @endif
                      </option>
                    @empty
                      {{__('common.no')}}
                    @endforelse
                  </select>
                </div>
              </div>
            </div>
            <div class="input-group input-in-register">
              <div class="form-group label-floating">
                <input name="name" value="{{ old('name') }}" type="text" style="border-radius: 5px;" class="form-control input-register-home input-background" placeholder="{{__('common.name')}}" required>
              </div>
            </div>
            <div class="col-sm-6 col-xs-12 col-register-home">
              <div class="input-group input-in-register">
                <div class="form-group label-floating">
                  <input name="age" value="{{ old('age') }}" style="border-radius: 5px;" type="number" class="form-control input-register-home input-background" placeholder="{{__('common.age')}}" required >
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xs-12 col-register-home">
              <div class="input-group input-in-register">
                <div class="form-group label-floating">
                  <select  name="gender"style="border-radius: 5px;" class="form-control input-register-home input-background" placeholder="{{__('common.gender')}}" required>
                    <option value="male">Male</option>
                    <option value="female">Femail</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xs-12 col-register-home">
              <div class="input-group input-in-register">
                <div class="form-group label-floating">
                  <input name="mobile" style="border-radius: 5px;" value="{{ old('mobile') }}" type="text" class="form-control input-register-home input-background" placeholder="{{__('common.mobile')}}" required >
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xs-12 col-register-home">
              <div class="input-group input-in-register">
                <div class="form-group label-floating">
                  <input name="email" style="border-radius: 5px;" value="{{ old('email') }}" type="email" class="form-control input-register-home input-background" placeholder="{{__('common.email')}}" required>
                </div>
              </div>
            </div>
            <div class="input-group input-in-register">
              <div class="form-group label-floating">
                <textarea name="resone" style="border-radius: 5px;" value="{{ old('resone') }}" type="text" rows="6" class="form-control input-register-home" placeholder="{{__('common.resone')}}" required></textarea>
              </div>
            </div>
            <button class="btn btn-register-home">{{__('common.send_appiontment')}}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End Model Pop Up-->

<script src="{{url('public/frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('public/frontend/assets/js/owl.carousel.min.js')}}" type="text/javascript"></script>
<script src="{{url('public/frontend/assets/js/script.js')}}"></script>
<script src="{{url('public/frontend/assets/js/aos.js')}}"></script>
<script>
  AOS.init({
    duration: 1000,
  });
</script>
<script>
  window.onscroll = function() {myFunction()};

  var header = document.getElementById("myHeader");
  var sticky = header.offsetTop;

  function myFunction() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }
</script>
</body>
