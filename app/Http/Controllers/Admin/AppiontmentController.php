<?php

namespace App\Http\Controllers\Admin;


use App\Models\Appiontment;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppiontmentController extends Controller
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
        $items = Appiontment::query();

        if ($request->has('name')) {
            if ($request->get('name') != null)
                $items->whereHas('translations', function ($query) use ($request) {
                    $query->where('locale', app()->getLocale())
                        ->where('name', 'like', '%' . $request->get('title') . '%');
                });
        }

        $items = $items->orderBy('id', 'desc')->get();
        //return $items;
        return view('admin.appiontments.home', [
            'items' => $items,
        ]);

    }
     public function show($id)
    {
        return Appiontment::query()->findOrFail($id);
    }
 
    public function edit($id)
    {
        $item= Appiontment::findOrFail($id);
        return view('admin.appiontments.edit',['item'=>$item]);
    }

    public function update(Request $request, $id)
    {
        $locales = Language::all()->pluck('lang');


        $item= Appiontment::findOrFail($id);
        $item->name = $request->name;
        $item->email = $request->email;
        $item->mobile = $request->mobile;
        $item->age = $request->age;
        $item->gender = $request->gender;
        $item->resone = $request->resone;
        $item->save();

        if($item){
            return redirect()->back()->with('status', __('common.update'));
        }
        return redirect()->back()->with('error', __('common.whoops'));
    }
    public function destroy($id)
    {
        $item = Appiontment::query()->findOrFail($id);
        if ($item) {
            Appiontment::query()->where('id', $id)->delete();
            return "success";
        }
        return "fail";
    }

    public function changeStatus(Request $request)
    {
        if ($request->event == 'delete') {
            Appiontment::query()->whereIn('id', $request->IDsArray)->delete();
        } else {
            Appiontment::query()->whereIn('id', $request->IDsArray)->update(['status' => $request->event]);
        }
        return $request->event;
    }

    public function create()
    {
        return view('site.index');
    }

    public function store(Request $request)
    {

        $item= New Appiontment;
        $item->name = $request->name;
        $item->email = $request->email;
        $item->mobile = $request->mobile;
        $item->age = $request->age;
        $item->gender = $request->gender;
        $item->resone = $request->resone;
        $item->save();

        if($item){
            return redirect()->back()->with('status', __('common.create'));
        }
        return redirect()->back()->with('error', __('common.whoops'));
    }
}
