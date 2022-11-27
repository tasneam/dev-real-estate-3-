<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\ContactUs;
use App\Models\CustomerData;
use App\Models\Department;
use App\Models\Language;
use App\Models\Page;
use App\Models\Realestate;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Travel;
use App\Models\University;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;


class WebController extends Controller
{
    //
    public function index(Request $request)
    {   
        $pages = Page::all();
        $sliders = Slider::all();
        // dd($sliders);

        // $slider1 = Slider::where('id', 1)->first();
        // $slider2 = Slider::where('id', 2)->first();
        // $slider3 = Slider::where('id', 3)->first();
        $Service1 = Service::where('id', 1)->first();
        $Service2 = Service::where('id', 2)->first();
        $Service3 = Service::where('id', 3)->first();

        // $P_about = Page::where('id', 1)->first();
        // $P_services = Page::where('id', 2)->first();
        $realestates = Realestate::with('city')->orderBy('created_at', 'ASC')->take(4)->get();
        $latesttravel = Travel::orderBy('created_at', 'ASC')->take(4)->get();
        // $latestproducts = Product::orderBy('created_at', 'ASC')->take(9)->get();

        // if ($request->has('realestate_id')) {
        //     $realestate = Realestate::where('id', '=', $request->input('realestate_id'))->get();
        //     return response()->view('web.realestate-single', ['realestate' => $realestate]);
        // }
        return response()->view('web.index',
            ['realestates' => $realestates,
             'latesttravel' => $latesttravel,
              'sliders' => $sliders,  
            //   'slider2' => $slider2,               
            //   'slider3' => $slider3, 
              'Service1' => $Service1,  
              'Service2' => $Service2,               
              'Service3' => $Service3,               
              'pages' => $pages,               
             
            ]);
    }

    public function about() 
    {
        // $P_about = Page::where('id', 1)->first();
        $about = Page::where('id', 1)->first();
        return view('web.about')->with('about', $about);
    }
    public function page($local ,$id)
    
    {
        $page = Page::where('id', $id)->with('pageItems')->first();
        $pagetitle = $page->page_title;
        switch($pagetitle){
            case ('realstategrid'):
            // $slider1 = Slider::where('id', 1)->first();
            $P_real = Page::where('id', 2)->first();
            $reals =Realestate::paginate(9);
        return view('web.page',compact('pagetitle','page'))
        ->with('reals',$reals)
        ->with('P_real',$P_real);    

        break;
        }
        return view('web.page',compact('pagetitle','page'));
    }


    public function Suniversity()
    {
        $cities = City::all();
        $languages = Language::all();
        $universities = University::all();
        $departments=Department::all();

        return view('web.Student-Services')
        ->with('universities', $universities)
        ->with('cities', $cities)
        ->with('languages', $languages)
        ->with('departments', $departments);
        
    }
    public function PostSearch(Request $request)
    {

        $universities = new University();
        // if ($request->ajax()) {
            // dd($request->university_ranking);
                if($request->city_id)  
                $universities = $universities->where('city_id',  $request->city_id);
                if($request->university_ranking)  
                $universities = $universities->where('university_ranking',  $request->university_ranking);
                if($request->educational_level)  
                $universities = $universities->where('educational_level',  $request->educational_level);
                if($request->languages){
                $universities = $universities->whereHas('languages', function ($query) use ($request){
                    return $query->where('id',$request->languages);
                });
                }
                if($request->departments){
                $universities = $universities->whereHas('departments', function ($query) use ($request){
                    return $query->where('id',$request->departments);
                });
                 }
            
            $students = $universities->with(['languages','city','departments'])->get();


            return view('web.Universities', compact('students'))->render();
        
        // }
        
      
    }

    public function Reservation(Request $request)
    {
        $university = University::where('id', '=' , $request->input('university_id'))->get();
        return view('web.student-form')->with('university',$university);
    }

    public function real()
    {
        $slider1 = Slider::where('id', 1)->first();
        $P_real = Page::where('id', 2)->first();
        $reals =Realestate::paginate(9);
        return view('web.realestate-grid')->with('reals',$reals)->with('P_real',$P_real)->with('slider1',$slider1);    
    }
    
    public function realsingle($local,$id)
    {
        
        // $P_real = Page::where('id', 3)->first();->with('P_real',$P_real)
        $real = Realestate::find($id);
        return view('web.realestate-single')->with('real',$real);
    }


    public function tourism()
    {
        // $P_tourisms = Page::where('id', 5)->first();
        $tourisms =Travel::paginate(9);
        return view('web.tourism-grid')->with('tourisms',$tourisms);
    }

    public function tourismSingle($local,$id)
    {
        // $P_tourism = Page::where('id', 4)->first();
        // $shareComponent = \Share::page(
        //     URL(app()->getLocale().'/tourismsingle/'. $id),           
        //         )
        //             ->facebook()
        //             ->instagram()
        //             ->twitter()
        //             ->linkedin()
        //             ->telegram()
        //             ->whatsapp()
        //             ->reddit();
        // ->->with('P_tourism',$P_tourism)->with('shareComponent',$shareComponent)
        
        $tourism = Travel::find($id);
        return view('web.tourismsingle')->with('tourism',$tourism);
    }
    
    // public function tourismSingle($id)
    // {
    //     $tourisms = Travel::find($id);
    //     $shareComponent = \Share::page(
    //         URL('web/tourismsingle/'. $id),           
    //     )
    //         ->facebook()
    //         ->instagram()
    //         ->twitter()
    //         ->linkedin()
    //         ->telegram()
    //         ->whatsapp()
    //         ->reddit();

    //     return view('web.tourismsingle')->with('tourisms',$tourisms)->with('shareComponent',$shareComponent);
    // }

    
    public function university()
    {
        return view('web.Universities');
    }
    
    public function contactUsIndex()
    {
        return view('web.contact');
    }
    

    public function customerdata(Request $request)
    {
        $customerdata = CustomerData::create($request->all());
        if ($customerdata)
            $msg = 'OK';
        else
            $msg = 'false';

        return response()->json(['msg'=>$msg]);
    }

    public function contactUsStore(Request $request)
    {
        $contactus = ContactUs::create($request->all());
        if ($contactus)
            $msg = 'OK';
        else
            $msg = 'false';

        return response()->json(['msg'=>$msg]);
    }
}
