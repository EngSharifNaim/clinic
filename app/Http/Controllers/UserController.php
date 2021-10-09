<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Setting;
use App\Models\Client;
use App\Models\Partner;
use App\Models\Report;
use App\Models\Language;
use App\User;
use Image;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewPostNotification;

use Illuminate\Validation\Rule;
use Mockery\Exception;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
   protected $settings = '';
    protected $locales = '';

    public function __construct()
    {
        $this->locales = Language::all();
        $this->settings = Setting::orderBy('id','desc')->first();
        view()->share('locales', $this->locales);
        view()->share('setting', $this->settings);
    }


    public function index(Request $request)
    {
        $items = User::query();

        if ($request->has('name')) {
            if ($request->get('name') != null)
                $items->whereHas('translations', function ($query) use ($request) {
                    $query->where('locale', app()->getLocale())
                        ->where('name', 'like', '%' . $request->get('title') . '%');
                });
        }

        $items = $items->orderBy('id', 'desc')->get();
        //return $items;
        return view('site.myaccount', [
            'items' => $items,
        ]);

    }
     public function show($id)
    {
        return User::query()->findOrFail($id);
    }

    public function edit()
    {
        $item= User::find(Auth::id());

        $settings=Setting::all();
        $clients=Client::all();
        $items=User::find(Auth::id());
        $news=Report::orderByDesc('id')->limit(4)->get();
        $partners=Partner::all();
        return view('site.myaccount',['settings'=>$settings,'news'=>$news,'partners'=>$partners,'clients'=>$clients,'item'=>$item,'items'=>$items]);
    }

    public function update(Request $request)
    {


    $rules = [
            'email' => 'required|email|unique:users,email',
            'name' => 'required|min:3',
            'password' => '|min:8|confirmed',
        ];
        $validator = Validator::make($request->all(), $rules);

      /*  if ($validator->fails()) {
          return back() //change this to your desired url
            ->withErrors($validator)
                ->withInput();
        }*/


        $items= User::find(Auth::id()); 
        $items->name = $request->name; 
        $items->email = $request->email;
        $items->mobile = $request->mobile;
        $items->country = $request->country;
        $items->city = $request->city;
 

        if($request->has('password') && $request->has('password_confirmation')){
            if($request->has('password') === $request->has('password_confirmation')){
                 $items->password = Hash::make($request->password);

            }else{
                //return error not match
            }
        }
        $items->save();

        if($items){
            return redirect()->back()->with('status', __('common.update'));
        }
        return redirect()->back()->with('error', __('common.whoops'));
    }
}
