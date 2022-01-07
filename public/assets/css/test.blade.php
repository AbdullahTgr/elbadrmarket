
<?php


$myid=session()->get('uid_ses_1');
$i_am = DB::select('select * from users where UserID=?', [$myid]);

session()->put('username_ses_1',$i_am[0]->Username);

$firm_d= $i_am[0]->firm_id;
$myname= session()->get('username_ses_1');

 


$rows = DB::select('select users.*,main_categories.*, categories.* from categories 
inner join main_categories on main_categories.cat_id = categories.main_cat_id
inner join users on users.UserID = main_categories.user_id

where  users.firm_id=?', [$firm_d]);

if(isset($_POST['insert']))
{
	  $name=filter_var(str_replace(",", "####*####", trim($_POST['name'])),FILTER_SANITIZE_STRING);
      $desc=filter_var(str_replace(",", "####*####", trim($_POST['desc'])),FILTER_SANITIZE_STRING);
      
      $yourname=filter_var(str_replace(",", "####*####", trim($_POST['yourname'])),FILTER_SANITIZE_STRING);
	  $address=filter_var(str_replace(",", "####*####", trim($_POST['address'])),FILTER_SANITIZE_STRING);
      $phone=filter_var(str_replace(",", "####*####", trim($_POST['phone'])),FILTER_SANITIZE_STRING);
     
	  $price=floatval($_POST['price']);
	  $user_id=$myid;
      $cat_id=$_POST['cat_id'];
      $discount=floatval($_POST['discount']);
	  $image_product=$_POST['image_product'];
	  $imgs_num=0;

if($i_am[0]->GroupID==1&&$i_am[0]->firm_position=="owner"){
    $approved=1;
}else{
    $approved=0;
}
    		   
	  $img_name = DB::table('prds')->insertGetId(
            [
				'prd_name' => $name,
				'prd_desc' => $desc,
				'prd_price' => $price,
				'user_id' => $user_id, 
				'cat_ID' => $cat_id,
				'discount' => $discount,
				'yourname' => $yourname, 
				'phone' => $phone,
				'address' => $address,
				'prd_id_en' => 'test',
				'imgs_num' => $imgs_num,
				'approved' => $approved
			 ]
    );
	$prd_id=$img_name;
	$prd_id_en=md5($img_name);
	
	$dir_to_prds_imgs="../cp/uploads/";
	  foreach ($image_product as $image_prd) {
		  if($image_prd != ""){
			$imgs_num++;

    

//////////////////////////////////////////////////////////////

	// $dir = $img_name;
	// $ftp_server='ftp.elbadrstore.com';
	if(!is_dir($dir_to_prds_imgs.$img_name))
		{
            
            if(!is_dir($dir_to_prds_imgs.$img_name))
            {
                mkdir($dir_to_prds_imgs.$img_name, 0777);
                $myfile =fopen($dir_to_prds_imgs.$img_name.'/'."index.php", "w");

                $txt = "بطل لعب يبني ";
                fwrite($myfile, $txt);
                fclose($myfile);
            }

        }
   


    $route=$dir_to_prds_imgs.$img_name.'/'.$imgs_num.".jpg";

	file_put_contents($route, file_get_contents($image_prd));
    }
//////////////////////////////////////////////////////////////
		  }
		  DB::update('update prds set prd_id_en=?, imgs_num=? where prd_id=?', [$prd_id_en,$imgs_num,$prd_id]);
		  ?>
@include('layouts.welcome')

		  <?php
	  }
 

	 // DB::insert('insert into prds (prd_name,prd_desc,prd_price,prd_qtty,user_id,cat_ID,discount,weight,prd_id_en,imgs_num) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$name,$desc,$price,$prd_qtty,$user_id,$cat_id,$discount,$weight,"TEST",$imgs_num]);

 

?>

<div class="col-sm-12" style="padding: 7px;">
    	<center class="tecket" style="
	    font-size: 25px;
    padding: 21px;
    font-weight: bold;
    color: #2874f0;
	">
<?php

echo $myname;
?>	
</center>
	<center class="tecket" style="
	    font-size: 25px;
    padding: 21px;
    font-weight: bold;
    color: #2874f0;
	">أضف إعلانك</center>
	
	<form class="addnewprd" method="post" enctype="multipart/form-data">
	    @csrf
		<div class="col-sm-12 "> 

			<div class="col-sm-12 "> 
				<div class="col-sm-12 po4 tecket">
				    	
					<div class="row" style="padding-bottom:10px;">
						<select required class="col-sm-12" name="cat_id" id="">
								<?php
		foreach ($rows as $row) { 
			
		?> 

							<option value="<?php echo $row->cat_ID; ?>">
								<?php echo filter_var(str_replace( "####*####",",", trim($row->cat_NAME)),FILTER_SANITIZE_STRING)." >>> <span class='pull-right'>".filter_var(str_replace( "####*####",",", trim($row->cat_name)),FILTER_SANITIZE_STRING)."</span>"; ?>
							</option>
		<?php
		}
			?>
						</select>				
					</div>
					
@include('crop-image-upload') 
					{{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
					<div class="row">
						<div class="col-sm-4 col-md-2 po7 "style="text-align:right">
							<h4>اسم الاعلان</h4>
						</div>
						<div class="col-sm-8 col-md-10 po7">
							<input required value="" class="col-sm-12" type="text" placeholder="اسم الاعلان" name="name">
						</div>
					</div>
					{{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
					<div class="row">
						<div class="col-sm-4 col-md-2 po7 "style="text-align:right">
							<h4>اكتب اسمك</h4>
						</div>
						<div class="col-sm-8 col-md-10 po7">
							<input required value="" class="col-sm-12" type="text" placeholder="اكتب اسمك" name="yourname">
						</div>
					</div>
					{{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
					<div class="row">
						<div class="col-sm-4 col-md-2 po7 "style="text-align:right">
							<h4>العنوان</h4>
						</div>
						<div class="col-sm-8 col-md-10 po7">
							<input required value="" class="col-sm-12" type="text" placeholder="العنوان " name="address">
						</div>
					</div>
					{{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
					<div class="row">
						<div class="col-sm-4 col-md-2 po7 "style="text-align:right">
							<h4>رقم تيليفونك</h4>
						</div>
						<div class="col-sm-8 col-md-10 po7">
							<input required value="" class="col-sm-12" type="text" placeholder="رقم تيليفونك" name="phone">
						</div>
					</div>
					{{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
					<div class="row">
						<div class="col-sm-4 col-md-2 po7"style="text-align:right">
							<h4>السعر</h4>
						</div>
						<div class="col-sm-8 col-md-10 po7">
							<input required value="" class="col-sm-12" type="text" placeholder="السعر" name="price">
						</div>
					</div>
					
					{{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
					<div class="row">
						<div class="col-sm-4 col-md-2 po7"style="text-align:right">
							<h4>اضافة خصم بالجنية؟</h4>
						</div>
						<div class="col-sm-8 col-md-10 po7">
							<input  value="" class="col-sm-12" type="number" placeholder="اضافة خصم بالجنية؟" name="discount">
						</div>
					</div>
					{{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
					<div class="row">
						<div class="col-sm-4 col-md-2 po7" style="text-align:right; height:auto">
							<h4>تفاصيل</h4>
						</div>
						<div class="col-sm-8 col-md-10 po7"  style="text-align:right; height:auto">
							<textarea required value="" class="col-sm-12" name="desc"   placeholder="تفاصيل" ></textarea>
						</div>
					</div>
					{{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
					<div class="row">
						<h3 class="col-sm-12 po7 afterdisc center">0</h3>
					</div>
					{{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}


					
				
				</div>
			</div>

		</div>	
		


	<center>
		<input class="floatbottom" type="submit" value="اضف">
	</center>
	</form>
</div>




