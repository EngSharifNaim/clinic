<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class SettingController extends Controller
{
    private $locales = '';

    public function __construct()
    {
        $this->locales = Language::all();
        view()->share([
            'locales' => $this->locales,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function image_extensions(){

        return array('jpg','png','jpeg','gif','bmp','pdf','txt','docx','doc','ppt','xls','zip','rar');

    }


    public function index()
    {

        $settings = Setting::query()->first();
         //return $setting->translate('en')->title;
        return view('admin.settings.edit', ['setting' => $settings]);
    }

    public function update(Request $request)
    {
       //dd($request->all());
        $locales = Language::all()->pluck('lang');
        $roles = [
            'url' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'location' => 'required',
            'code' => 'required',

        ];
        foreach ($locales as $locale) {
            $roles['name_' . $locale] = 'required';
            $roles['address_' . $locale] = 'required';
            $roles['keywords_' . $locale] = 'required';
            $roles['our_vision_' . $locale] = 'required';
            $roles['our_mision_' . $locale] = 'required';
            $roles['our_history_' . $locale] = 'required';
            $roles['goals_' . $locale] = 'required';
            $roles['scedule_' . $locale] = 'required';
        }
        $this->validate($request, $roles);
        $setting = Setting::query()->findOrFail(1);
        $setting->url = trim($request->get('url'));
        $setting->email = trim($request->get('email'));
        $setting->mobile = trim($request->get('mobile'));
        $setting->facebook = trim($request->get('facebook'));
        $setting->twitter = trim($request->get('twitter'));
        $setting->instagram = trim($request->get('instagram'));
        $setting->youtube = trim($request->get('youtube'));
        $setting->location = trim($request->get('location'));
        $setting->linked_in = trim($request->get('linked_in'));
        $setting->google = trim($request->get('google'));
        $setting->code = trim($request->get('code'));

 
        if(Input::file("logo")&&Input::file("logo")!=NULL)
        {
            if (Input::file("logo")->isValid())
            {
                $destinationPath='uploads/settings';

                $extension=strtolower(Input::file("logo")->getClientOriginalExtension());
                //dd($extension);
                $array= $this->image_extensions();
                if(in_array($extension,$array))
                {
                    $fileName_logo=uniqid().'.'.$extension;
                    Input::file("logo")->move($destinationPath, $fileName_logo);
                }
            }
        }
         if(Input::file("imageback")&&Input::file("imageback")!=NULL)
        {
            if (Input::file("imageback")->isValid())
            {
                $destinationPath='uploads/settings';

                $extension=strtolower(Input::file("imageback")->getClientOriginalExtension());
                //dd($extension);
                $array= $this->image_extensions();
                if(in_array($extension,$array))
                {
                    $fileName_imageback=uniqid().'.'.$extension;
                    Input::file("imageback")->move($destinationPath, $fileName_imageback);
                }
            }
        }
        
        if(Input::file("imagelogo")&&Input::file("imagelogo")!=NULL)
        {
            if (Input::file("imagelogo")->isValid())
            {
                $destinationPath='uploads/settings';

                $extension=strtolower(Input::file("imagelogo")->getClientOriginalExtension());
                //dd($extension);
                $array= $this->image_extensions();
                if(in_array($extension,$array))
                {
                    $fileName_imagelogo=uniqid().'.'.$extension;
                    Input::file("imagelogo")->move($destinationPath, $fileName_imagelogo);
                }
            }
        }
       
        if(Input::file("image_client")&&Input::file("image_client")!=NULL)
        {
            if (Input::file("image_client")->isValid())
            {
                $destinationPath='uploads/settings';

                $extension=strtolower(Input::file("image_client")->getClientOriginalExtension());
                //dd($extension);
                $array= $this->image_extensions();
                if(in_array($extension,$array))
                {
                    $fileName_image_client=uniqid().'.'.$extension;
                    Input::file("image_client")->move($destinationPath, $fileName_image_client);
                }
            }
        }



        foreach ($locales as $locale) {
            $setting->translate($locale)->name = trim(ucwords($request->get('name_' . $locale)));
            $setting->translate($locale)->address = trim(ucwords($request->get('address_' . $locale)));
            $setting->translate($locale)->keywords = trim(ucwords($request->get('keywords_' . $locale)));
            $setting->translate($locale)->our_vision = trim(ucwords($request->get('our_vision_' . $locale)));
            $setting->translate($locale)->our_mision = trim(ucwords($request->get('our_mision_' . $locale)));
            $setting->translate($locale)->our_history = trim(ucwords($request->get('our_history_' . $locale)));
            $setting->translate($locale)->scedule = trim(ucwords($request->get('scedule_' . $locale)));
          
        }
        if(isset($fileName_logo)){$setting->logo= $fileName_logo;}
        if(isset($fileName_imageback)){$setting->imageback= $fileName_imageback;}
        if(isset($fileName_imagelogo)){$setting->imagelogo= $fileName_imagelogo;}
        if(isset($fileName_image_client)){$setting->image_client= $fileName_image_client;}
        $setting->save();
        return redirect()->back()->with('status', 'setting updated successfully');
    }
}
