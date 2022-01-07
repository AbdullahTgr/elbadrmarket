  <!-- ======= Header ======= -->

  <?php

if (session()->has('locale')) {
  
}else{
    session()->put('locale', 'ar'); 
        }
        
?>

  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
<a href="index.html">
        <img width="100px" src="{{ asset('sty/assets/img/logo2.png') }}" ></a>
      <span style="
          width: 50%;
    color: white;
    font-size: 19px;
    font-weight: bold;
}
      ">{{ trans('sentence.span')}}</span>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="sty/assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>



          
        @if ($hme->status=='1')
        <li><a class="nav-link scrollto active" href="#hero">{{ trans('sentence.home')}}</a></li>
      @endif
      @if ($about->status=='1')
        <li><a class="nav-link scrollto" href="#about">{{ trans('sentence.about')}}</a></li>
      @endif
        @if ($setups[12]->status=='1')
          <li><a class="nav-link   scrollto" href="#prds">{{ trans('sentence.prds')}}</a></li>
        @endif   
        
        @if ($setups[1]->status=='1')
          <li><a class="nav-link scrollto" href="#services">{{ trans('sentence.services')}}</a></li>
        @endif
        @if ($setups[3]->status=='1')
          <li><a class="nav-link   scrollto" href="#portfolio">{{ trans('sentence.portfolio')}}</a></li>
        @endif 
        @if ($setups[2]->status=='1')
          <li><a class="nav-link scrollto" href="#team">{{ trans('sentence.team')}}</a></li>
        @endif 
        @if ($contactus->status=='1')
          <li><a class="nav-link scrollto" href="#contact">{{ trans('sentence.contact')}}</a></li>
        @endif 
          <li><a class="nav-link scrollto" target="_blank" href="{{ route('products') }}">{{ trans('sentence.products')}}</a></li>



        












          <li class="dropdown"><a href="#">
            <span>
              @if (session()->get('locale')=='en')
                  {{ trans('sentence.arabic') }}
                  @else
                  {{ trans('sentence.english') }}
              @endif
           </span> <i class="bi bi-chevron-down">
 
          </i>
        </a>
            <ul>
              <li><a href="lang/en">{{ trans('sentence.english') }}</a></li>
              <li><a href="lang/ar">{{ trans('sentence.arabic') }}</a></li>
            </ul>
          </li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header --> 