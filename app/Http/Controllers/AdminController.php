<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\UserAttending;
use App\Models\UserDiscount;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use App\Models\Setting;
use Notification;
use App\Models\UserAction;
use App\Models\Reservation;
use App\Models\Hme;
use App\Models\Service;
use App\Models\prd;
use App\Models\footer;
use App\Models\Setup;
use App\Models\About;
use App\Models\Excursion;
use App\Models\Portfolio;
use App\Models\Portfolio_cat;
use App\Models\Team;
use App\Models\Contactus;
use App\Models\Cashout;
use App\Models\Bank;
use App\Models\Comment  ;
use App\Models\visitors;

use App\Models\mcat;
use App\Models\scat;
use App\Models\product  ;

use App\Notifications\MessageNotification;
use App\Models\Picture;
use App;
use Hamcrest\Core\Set;


class AdminController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function users()
    {
        $users = User::get();
        return view('users.index', compact('users'));
    }


    public function dash()
    {
        $hme = Hme::first();
        $about = About::first();
        $contactus = Contactus::first();

        $setups = Setup::get();

        $service = Service::get();
        $prd = prd::get();
        $portfolio = Portfolio::get();
        $team = Team::get();
        $productsnum = product::get()->count();
        $todayproducts = product::where('created_at','like','%'.substr(date('Y-m-d H:i:s'),0,10).'%')->get()->count();
        $todat_visitorcount = visitors::where('created_at','like','%'.substr(date('Y-m-d H:i:s'),0,10).'%')->get()->count();
        $visitorcount = visitors::get()->count();

        if (!Auth::check()){
            $role = Auth::user()->role;
            $myid = Auth::user()->id;
        }
        
        

        $usernum = User::get()->count();

        return view('management.index', compact('visitorcount','todat_visitorcount','usernum','productsnum','todayproducts','hme','setups','prd','service','about','portfolio','team','contactus'));
    
    }


    public function management()
    {
        //return  substr(date('Y-m-d H:i:s'),0,10);
        $hme = Hme::first();
        $about = About::first();
        $contactus = Contactus::first();
        $setups = Setup::get();
        $service = Service::get();
        $prd = prd::get();
        $portfolio = Portfolio::get();
        $team = Team::get();

        $prd = prd::get();

        
        $productsnum = product::get()->count();
        $usernum = User::get()->count();
        
        $todayproducts = product::where('created_at','like','%'.substr(date('Y-m-d H:i:s'),0,10).'%')->get()->count();
 
        $todat_visitorcount = visitors::where('created_at','like','%'.substr(date('Y-m-d H:i:s'),0,10).'%')->get()->count();
        $visitorcount = visitors::get()->count();



        return view('management.index', compact('visitorcount','todat_visitorcount','usernum','productsnum','todayproducts','hme','setups','prd','service','about','portfolio','team','contactus'));
    }
    public function eco()
    {
        return view('ecommerce.index');
    }
    
    public function panars()
    {
        return view('panars.index');
    }
    
    
    public function mcats()
    {
        $mcat = mcat::get();
        return view('ecommerce.mcats.index', compact('mcat'));
    }
    public function scats()
    {
        $scat = scat::get();
        $mcats = mcat::get();
        return view('ecommerce.scats.index', compact('scat','mcats'));
    }
    public function m_products()
    {
        $product = product::get();
        $scats = scat::get();
        return view('ecommerce.products.index', compact('product','scats'));
    }
    














    public function send($user_id, $message,$title) {
        $user = User::where('id', $user_id)->first();
  
        $data = [
            'title' => $title,
            'message' => $message,
            'type' => 2,
            'user_id' => $user->id
        ];

  
        Notification::send($user, new MessageNotification($data));
   

        $httpClient = new \GuzzleHttp\Client(); // guzzle 6.3  
        $httpClient->request('POST', 'https://us-central1-newchat-9d522.cloudfunctions.net/sendNotificationForUser', [
            'headers' => [
                 'X-Authorization' => 'LIZefNAEYFEsrr6w7fmVF34qJnP841qqLz5YE9qWMwbhutlEr2nq0CrsdC75ao7Q',
                 'Content-Type' => 'application/json'
             ],
         
                 "json" =>
                 [
                    'user_id' => strval($user->id),
                    'title' => $title,
                    'type' =>  "2",
                    'message' => strval($message)
                 ]
             
         ]);

         
    }


    public function profile($id)
    {
        $user = User::where('id', $id)->first();
        return view('users.profile', compact('user'));
    }




    public function update_user(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        // $user->id_card = $request->last_name;
        $user->job_title = $request->job_title;
        $user->job_description = $request->job_description;
        $user->status = $request->status;
        // $user->address = $request->last_name;
        $user->photo = $request->photo ? $request->photo->store('users') : $user->photo;

        $user->save();

    if ($user)
    {
        return response()->json(['success'=>'User Updatesd!']);
    }else
    {
        return response()->json(['error'=>'User Not Updated!']);
    }

      //  return redirect()->back();
    }

    public function delete_user(Request $request)
    {
          User::where('id',$request->user_id)->delete();

          return redirect()->back();
    }




