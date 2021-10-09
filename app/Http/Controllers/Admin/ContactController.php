<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Contact;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ContactController extends Controller
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
        $items = Contact::query();

        if ($request->has('name')) {
            if ($request->get('name') != null)
                $items->whereHas('translations', function ($query) use ($request) {
                    $query->where('locale', app()->getLocale())
                        ->where('name', 'like', '%' . $request->get('title') . '%');
                });
        }

        $items = $items->orderBy('id', 'desc')->get();
        //return $items;
        return view('admin.contacts.home', [
            'items' => $items,
        ]);

    }
     public function show($id)
    {
        return Contact::query()->findOrFail($id);
    }

    public function edit($id)
    {
        $item= Contact::findOrFail($id);
        $departments = Contact::query()->orderBy('id', 'desc')->get();
        return view('admin.contacts.edit',['departments'=>$departments,'item'=>$item]);
    }

    public function update(Request $request, $id)
    {
        $locales = Language::all()->pluck('lang');

        $this->validate($request, $roles);

        $item= Contact::findOrFail($id);
        $item->name = $request->name;
        $item->email = $request->email;
        $item->mobile = $request->mobile;
        $item->comment = $request->comment;
        $item->save();

        if($item){
            return redirect()->back()->with('status', __('common.update'));
        }
        return redirect()->back()->with('error', __('common.whoops'));
    }
    public function destroy($id)
    {
        $item = Contact::query()->findOrFail($id);
        if ($item) {
            Contact::query()->where('id', $id)->delete();
            return "success";
        }
        return "fail";
    }

    public function changeStatus(Request $request)
    {
        if ($request->event == 'delete') {
            Contact::query()->whereIn('id', $request->IDsArray)->delete();
        } else {
            Contact::query()->whereIn('id', $request->IDsArray)->update(['status' => $request->event]);
        }
        return $request->event;
    }

   public function create()
    {
        // return $specializations;
        return view('admin.site.contactus');
    }

    public function store(Request $request)
    {
 
         /* $roles = [
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:customers',
            'mobile'=>'required|min:10|max:14|unique:customers',
            'subject'=>'required',
            'comment'=>'required',
        ];
        $this->validate($request, $roles);*/
        $item= New Contact;
        $item->name = $request->name;
        $item->email = $request->email;
        $item->mobile = $request->mobile;
        $item->comment = $request->comment;
        $item->save();

        if($item){
            return redirect()->back()->with('status', __('common.create'));
        }
        return redirect()->back()->with('error', __('common.whoops'));
    }

}
