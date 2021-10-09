<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Language;
use App\Models\Setting;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Image;

class ClientController extends Controller
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

        $items = Client::query();
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
        return view('admin.clients.home', [
            'items' => $items,
        ]);

    } 
    public function create()
    {
        // return $specializations;
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {

        $roles = [
            'image' => 'required|mimes:jpeg,bmp,png,gif',
        ];

        $locales = Language::all()->pluck('lang');

       
        $this->validate($request, $roles);
        $item= New Client;
        
        $item->name_en = $request->name_en;
        $item->name_de = $request->name_de;
        $item->details_en = $request->details_en;
        $item->details_de = $request->details_de;
        $item->location_en = $request->location_en;
        $item->location_de = $request->location_de;
        $item->status = $request->status;
        if ($request->hasFile('image')) {
                $file = $request->file('image');
                $name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 
                    9999999) . ".jpg";
                Image::make($file)->resize(800, null, function ($constraint) {$constraint->aspectRatio();})->save("uploads/clients/$name");
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
        return Client::query()->findOrFail($id);
    }

    public function edit($id)
    {
        $item= Client::findOrFail($id);
        $departments = Client::query()->orderBy('id', 'desc')->get();
        return view('admin.clients.edit',['departments'=>$departments,'item'=>$item]);
    }

    public function update(Request $request, $id)
    {
        $roles = [
             'image' => 'mimes:jpeg,bmp,png,gif',
        ];

        

        $this->validate($request, $roles);

        $item= Client::findOrFail($id);

        $item->name_en = $request->name_en;
        $item->name_de = $request->name_de;
        $item->details_en = $request->details_en;
        $item->details_de = $request->details_de;
        $item->location_en = $request->location_en;
        $item->location_de = $request->location_de;
        $item->status = $request->status;
       
         if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . ".jpg";
            Image::make($file)->resize(800, null, function ($constraint) {$constraint->aspectRatio();})->save("uploads/clients/$name");
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
        $item = Client::query()->findOrFail($id);
        if ($item) {
            Client::query()->where('id', $id)->delete();
            return "success";
        }
        return "fail";
    }

    public function changeStatus(Request $request)
    {
        if ($request->event == 'delete') {
            Client::query()->whereIn('id', $request->IDsArray)->delete();
        } else {
            Client::query()->whereIn('id', $request->IDsArray)->update(['status' => $request->event]);
        }
        return $request->event;
    }

}