//////////////////////////////////////////  MANAGEMENT  ////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//         $about = About::first();
//         $portfolio = Portfolio::get();
//         $portfoliocats = Portfolio_cat::get();
//         $team = Team::get();
//         $setup = Setup::first();
//         $contactus = Contactus::first();

public function hme()
{
 $hme = Hme::first();
        $about = About::first();
        $contactus = Contactus::first();
        
        $setups = Setup::get();

        $service = Service::get();
        $prd = prd::get();
        $portfolio = Portfolio::get();
        $team = Team::get();

        return view('hme.index', compact('hme','setups','prd','service','about','portfolio','team','contactus'));
}
public function service()
{
    $setups = Setup::get();
    $service = Service::get();
    return view('service.index', compact('setups','service'));
}
public function footer()
{
    $setups = Setup::get();
    return view('footer.index', compact('setups'));
}
public function editfooter(Request $request)
{
    return "Hello";
    $setups = Setup::findOrFail('14');
    $setups->sec1 = $request->sec1;
    $setups->sec2 = $request->sec2;
    $setups->sec3 = $request->sec3;
    $setups->sec4 = $request->sec4;
    $setups->sec5 = $request->sec5;
    $setups->save(); 
    return redirect()->back();
}
public function prd()
{
    $setups = Setup::get();
    $prd = prd::get();
    return view('prd.index', compact('setups','prd'));
}
public function portfolio()
{
    $portfolio = Portfolio::get();
    $service_t = Service::first();
    $portfoliocats = Portfolio_cat::get();
    return view('portfolio.index', compact('portfoliocats','service_t','portfolio'));
}

public function team()
{
    $team = Team::get();
    return view('team.index', compact('team'));
}



























public function contactus()
{
    $contactus = Contactus::first();
    return view('contactus.index', compact('contactus'));
}
public function about()
{
    $about = About::first();
    $setups = Setup::get();
    return view('about.index', compact('about','setups'));
}


public function carusel()
{
    $setups = Setup::get();
    return view('carusel.index',compact('setups'));
}


public function excursions()
{
    $about = About::get();
    $excursions   = Excursion::get();
    return view('excursions.index', compact('excursions','about'));
}

public function editftr(Request $request)
{
    $hme = Setup::findOrFail('14');
    $hme->sec1 = $request->sec1;
    $hme->sec2 = $request->sec2;
    $hme->sec3 = $request->sec3;
    $hme->sec4 = $request->sec4;
    $hme->sec5 = $request->sec5;

    
    $hme->save(); 
    return redirect()->back();
} 

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function edithme(Request $request)
{
    $hme = Hme::findOrFail('1');
    $hme->sec1 = $request->sec1;
    $hme->sec2 = $request->sec2;
    $hme->sec3 = $request->sec3;
    $hme->sec4 = $request->sec4;

    $hme->sec1_ar = $request->sec1_ar;
    $hme->sec2_ar = $request->sec2_ar;
    $hme->save(); 
    return redirect()->back();
} 

