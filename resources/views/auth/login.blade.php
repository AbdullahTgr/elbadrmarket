@php
    $nav='';
@endphp
@extends('layouts.app')

@section('content')

<section style="direction: ltr;">
    <div class="page-header min-vh-75"> 
      <div class="container"> 
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
            <div class="card card-plain mt-8"  style="direction: rtl;">
              <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">شركة البدر</h3>
                <p class="mb-0">ادخل الايميل وكلمة السر </p>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('login') }}" role="form">
                    @csrf
                  <label>الايميل</label>
                  <div class="mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                  <label>كلمة السر</label>
                  <div class="mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                 </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">تذكرني</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">دخول</button>
                  </div>
                </form>
              </div>
 
            </div>
          </div>
          <div class="col-md-6">
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
              <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('imgs/cover.jpg')"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




@endsection
