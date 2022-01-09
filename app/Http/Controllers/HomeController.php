<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Service;
use App\Models\About;
use App\Models\Portfolio;
use App\Models\Portfolio_cat;
use App\Models\Team;
use App\Models\Contactus;
use App\Models\Hme;
use App\Models\product;
use App\Models\prd;
use App\Models\mcat;
use App\Models\scat;
use App\Models\Setup;
use App\Models\visitors;
  

use Stevebauman\Location\Facades\Location;

use App;
class HomeController extends Controller
{
    /**
     * Create a new controller instance. 
     *
     * @return void
     */
    
    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

    public function showproduct($id)
    {
        
/////////////////////////


$setups = Setup::get();
$products = product::get(); //where('sec7','>',5)->
$product = product::where('id',$id)->get();

$related = product::where('sec9_ar',$product[0]->sec9_ar)->get();

$toprated = product::orderByDesc('sec7')->take(9)->get(); 
$reviewd = product::orderByDesc('sec8')->take(9)->get(); 
$latest = product::orderByDesc('id')->take(9)->get(); 

$mcats = mcat::get(); 
$scat = scat::where('id',$product[0]->sec9_ar)->get(); 
$mcat = mcat::where('id',$scat[0]->sec9_ar)->get(); 
$scats = scat::get(); 


///////////////
        return view('showproduct',compact('id','products','product','toprated','related','setups','mcats','mcat','scat','scats','reviewd','latest'));
    }
public function sign()
{

    
    $ip = '196.128.8.27'; /* Static IP address request()->ip()*/
    $currentUserInfo = Location::get($ip);

    $data=[
        'ip'=>request()->ip(),
        'ip_'=>request()->getClientIp(),
        'browser'=>request()->userAgent(),
       // 'mac'=>exec('getmac'),
        'latitude'=>$currentUserInfo->latitude,
        'longitude'=>$currentUserInfo->longitude,


                ];

    $user = visitors::firstOrCreate($data);
                

    $visitors = visitors::findOrFail($user->id);
    $visitors->countryName = $currentUserInfo->countryName;
    $visitors->countryCode = $currentUserInfo->countryCode;
    $visitors->regionCode = $currentUserInfo->regionCode;
    $visitors->regionName = $currentUserInfo->regionName;
    $visitors->cityName = $currentUserInfo->cityName;
    $visitors->zipCode = $currentUserInfo->zipCode;
    $visitors->latitude = $currentUserInfo->latitude;
    $visitors->longitude = $currentUserInfo->longitude;

    $visitors->save(); 

}

public function products(Request $request) 
{
        $setups = Setup::get(); 


        $this->sign();
        $products = product::orderByDesc('id')->take(9)->get(); //where('sec7','>',5)->
        
        $last = $products[0]->id; //where('sec7','>',5)->
        $toprated = product::orderByDesc('sec7')->take(9)->get(); 
        $reviewd = product::orderByDesc('sec8')->take(9)->get(); 
        $latest = product::orderByDesc('id')->take(9)->get(); 
        $mostvisit = product::orderByDesc('sec1')->take(9)->get();

        $mcats = mcat::get(); 
        $scats = scat::get();   
        
        return view('index',compact('last','products','mostvisit','toprated','setups','mcats','scats','reviewd','latest'));
    
}

public function load_products(Request $request) 
{
    $products = product::orderBy('id')->where('id','<',$request->id)->take(9)->get(); //where('sec7','>',5)->
if(count($products)>0){
    $last = $products[0]->id; //where('sec7','>',5)->
$newprds='';
foreach ($products as $product){
    $newprds.=
    '<div class="col-lg-3 col-md-4 col-sm-6 mix  new"  >

        
        <div class="featured__item">
            <div onclick="window.location=`showproduct'.$product->id.'`" class="featured__item__pic set-bg" data-setbg="'. $product->sec9 .'"  style="background-image: url('. $product->sec9 .');">
                <ul class="featured__item__pic__hover">
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>

                    <li><a href="#"><label style="    padding: 0; margin: 0;" for="a2c'.$product->id .'"><i class="fa fa-shopping-cart"></i></label></a></li>
                    

            <form action="cart.store" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="'. $product->id .'" name="id">
                <input type="hidden" value="'. $product->sec2 .'" name="name">
                <input type="hidden" value="'. $product->sec5 .'" name="price">
                <input type="hidden" value="'. $product->sec9 .'"  name="image">
                <input type="hidden" value="1" name="quantity">
                <button id="a2c'. $product->id.'" style="display: none"></button>
            </form>



                </ul>
            </div>
            
            <div class="featured__item__text">
                <h6><a href="showproduct">'.$product->sec2.'</a></h6>
                <h5>جنية '. $product->sec5 .' </h5>
            </div>
        </div>
    </div>';
}

 
$arr=array($last, $newprds );


    return $arr;
}else{
    return 0;
}
    

}

// Get products that belongs to a specific sub category when clicked
public function s__products(Request $request) 
{
        $setups = Setup::get();
        

        $this->sign();
        $products = product::orderByDesc('id')->take(9)->where('sec9_ar',$request->id)->get(); //where('sec7','>',5)->

    $last = $products[0]->id; //where('sec7','>',5)->

        $toprated = product::orderByDesc('sec7')->take(9)->where('sec9_ar',$request->id)->get(); 
        $reviewd = product::orderByDesc('sec8')->take(9)->where('sec9_ar',$request->id)->get(); 
        $latest = product::orderByDesc('id')->take(9)->where('sec9_ar',$request->id)->get(); 
        $mostvisit = product::orderByDesc('sec1')->where('sec9_ar',$request->id)->take(5)->get();

        
        $mcats = mcat::get(); 
        $scats = scat::get();  
        
        

        return view('index',compact('last','products','mostvisit','toprated','setups','mcats','scats','reviewd','latest'));
   
}
// Get sub categories when click on main category
public function sub_cats(Request $request) 
{
        $setups = Setup::get();
        
        $this->sign();
        
        $toprated = product::orderByDesc('sec7')->take(9)->where('sec9_ar',$request->id)->get(); 
        $reviewd = product::orderByDesc('sec8')->take(9)->where('sec9_ar',$request->id)->get(); 
        $latest = product::orderByDesc('id')->take(9)->where('sec9_ar',$request->id)->get(); 
       // return $request->id;
        
        $mcats = mcat::get(); 
        $scats = scat::orderByDesc('sec8')->take(9)->where('sec9_ar',$request->id)->get();  
        
        $s_cats=1;

        return view('index',compact('s_cats','toprated','setups','mcats','scats'));
   
}
    
}










