@extends('layouts.apphome')

@section('content')


<!-- ======= Hero Section ======= -->
@if ($hme->status=='1')
    
<section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row"> 
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          @if (session()->get('locale')=='en')
          <h1>{{ $hme->sec1 }}</h1>
          <h2>{{ $hme->sec2 }}</h2>
            @else
            <h1>{{ $hme->sec1_ar }}</h1>
            <h2>{{ $hme->sec2_ar }}</h2>
          @endif

         
          <div class="d-flex justify-content-center justify-content-lg-start">
            
@if ($setups[10]->status=='1')

            <a target="_blank" href="{{ $hme->sec3 }}" class="btn-get-started scrollto">{{ trans('sentence.getstarted')}}</a>
@endif      
@if ($setups[9]->status=='1')
  <a target="_blank" href="{{ $hme->sec4 }}" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>{{ trans('sentence.watchvideo')}}</span></a>
         
@endif
           </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset('sty/assets/img/skills.png') }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div> 

  </section><!-- End Hero -->
@endif

  <main id="main" >
@if ($setups[4]->status=='1')
  @include('sections.clints')
@endif
@if ($about->status=='1')
  @include('sections.about')
@endif
@if ($setups[12]->status=='1')
  @include('sections.prd')
@endif   
@if ($setups[11]->status=='1')
  @include('sections.carusel')
@endif
@if ($setups[6]->status=='1')
  @include('sections.whyus')
@endif
@if ($setups[1]->status=='1')
  @include('sections.services')
@endif 
@if ($setups[3]->status=='1')
  @include('sections.portfolio')
@endif 
@if ($setups[2]->status=='1')
  @include('sections.team')
@endif 
@if ($contactus->status=='1')
  @include('sections.contactus')
@endif 















  </main><!-- End #main -->
@endsection
 