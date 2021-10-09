<?php
 
namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Models\Setting; 
use App\Models\Photo;
use App\Models\Language;
use App\Models\Attatchment;
use App\User;

use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
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

        $items = Photo::query();
        if ($request->has('name')) {
            if ($request->get('name') != null)
                $items->whereHas('translations', function ($query) use ($request) {
                    $query->where('locale', app()->getLocale())
                        ->where('name', 'like', '%' . $request->get('title') . '%');
                });
        }

        $items = $items->orderBy('id', 'desc')->get();
        return view('admin.photos.home', [
            'items' => $items,
        ]);

    }
     public function create()
    {
        // return $specializations;
        return view('admin.photos.create');
    }

    public function store(Request $request)
    {

        $roles = [
            'image' => 'required|mimes:jpeg,bmp,png,gif',
        ];

        $locales = Language::all()->pluck('lang');

     
        $this->validate($request, $roles);
        $item= New Photo;
         if ($request->hasFile('image')) {
                $file = $request->file('image');
                $name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 
                    9999999) . ".jpg";
                Image::make($file)->resize(800, null, function ($constraint) {$constraint->aspectRatio();})->save("uploads/photos/$name");
                $item->image=$name;
           }
           $item->status = $request->status;
        $item->save();

        if($item){
            return redirect()->back()->with('status', __('common.create'));
        }
        return redirect()->back()->with('error', __('common.whoops'));
    }
     public function show($id)
    {
        return Photo::query()->findOrFail($id);
    }

    public function edit($id)
    {
        $item= Photo::findOrFail($id);
        return view('admin.photos.edit',['item'=>$item]);
    }

    public function update(Request $request, $id)
    {
        $roles = [
             'image' => 'mimes:jpeg,bmp,png,gif',
        ];

        $locales = Language::all()->pluck('lang');

        $this->validate($request, $roles);

        $item= Photo::findOrFail($id);

      
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . ".jpg";
            Image::make($file)->resize(800, null, function ($constraint) {$constraint->aspectRatio();})->save("uploads/photos/$name");
            $item->image=$name;
       }
        $item->status = $request->status;
       
        $item->save();

        if($item){
            return redirect()->back()->with('status', __('common.update'));
        }
        return redirect()->back()->with('error', __('common.whoops'));
    }

    public function destroy($id)
    {
        $item = Photo::query()->findOrFail($id);
        if ($item) {
            Photo::query()->where('id', $id)->delete();
            return "success";
        }
        return "fail";
    }

    public function changeStatus(Request $request)
    {
        if ($request->event == 'delete') {
            Photo::query()->whereIn('id', $request->IDsArray)->delete();
        } else {
            Photo::query()->whereIn('id', $request->IDsArray)->update(['status' => $request->event]);
        }
        return $request->event;
    }
}
