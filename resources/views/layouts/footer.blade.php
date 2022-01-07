
  <!-- ======= Footer ======= -->
  <footer id="footer">

   
 
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>{{ trans('sentence.elbadr')}}</h3>
            <p>
              {{ $contactus->sec2 }}<br>
              <strong>{{ trans('sentence.phone')}}:</strong> {{ $contactus->sec4 }}<br>
              <strong>{{ trans('sentence.email')}}:</strong> {{ $contactus->sec3 }}<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>{{ trans('sentence.links')}}</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{ trans('sentence.home')}}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{ trans('sentence.about')}}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{ trans('sentence.services')}}</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>{{ trans('sentence.services')}}</h4>
            <ul>

              @forelse ($service->slice(0, 5) as $service)
              <li><i class="bx bx-chevron-right"></i> <a href="{{ $service->id }}">{{ $service->sec2 }}</a></li>
              @empty
              No Services
              @endforelse
            </ul>
          </div>

          

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>{{ trans('sentence.span')}}</span></strong>. {{ trans('sentence.allrights')}}
      </div>
      

      <div class="social">
        <a target="_blank" href="{{ $setups[13]->sec1 }}"><i class="ri-facebook-fill"></i></a>
        <a target="_blank" href="{{ $setups[13]->sec2 }}"><i class="ri-twitter-fill"></i></a>
        <a target="_blank" href="{{ $setups[13]->sec3 }}"><i class="ri-instagram-fill"></i></a>
        <a target="_blank" href="{{ $setups[13]->sec4 }}"><i class="ri-youtube-fill"></i></a>
        <a target="_blank" href="{{ $setups[13]->sec5 }}"> <i class="ri-linkedin-box-fill"></i> </a>
      </div>
    
    
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>