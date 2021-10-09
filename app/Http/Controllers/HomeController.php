<?php

namespace App\Http\Controllers;
 
use App\Models\Blog;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use App\Models\Setting; 
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Slider;
use App\Models\Photo;
use App\Models\Language;
use App\Models\Client;
use App\Models\Sentence;
use Illuminate\Database\Eloquent\Builder;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $settings = '';
    protected $locales = '';
    //   protected $sentences = '';

    public function __construct()
    {
        $this->locales = Language::all();
        $this->settings = Setting::orderBy('id','desc')->first();
        //   $this->sentences = Sentence::get();

        view()->share('locales', $this->locales);
        view()->share('setting', $this->settings);
        //   view()->share('sentences', $this->sentences);
        // view()->share('pages', $this->pages);
        // view()->share('meal', $this->meal);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */ 
    
    public function index(Request $request)
    {
        $sliders= Slider::all();
        $doctors= Doctor::orderByDesc('id')->limit(3)->get();
        $services= Service::orderByDesc('id')->limit(4)->get();
        $clients= Client::all();
        $photos= Photo::orderByDesc('id')->limit(4)->get();
        $settings=Setting::all();
        return view('site.index')->with([
            'sliders'=>$sliders,
            'doctors'=>$doctors,
            'services'=>$services,
            'clients'=>$clients,
            'photos'=>$photos,
            'settings'=>$settings,
        ]);
    }

    public function contactsus(){
        $photos= Photo::orderByDesc('id')->limit(4)->get();
        return view('site.contactus')->with([
            'photos'=>$photos,
        ]);
    }
    public function service($id){
        $photos= Photo::orderByDesc('id')->limit(4)->get();
        $service=Service::get()->where('id',$id)->first();
        return view('site.services')->with([
            'photos'=>$photos,
            'service'=>$service,
        ]);
    }
   
    public function advertisment(Request $request){


        $settings=Setting::all();
         $countries=Country::all();
        $clients=Client::all();
        $news=Report::orderByDesc('id')->limit(4)->get();
        $partners=Partner::all();
        $items=Advertisment::query(); 

        if ($request->has('name') && $request->get('name') != '') {
        $items= $items->whereHas('advertisment_translations', function (Builder $query)  use ($request) {
        $query->where('name', 'like',  $request->name)->where('locale', app()->getLocale());
        });
        }

        

         if ($request->has('typeuser') && $request->get('typeuser') != '') {
        $items= $items->whereHas('advertisment_translations', function (Builder $query)  use ($request) {
        $query->where('typeuser', 'like',  $request->typeuser)->where('locale', app()->getLocale());
        });
        }

         if ($request->has('floors') && $request->get('floors') != '') {
        $items= $items->whereHas('advertisment_translations', function (Builder $query)  use ($request) {
        $query->where('floors', 'like',  $request->floors)->where('locale', app()->getLocale());
        });
        }


         if ($request->has('duration') && $request->get('duration') != '') {
        $items= $items->whereHas('advertisment_translations', function (Builder $query)  use ($request) {
        $query->where('duration', 'like',  $request->duration)->where('locale', app()->getLocale());
        });
        }

        if (request()->has('category_id') && $request->get('category_id') != '') {
            $items = $items->where('category_id', request()->get('category_id'));
        }


        if (request()->has('country_id') && $request->get('country_id') != '') {
            $items = $items->where('country_id', request()->get('country_id'));
        }


         if (request()->has('city_id') && $request->get('city_id') != '') {
            $items = $items->where('city_id', request()->get('city_id'));
        }


        if (request()->get('price_max') !='' && request()->get('price_min') !='') {
            $items = $items->whereBetween('price', [request()->get('price_min'), request()->get('price_max')]);
        }
        if (request()->get('price_max') !='' && request()->get('price_min')==='') {

            $items = $items->where('price','<=', request()->get('price_max'));
 
        }
        if (request()->get('price_min')!=''  && !request()->get('price_max')==='') {

            $items = $items->where('price','>=', request()->get('price_min'));

        }
        $advetismentseller=$items->orderByDesc('id')->get();
        
        $categories=Category::all();
        $categorieshome=Category::orderByDesc('id')->limit(7)->get();
        return view('site.advertisments')->with(['settings'=>$settings,'news'=>$news,'partners'=>$partners,'clients'=>$clients,'advetismentseller'=>$advetismentseller,'categorieshome'=>$categorieshome,'countries'=>$countries,'categories'=>$categories]);
    }
    public function adssinside($id){
        $adsinside=Advertisment::get()->where('id',$id)->first();
        $settings=Setting::all();
        $partners=Partner::all();
         $countries=Country::all();
        $clients=Client::all();
        $news=Report::orderByDesc('id')->limit(4)->get();
         $categorieshome=Category::orderByDesc('id')->limit(7)->get();
        return view('site.adsinside')->with(['settings'=>$settings,'news'=>$news,'partners'=>$partners,'clients'=>$clients,'adsinside'=>$adsinside,'categorieshome'=>$categorieshome,'countries'=>$countries]);
    }
    
    public function createadss(){
        Auth::shouldUse('web');
        $settings=Setting::all();
        $clients=Client::all();
         $countries=Country::all();
        $types=Type::all();
        $partners=Partner::all();
        $news=Report::orderByDesc('id')->limit(4)->get();
         $categorieshome=Category::orderByDesc('id')->limit(7)->get();
          
        return view('site.createads')->with(['settings'=>$settings,'news'=>$news,'partners'=>$partners,'clients'=>$clients,'categorieshome'=>$categorieshome,'countries'=>$countries,'types'=>$types]);
    }
    public function createadss_investor(){
        $settings=Setting::all();
        $clients=Client::all();
         $countries=Country::all();
        $partners=Partner::all();
        $news=Report::orderByDesc('id')->limit(4)->get();
         $categorieshome=Category::orderByDesc('id')->limit(7)->get();
        return view('site.createads_investor')->with(['settings'=>$settings,'news'=>$news,'partners'=>$partners,'clients'=>$clients,'categorieshome'=>$categorieshome,'countries'=>$countries]);
    }

    

}
