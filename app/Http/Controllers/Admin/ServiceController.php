<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Models\Attatchment;
use App\User;
use App\Models\Setting;
use App\Models\Service;
use App\Models\Language;

use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
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

    public function image_extensions(){

        return array('jpg','png','jpeg','gif','bmp');
    }

    public function index(Request $request)
    {

        $items = Service::query();
       // return $items->get();

        if ($request->has('name')) {
            if ($request->get('name') != null)
                $items->whereHas('translations', function ($query) use ($request) {
                    $query->where('locale', app()->getLocale())
                        ->where('name', 'like', '%' . $request->get('title') . '%');
                });
        }

        $items = $items->orderBy('id', 'desc')->get();
        //return $items;
        return view('admin.services.home', [
            'items' => $items,
        ]);

    }
     public function create()
    {
        // return $specializations;
        return view('admin.services.create');
    }

    public function store(Request $request)
    {

        $roles = [
            'image' => 'mimes:jpeg,bmp,png,gif',
        ];

        $locales = Language::all()->pluck('lang');

      
        $this->validate($request, $roles);
        $item= New Service;
        $item->name_en = $request->name_en;
        $item->name_de = $request->name_de;
        $item->details_en = $request->details_en;
        $item->details_de = $request->details_de;
        $item->short_details_en = $request->short_details_en;
        $item->short_details_de = $request->short_details_de;
        $item->status = $request->status;
         if ($request->hasFile('image')) {
                $file = $request->file('image');
                $name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 
                    9999999) . ".jpg";
                Image::make($file)->resize(800, null, function ($constraint) {$constraint->aspectRatio();})->save("uploads/services/$name");
                $item->image=$name;
           }
        $item->save();

        if($item){
            return redirect()->back()->with('status', __('common.create'));
        }
        return redirect()->back()->with('error', __('common.whoops'));
    }
      public function show($id)
    {
        return Service::query()->findOrFail($id);
    }

    public function edit($id)
    {
        $item= Service::findOrFail($id);
        return view('admin.services.edit',['item'=>$item]);
    }

    public function update(Request $request, $id)
    {
        $roles = [
            // 'image' => 'mimes:jpeg,bmp,png,gif',
        ];

        $locales = Language::all()->pluck('lang');

       

        $this->validate($request, $roles);

        $item= Service::findOrFail($id);
        $item->name_en = $request->name_en;
        $item->name_de = $request->name_de;
        $item->details_en = $request->details_en;
        $item->details_de = $request->details_de;
        $item->short_details_en = $request->short_details_en;
        $item->short_details_de = $request->short_details_de;
       
         if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . ".jpg";
            Image::make($file)->resize(800, null, function ($constraint) {$constraint->aspectRatio();})->save("uploads/services/$name");
            $item->image=$name;
       }
        $item->save();

        if($item){
            return redirect()->back()->with('status', __('common.update'));
        }
        return redirect()->back()->with('error', __('common.whoops'));


    }

    public function destroy($id)
    {
        $item = Service::query()->findOrFail($id);
        if ($item) {
            Service::query()->where('id', $id)->delete();
            return "success";
        }
        return "fail";
    }

    public function changeStatus(Request $request)
    {
        if ($request->event == 'delete') {
            Service::query()->whereIn('id', $request->IDsArray)->delete();
        } else {
            Service::query()->whereIn('id', $request->IDsArray)->update(['status' => $request->event]);
        }
        return $request->event;
    }
}