public function slide1(Request $request)
{
    $hme = Setup::findOrFail('12');
    $hme->sec2 = $request->sec2;
    $hme->sec3 = $request->sec3;
    $hme->sec2_ar = $request->sec2_ar;
    $hme->sec3_ar = $request->sec3_ar;
    $hme->save(); 
    return redirect()->back();
} 
public function slide2(Request $request)
{
    $hme = Setup::findOrFail('12');
    $hme->sec4 = $request->sec4;
    $hme->sec5 = $request->sec5;
    $hme->sec4_ar = $request->sec4_ar;
    $hme->sec5_ar = $request->sec5_ar;
    $hme->save(); 
    return redirect()->back();
} 
public function slide3(Request $request)
{
    $hme = Setup::findOrFail('12');
    $hme->sec6 = $request->sec6;
    $hme->sec7 = $request->sec7;
    $hme->sec6_ar = $request->sec6_ar;
    $hme->sec7_ar = $request->sec7_ar;
    $hme->save(); 
    return redirect()->back();
} 

public function disable_enable(Request $request)
{
    if($request->name=="hme"){
        $hme = Hme::findOrFail('1');
        $hme->status = $request->status;
        $hme->save(); 
        return redirect()->back();
    }elseif($request->name=="service"){

        $hme = Setup::findOrFail('2');
        $hme->status = $request->status;
        $hme->save(); 
        return redirect()->back();

    }elseif($request->name=="team"){
        $hme = Setup::findOrFail('3');
        $hme->status = $request->status;
        $hme->save(); 
        return redirect()->back();
    }elseif($request->name=="contactus"){

        $hme = Contactus::findOrFail('1');
        $hme->status = $request->status;
        $hme->save(); 
        return redirect()->back();
    }elseif($request->name=="portfolio"){

        $hme = Setup::findOrFail('4');
        $hme->status = $request->status;
        $hme->save(); 
        return redirect()->back();
    }elseif($request->name=="about"){

        $hme = About::findOrFail('1');
        $hme->status = $request->status;
        $hme->save(); 
        return redirect()->back();
    }elseif($request->name=="brandimgs"){

        $hme = Setup::findOrFail('5');
        $hme->status = $request->status;
        $hme->save(); 
        return redirect()->back();
    }elseif($request->name=="learnmorebtn"){

        $hme = Setup::findOrFail('6');
        $hme->status = $request->status;
        $hme->save(); 
        return redirect()->back();
    }elseif($request->name=="whyus"){

        $hme = Setup::findOrFail('7');
        $hme->status = $request->status;
        $hme->save(); 
        return redirect()->back();
    }elseif($request->name=="calltoaction"){

        $hme = Setup::findOrFail('8');
        $hme->status = $request->status;
        $hme->save(); 
        return redirect()->back();
    }elseif($request->name=="calltoaction_btn"){

        $hme = Setup::findOrFail('9');
        $hme->status = $request->status;
        $hme->save(); 
        return redirect()->back();
    }elseif($request->name=="watchvideo"){

        $hme = Setup::findOrFail('10');
        $hme->status = $request->status;
        $hme->save(); 
        return redirect()->back();
    }elseif($request->name=="getstarted"){

        $hme = Setup::findOrFail('11');
        $hme->status = $request->status;
        $hme->save(); 
        return redirect()->back();
    }elseif($request->name=="carusel"){

        $hme = Setup::findOrFail('12');
        $hme->status = $request->status;
        $hme->save(); 
        return redirect()->back();
    }elseif($request->name=="prds"){

        $hme = Setup::findOrFail('13');
        $hme->status = $request->status;
        $hme->save(); 
        return redirect()->back();
    }
    
    
} 


