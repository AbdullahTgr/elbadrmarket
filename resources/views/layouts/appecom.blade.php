<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <?php
if (session()->has('locale')) {
}else{
    session()->put('locale', 'ar'); 
}

?>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="description" content="شركة البدر للتوريد والتصنيع">
  <meta name="keywords" content="Elbadr, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>شركة البدر للتوريد والتصنيع</title>
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

  <!-- Css Styles -->
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="css/nice-select.css" type="text/css">
  <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
  <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
  <link rel="stylesheet" href="css/style.css" type="text/css">
<head>

</head> 
<body>
  
  @error('email')
  <span class="" role="alert">
      <strong>{{ $message }}</strong>
  </span>
  @enderror
  @error('password')
  <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
  </span>
  @enderror
  @error('name')
  <span class="invalid-feedback" role="alert">
  <strong>{{ $message }}</strong>
  </span>
  @enderror

        @include('layouts.navbarecom')

        @yield('content')

        @include('layouts.footerecom')
        

  <!-- Js Plugins -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.slicknav.js"></script>
  <script src="js/mixitup.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>

        @yield('scripts')  

</body> 
  
 
<form method="POST" action="{{ route('login') }}" role="form" class="form-action">
    @csrf

  <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered justify-content-center " role="document">
          <div class="modal-content border-0 mx-3">
              <div class="modal-body p-0">
                  <div class="row justify-content-center">
                      <div class="col-auto">
                          <div class="card">
                              <div class="card-header bg-white pb-0 border-0">
                                  <div class="row">
                                      <div class="col text-center"><img style="width: 90px;" class="img-fluid m-3 cross" src="img/login.png" data-dismiss="modal" alt="Image result for close png" width="17" height="17"></div>
                                  </div>
                              </div>
                              <div class="card-body pt-0">
                                  <div class="row justify-content-center text-center">
                                      <div class="col">
                                          <p class="mb-2"><b>دخول</b></p><small class="px-sm-5 px-2">اعمل حساب عشان تحجز منتجات اسرع  </small>
                                      </div>
                                  </div>
                                  <div class="row justify-content-center">
                                      <div class="col-sm-9 mt-5" style="text-align: right;">
                                        <span>الايميل</span> 
                                        <input required type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="الايميل" aria-label="Email" aria-describedby="email-addon">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                                    </div>


                            <div class="col-sm-9 mt-5 hidd name_reg" style="text-align: right;">
                                <span>الاسم</span> 
                                <input  type="text" name="name" class="nme form-control @error('name') is-invalid @enderror" placeholder="الاسم" aria-label="name" aria-describedby="name-addon">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>









                            <div class="col-sm-9 mt-2 " style="text-align: right;"> 
                                <span>كلمة المرور</span>
                                <input required type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="كلمة المرور" aria-label="Password" aria-describedby="password-addon">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>



<div class="col-sm-9 mt-2 hidd repass" style="text-align: right;"> 
    <span>اعد كتابة كلمة المرور</span>
    <input  type="password" name="password_confirmation" class="rp form-control @error('password_confirmation') is-invalid @enderror" placeholder="اعد كتابة كلمة المرور" aria-label="password_confirmation" aria-describedby="password-addon">
    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>


                                    
                                  </div>
                                  
                                  <div class="row mt-auto pt-auto text-center ">
                                    <div class="col mt-auto pt-auto">
                                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0 text-submit"   >دخول</button>
                                    </div>
                                    <div class="col mt-auto pt-auto ">
                                      <span class="btn bg-gradient-info w-100 mt-4 mb-0 switch_login hidd">لدي حساب بالفعل</span>
                                    </div>
                                    {{-- /////////////////////////////////////////////////////// --}}
                                    <div class="col mt-auto pt-auto " >
                                      <span class="btn bg-gradient-info w-100 mt-4 mb-0 switch_register ">انشئ حساب جديد</span>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  
</form>
</div>







</html>
