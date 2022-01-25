@extends('layouts.appecom')





@section('content')

<div class="container" style="
            direction: rtl;
    text-align: right;
            ">
	<div class="row">
		<div class="col-md-3 " style="    margin-bottom: 10px;">
		     <div class="list-group ">
              <a href="#" class="list-group-item list-group-item-action active">{{ $user[0]->name }}</a>
              <a href="#" class="list-group-item list-group-item-action">طلبات مكتملة</a>
              <a href="#" class="list-group-item list-group-item-action">طلبات لم تكتمل بعد</a>
              
              <a href="#" class="list-group-item list-group-item-action">عربة التسوق</a>
              <a href="#" class="list-group-item list-group-item-action">قائمة المفضلة</a>
              <a href="#" class="list-group-item list-group-item-action">اعجاباتي</a>
              <a href="#" class="list-group-item list-group-item-action">رسائل</a>
              
              
            </div> 
		</div>
        
<br>
		<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-12">
		                    <h4>ملفك الشخصي</h4>
		                    <hr>
		                </div>
		            </div>
                    
<br>
		            <div class="row">
		                <div class="col-md-12">
		                    <form method="POST" action="{{ route('updateprofile',$user[0]->id) }}">
                                @csrf
                              <div class="form-group row">
                                <label for="username" class="col-4 col-form-label">الاسم</label> 
                                <div class="col-8">
                                  <input id="username" name="name" placeholder="الاسم" class="form-control here" required="required" type="text" value="{{ $user[0]->name }}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">الاسم الاول</label> 
                                <div class="col-8">
                                  <input id="name" name="first_name" placeholder="الاسم الاول" class="form-control here" type="text"  value="{{ $user[0]->first_name }}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">الاسم الاخير</label> 
                                <div class="col-8">
                                  <input id="lastname" name="last_name" placeholder="الاسم الاخير" class="form-control here" type="text"  value="{{ $user[0]->last_name }}">
                                </div>
                              </div>
                              
                              
                              <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">الايميل</label> 
                                <div class="col-8">
                                  <input id="email" name="email" placeholder="الايميل" class="form-control here" required="required" type="text"  value="{{ $user[0]->email }}"> 
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="phone" class="col-4 col-form-label">رقم الهاتف</label> 
                                <div class="col-8">
                                  <input id="phone" name="phone" placeholder="رقم الهاتف" class="form-control here" type="text"  value="{{ $user[0]->phone }}">
                                </div>
                              </div>



                              <div class="form-group row">
                                <label for="job_title" class="col-4 col-form-label">الوظيفة</label> 
                                <div class="col-8">
                                  <textarea id="job_title" name="job_title" cols="40" rows="4" class="form-control">{{ $user[0]->job_title }}</textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="job_description" class="col-4 col-form-label">تفاصيل اخري</label> 
                                <div class="col-8">
                                  <textarea id="job_description" name="job_description" cols="40" rows="4" class="form-control">{{ $user[0]->job_description }}</textarea>
                                </div>
                              </div>



                              <div class="form-group row">
                                <label for="newpass" class="col-4 col-form-label">غير الرقم السري</label> 
                                <div class="col-8">
                                  <input id="newpass" name="newpass" placeholder="غير الرقم السري" class="form-control here" type="text"  value="0000000">
                                </div>
                              </div> 
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                    
                                    
                                  <button name="submit" type="submit" class="btn btn-primary"id="update_user">تحديث البيانات</button>
                                </div>
                              </div>
                            </form>
		                </div>
		            </div>
                    
<br>
		            
		        </div>
		    </div>
		</div>
	</div>
</div>
<br>
@endsection




@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

   



</script>

@endsection