public function editservices(Request $request)
{
    $setups = Setup::findOrFail(2);
    $setups->sec1 = $request->sec1;
    $setups->sec4 = $request->sec4;
    $setups->sec5 = $request->sec5;
    $setups->sec6 = $request->sec6;

    
    $setups->sec1_ar = $request->sec1_ar;
    $setups->sec4_ar = $request->sec4_ar;
    $setups->sec5_ar = $request->sec5_ar;
    $setups->sec6_ar = $request->sec6_ar;
    
    $setups->save();
    return redirect()->back();
}

public function editservice(Request $request)
{
    $service = Service::findOrFail($request->service_id);
    $service->sec2 = $request->sec2;
    $service->sec3 = $request->sec3;

    $service->sec2_ar = $request->sec2_ar;
    $service->sec3_ar = $request->sec3_ar;
    
    $service->save();
    return redirect()->back();
}

public function editservice_(Request $request)
{
    $service = Service::findOrFail($request->service_id);
    $service->sec2 = $request->sec2;
    $service->sec3 = $request->sec3;
    $service->sec4 = $request->sec4;
    $service->sec5 = $request->sec5;

    $service->sec2_ar = $request->sec2_ar;
    $service->sec3_ar = $request->sec3_ar;
    $service->sec4_ar = $request->sec4_ar;
    $service->sec5_ar = $request->sec5_ar;
    
    $service->save();
    return redirect()->back();
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function addservice(Request $request)
{
    $service = new Service(); 
    $service->sec2 = $request->sec2;
    $service->sec3 = $request->sec3;
    $service->sec2_ar = $request->sec2_ar;
    $service->sec3_ar = $request->sec3_ar;
    $service->save();
    return redirect()->back();
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function addservice_(Request $request)
{
    $service = new Service(); 
    $service->sec2 = $request->sec2;
    $service->sec3 = $request->sec3;
    $service->sec2_ar = $request->sec2_ar;
    $service->sec3_ar = $request->sec3_ar;
    
    $service->sec4 = $request->sec4;
    $service->sec5 = $request->sec5;
    $service->sec4_ar = $request->sec4_ar;
    $service->sec5_ar = $request->sec5_ar;
    $service->save();
    return redirect()->back();
}








public function editprds(Request $request)
{
    $setups = Setup::findOrFail(13);
    $setups->sec1 = $request->sec1;
    $setups->sec4 = $request->sec4;
    $setups->sec5 = $request->sec5;
    $setups->sec6 = $request->sec6;

    
    $setups->sec1_ar = $request->sec1_ar;
    $setups->sec4_ar = $request->sec4_ar;
    $setups->sec5_ar = $request->sec5_ar;
    $setups->sec6_ar = $request->sec6_ar;
    
    $setups->save();
    return redirect()->back();
}

public function editprd(Request $request)
{
    $prd = prd::findOrFail($request->prd_id);
    $prd->sec2 = $request->sec2;
    $prd->sec3 = $request->sec3;

    $prd->sec2_ar = $request->sec2_ar;
    $prd->sec3_ar = $request->sec3_ar;
    
    $prd->save();
    return redirect()->back();
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function addprd(Request $request)
{
    $prd = new prd(); 
    $prd->sec2 = $request->sec2;
    $prd->sec3 = $request->sec3;
    $prd->sec2_ar = $request->sec2_ar;
    $prd->sec3_ar = $request->sec3_ar;
    $prd->save();
    return redirect()->back();
}

public function imgcrop()
    {
        return view('imgcrop');
    }

    public function uploadCropImage(Request $request)
    {  
        if(isset($request->url)){
                $folderPath = public_path($request->url);
                $imageName = '';
            }else{
                $folderPath = public_path($request->url);
                $imageName = uniqid() . '.png';
            }
            $imageFullPath = $folderPath.$imageName;

        if(!isset($request->nocrop)){
              
    
            $image_parts = explode(";base64,", $request->image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            file_put_contents($imageFullPath, $image_base64);
    
            $saveFile = new Picture;
            $saveFile->name = $imageName;
            $saveFile->save();
            return response()->json(['success'=>'Crop Image Uploaded Successfully']);

        }else{
            $r= $request->image;
            file_put_contents($imageFullPath, file_get_contents($r));
            return response()->json(['success'=>'Crop Image Uploaded Successfully']);
        }
     
    }













////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function editportfolio(Request $request)
{
    $portfolio = Portfolio::findOrFail($request->portfolio_id);
    $portfolio->sec2 = $request->sec2;
    $portfolio->sec3 = $request->sec3;
    $portfolio->sec2_ar = $request->sec2_ar;
    $portfolio->sec3_ar = $request->sec3_ar;
    $portfolio->sec4 = $request->sec4;
    $portfolio->save();
    return redirect()->back();
}

public function deleteportfolio(Request $request)
{
    Portfolio::where('id',$request->modaledel_id)->delete();
    return redirect()->back();
}






public function uploadCropImage_port(Request $request)
{  
    $portfolio = new Portfolio();
    
    
    
        $folderPath = 'port_imgs/';
        $imageName = uniqid() . '.png';

        $imageFullPath = $folderPath.$imageName;

        $portfolio->sec1 = $imageFullPath;
        $portfolio->sec2 = $request->sec2;
        $portfolio->sec3 = $request->sec3;
        $portfolio->sec2_ar = $request->sec2_ar;
        $portfolio->sec3_ar = $request->sec3_ar;
    $portfolio->sec4 = $request->sec4;
    $portfolio->sec5 = $request->sec5;

    $portfolio->save();
        
    if(!isset($request->nocrop)){
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        file_put_contents($imageFullPath, $image_base64);

        $saveFile = new Picture;
        $saveFile->name = $imageName;
        $saveFile->save();
        return response()->json(['success'=>'Crop Image Uploaded Successfully']);

    }else{
        $r= $request->image;
        file_put_contents($imageFullPath, file_get_contents($r));
        return response()->json(['success'=>'Crop Image Uploaded Successfully']);
    }
 
}




public function uploadCropImage_team(Request $request)
{  
    $team = new Team();
    
    
    
        $folderPath = 'team_imgs/';
        $imageName = uniqid() . '.png';

        $imageFullPath = $folderPath.$imageName;

        $team->sec2 = $request->sec2;
        $team->sec3 = $request->sec3;
        $team->sec4 = $request->sec4;
        $team->sec2_ar = $request->sec2_ar;
        $team->sec3_ar = $request->sec3_ar;
        $team->sec4_ar = $request->sec4_ar;
        $team->sec5 = $request->sec5;
        $team->sec6 = $request->sec6;
        $team->sec7 = $request->sec7;
        $team->sec8 = $request->sec8;
        $team->sec9 = $imageFullPath;

    $team->save();
        
    if(!isset($request->nocrop)){
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        file_put_contents($imageFullPath, $image_base64);

        $saveFile = new Picture;
        $saveFile->name = $imageName;
        $saveFile->save();
        return response()->json(['success'=>'Crop Image Uploaded Successfully']);

    }else{
        $r= $request->image;
        file_put_contents($imageFullPath, file_get_contents($r));
        return response()->json(['success'=>'Crop Image Uploaded Successfully']);
    }
 
}

//////////////////////////////////


public function uploadCropImage_mcat(Request $request)
{  
    $mcat = new mcat();
    
    
    
        $folderPath = 'mcat_imgs/';
        $imageName = uniqid() . '.png';

        $imageFullPath = $folderPath.$imageName;

        $mcat->sec2 = $request->sec2;
        $mcat->sec3 = $request->sec3;
        $mcat->sec4 = $request->sec4;
        $mcat->sec2_ar = $request->sec2_ar;
        $mcat->sec3_ar = $request->sec3_ar;
        $mcat->sec4_ar = $request->sec4_ar;
        $mcat->sec5 = $request->sec5;
        $mcat->sec6 = $request->sec6;
        $mcat->sec7 = $request->sec7;
        $mcat->sec8 = $request->sec8;
        $mcat->sec9 = $imageFullPath;

    $mcat->save();
        
    if(!isset($request->nocrop)){
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        file_put_contents($imageFullPath, $image_base64);

        $saveFile = new Picture;
        $saveFile->name = $imageName;
        $saveFile->save();
        return response()->json(['success'=>'Crop Image Uploaded Successfully']);

    }else{
        $r= $request->image;
        file_put_contents($imageFullPath, file_get_contents($r));
        return response()->json(['success'=>'Crop Image Uploaded Successfully']);
    }
 
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function insertmcat(Request $request)
{
    $mcat = new mcat();
    $mcat->mcat = $request->mcat_name;
    $mcat->save();
    return redirect()->back();
}
public function editmcat(Request $request)
{
    $mcat = mcat::findOrFail($request->modaledel_id);
    $mcat->sec2 = $request->sec2;
    $mcat->sec3 = $request->sec3;
    $mcat->sec4 = $request->sec4;
    $mcat->sec2_ar = $request->sec2_ar;
    $mcat->sec3_ar = $request->sec3_ar;
    $mcat->sec4_ar = $request->sec4_ar;
    $mcat->sec5 = $request->sec5;
    $mcat->sec6 = $request->sec6;
    $mcat->sec7 = $request->sec7;
    $mcat->sec8 = $request->sec8;
    $mcat->save();
    return redirect()->back();
}
public function deletemcat(Request $request)
{
    mcat::where('id',$request->modaledel_id)->delete();
    return redirect()->back();
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////








//////////////////////////////////


public function uploadCropImage_scat(Request $request)
{  
        $scat = new scat();
    
    
    
        $folderPath = 'scat_imgs/';
        $imageName = uniqid() . '.png';

        $imageFullPath = $folderPath.$imageName;
 
        $scat->sec2 = $request->sec2;
        $scat->sec3 = $request->sec3;
        $scat->sec4 = $request->sec4;
        $scat->sec2_ar = $request->sec2_ar;
        $scat->sec3_ar = $request->sec3_ar;
        $scat->sec4_ar = $request->sec4_ar;
        $scat->sec5 = $request->sec5;
        $scat->sec6 = $request->sec6;
        $scat->sec7 = $request->sec7;
        $scat->sec8 = $request->sec8;
        $scat->sec9_ar = $request->sec9_ar;
        $scat->sec9 = $imageFullPath;

    $scat->save();
        
    if(!isset($request->nocrop)){
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        file_put_contents($imageFullPath, $image_base64);

        $saveFile = new Picture;
        $saveFile->name = $imageName;
        $saveFile->save();
        return response()->json(['success'=>'Crop Image Uploaded Successfully']);

    }else{
        $r= $request->image;
        file_put_contents($imageFullPath, file_get_contents($r));
        return response()->json(['success'=>'Crop Image Uploaded Successfully']);
    }
 
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function insertscat(Request $request)
{
    $scat = new scat();
    $scat->scat = $request->scat_name;
    $scat->save();
    return redirect()->back();
}
public function editscat(Request $request)
{
    $scat = scat::findOrFail($request->modaledel_id);
    $scat->sec2 = $request->sec2;
    $scat->sec3 = $request->sec3;
    $scat->sec4 = $request->sec4;
    $scat->sec2_ar = $request->sec2_ar;
    $scat->sec3_ar = $request->sec3_ar;
    $scat->sec4_ar = $request->sec4_ar;
    $scat->sec5 = $request->sec5;
    $scat->sec6 = $request->sec6;
    $scat->sec7 = $request->sec7;
    $scat->sec8 = $request->sec8;
    $scat->save();
    return redirect()->back();
}
public function deletescat(Request $request)
{
    scat::where('id',$request->modaledel_id)->delete();
    return redirect()->back();
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//////////////////////// Products //////////


public function uploadCropImage_product(Request $request)
{  
    $product = new product();
    
    
    
        $folderPath = 'product_imgs/';
        $imageName = uniqid() . '.png';

        $imageFullPath = $folderPath.$imageName;

        $product->sec2 = $request->sec2;
        $product->sec3 = $request->sec3;
        $product->sec4 = $request->sec4;
        $product->sec2_ar = $request->sec2_ar;
        $product->sec3_ar = $request->sec3_ar;
        $product->sec4_ar = $request->sec4_ar;
        $product->sec5 = $request->sec5;
        $product->sec6 = $request->sec6;
        $product->sec7 = $request->sec7;
        $product->sec8 = $request->sec8;
        $product->sec9 = $imageFullPath;
        $product->sec9_ar = $request->sec9_ar;

    $product->save();
        
    if(!isset($request->nocrop)){
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        file_put_contents($imageFullPath, $image_base64);

        $saveFile = new Picture;
        $saveFile->name = $imageName;
        $saveFile->save();
        return response()->json(['success'=>'Crop Image Uploaded Successfully']);

    }else{
        $r= $request->image;
        file_put_contents($imageFullPath, file_get_contents($r));
        return response()->json(['success'=>'Crop Image Uploaded Successfully']);
    }
 
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function insertproduct(Request $request)
{
    $product = new product();
    $product->product = $request->product_name;
    $product->save();
    return redirect()->back();
}
public function editproduct(Request $request)
{
    $product = product::findOrFail($request->modaledel_id);
    $product->sec2 = $request->sec2;
    $product->sec3 = $request->sec3;
    $product->sec4 = $request->sec4;
    $product->sec2_ar = $request->sec2_ar;
    $product->sec3_ar = $request->sec3_ar;
    $product->sec4_ar = $request->sec4_ar;
    $product->sec5 = $request->sec5;
    $product->sec6 = $request->sec6;
    $product->sec7 = $request->sec7;
    $product->sec8 = $request->sec8;
    $product->save();
    return redirect()->back();
}
public function deleteproduct(Request $request)
{
    product::where('id',$request->modaledel_id)->delete();
    return redirect()->back();
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////































    


 








public function inserthme(Request $request)
{
    $hme = new Hme();
    $hme->type = $request->hme_name;
    $hme->save();
    return redirect()->back();
}









public function deletehme(Request $request)
{
    Hme::where('id',$request->modaledel_id)->delete();
    return redirect()->back();
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function insertprd(Request $request)
    {
        $prd = new Service();
        $prd->type = $request->prd_name;
        $prd->save();
        return redirect()->back();
    }
    public function deleteprd(Request $request)
    {
        prd::where('id',$request->modaledel_id)->delete();
        return redirect()->back();
    }
    /////////////////////////
    public function insertservice(Request $request)
    {
        $prd = new Service();
        $prd->type = $request->prd_name;
        $prd->save();
        return redirect()->back();
    }
    public function deleteservice(Request $request)
    {
        Service::where('id',$request->modaledel_id)->delete();
        return redirect()->back();
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function insertteam(Request $request)
    {
        $team = new Team();
        $team->team = $request->team_name;
        $team->save();
        return redirect()->back();
    }
    public function editteam(Request $request)
    {
        $team = Team::findOrFail($request->modaledel_id);
        $team->sec2 = $request->sec2;
        $team->sec3 = $request->sec3;
        $team->sec4 = $request->sec4;
        $team->sec2_ar = $request->sec2_ar;
        $team->sec3_ar = $request->sec3_ar;
        $team->sec4_ar = $request->sec4_ar;
        $team->sec5 = $request->sec5;
        $team->sec6 = $request->sec6;
        $team->sec7 = $request->sec7;
        $team->sec8 = $request->sec8;
        $team->save();
        return redirect()->back();
    }
    public function deleteteam(Request $request)
    {
        Team::where('id',$request->modaledel_id)->delete();
        return redirect()->back();
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function insertcontactus(Request $request)
    {
        $contactus = new Contactus();
        $contactus->contactus = $request->contactus_name;
        $contactus->save();
        return redirect()->back();
    }
    public function editcontactus(Request $request)
    {
        $contactus = Contactus::findOrFail('1');
        $contactus->sec1 = $request->sec1;
        $contactus->sec1_ar = $request->sec1_ar;
        $contactus->sec2 = $request->sec2;
        $contactus->sec2_ar = $request->sec2_ar;
        $contactus->sec3 = $request->sec3;
        $contactus->sec4 = $request->sec4;
        $contactus->sec5 = $request->sec5;
        $contactus->sec6 = $request->sec6;
        $contactus->save();
        return redirect()->back();
    }
    public function deletecontactus(Request $request)
    {
        Contactus::where('id',$request->modaledel_id)->delete();
        return redirect()->back();
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



public function editabout_l(Request $request)
{
    $about = About::findOrFail('1');
    $about->sec1 = $request->sec1;
    $about->sec2 = $request->sec2;
    $about->sec3 = $request->sec3;
    $about->sec4 = $request->sec4;

    
    $about->sec1_ar = $request->sec1_ar;
    $about->sec2_ar = $request->sec2_ar;
    $about->sec3_ar = $request->sec3_ar;
    $about->sec4_ar = $request->sec4_ar;

    $about->save();
    return redirect()->back();
}
public function editabout_r(Request $request)
{
    $about = About::findOrFail('1');
    $about->sec5 = $request->sec5;
    $about->sec6 = $request->sec6;
    
    $about->sec5_ar = $request->sec5_ar;
    $about->sec6_ar = $request->sec6_ar;

    $about->save();
    return redirect()->back();
}


public function editabout_bottom(Request $request)
{
    $about = About::findOrFail('1');
    $about->sec7 = $request->sec7;
    $about->sec8 = $request->sec8;
    $about->sec9 = $request->sec9;
    
    $about->sec7_ar = $request->sec7_ar;
    $about->sec8_ar = $request->sec8_ar;
    $about->sec9_ar = $request->sec9_ar;

    $about->save();
    return redirect()->back();
}
public function editabout_bottom_questions(Request $request)
{
    $about = About::findOrFail('1');
    $about->sec10 = $request->sec10;
    $about->sec11 = $request->sec11;
    $about->sec12 = $request->sec12;
    $about->sec13 = $request->sec13;
    $about->sec14 = $request->sec14;
    $about->sec15 = $request->sec15;
    
    $about->sec10_ar = $request->sec10_ar;
    $about->sec11_ar = $request->sec11_ar;
    $about->sec12_ar = $request->sec12_ar;
    $about->sec13_ar = $request->sec13_ar;
    $about->sec14_ar = $request->sec14_ar;
    $about->sec15_ar = $request->sec15_ar;

    $about->save();
    return redirect()->back();
}




public function deleteabout(Request $request) 
{
    About::where('id',$request->modaledel_id)->delete();
    return redirect()->back();
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function insertexcursion(Request $request)
{
    $excursion = new Excursion();
    $excursion->excursion = $request->excursion_name;
    $excursion->dest_id = $request->dest_id;
    $excursion->save();
    return redirect()->back(); 
}
public function editexcursion(Request $request)
{
    $excursion = Excursion::findOrFail($request->excursion_id);
    $excursion->excursion = $request->excursion_name;
    $excursion->dest_id = $request->dest_id;
    $excursion->save();
    return redirect()->back();
}
public function deleteexcursion(Request $request) 
{
    Excursion::where('id',$request->modaledel_id)->delete();
    return redirect()->back();
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////








}
