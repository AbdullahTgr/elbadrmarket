        {{-- <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div> --}}
    
        <!-- Humberger Begin -->
        <div class="humberger__menu__overlay"></div>
        <div class="humberger__menu__wrapper">
            <div class="humberger__menu__logo">
                <a href="/"><img style="width: 60px;" src="img/logo.png" alt=""></a>
            </div>
            <div class="humberger__menu__cart">
                <ul>
                    <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                    <li><a href="{{ route('cart.list') }}"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                </ul>
                <div class="header__cart__price">{{ trans('sentence.item')}}: <span>{{ trans('sentence.currency')}}{{ Cart::getTotal() }}</span></div>
            </div>
            <div class="humberger__menu__widget">
                <div class="header__top__right__language">
                    <img src="img/language.png" alt="">
                    <div>{{ trans('sentence.english')}}</div>
                    <span class="arrow_carrot-down"></span>
                    <ul>
                        <li><a href="{{ route('lang',['ar']) }}">{{ trans('sentence.arabic')}}</a></li>
                        <li><a href="{{ route('lang',['en']) }}">{{ trans('sentence.english')}}</a></li>
                    </ul>
                </div>
                <div class="header__top__right__auth">

                    @if (Auth::check())
                    <a class="nav-link" style="display: inline;" href="#" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                               @csrf
                              </form>  
                    خروج
                            </a>
                    @else
                    <div class="header__top__right__auth">
                        <a href=""  data-toggle="modal" data-target="#my-modal"><i class="fa fa-user"></i> {{ trans('sentence.login')}}</a>
                    </div>
                    @endif

                   
                </div>
            </div> 
            <nav class="humberger__menu__nav mobile-menu">
                <ul>
                    <li class="active"><a href="./index.html">{{ trans('sentence.home')}}</a></li>
                    <li><a href="./contact.html">{{ trans('sentence.contact')}}</a></li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
            <div class="header__top__right__social">
                <a href="#"><i class="fa fa-facebook"></i></a>
            </div>
            <div class="humberger__menu__contact">
                <ul>
                    <li><i class="fa fa-envelope"></i> elbadrstore@gmail.com</li>
                    <li>{{ trans('sentence.freeshipping')}}</li>
                </ul>
            </div>
        </div>
        <!-- Humberger End -->
    <!-- Header Section Begin -->
    <header class="header">
      <div class="header__top"> 
          <div class="container">
              <div class="row">
                  <div class="col-lg-6 col-md-6">
                      <div class="header__top__right">
                          <ul>
                              <li><i class="fa fa-envelope"></i> elbadrstore@gmail.com</li>
                              <li>{{ trans('sentence.freeshipping')}}</li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                      <div class="header__top__left" style="
                      padding: 10px 0 13px;
                      ">
                          <div class="header__top__right__social">
                              <a href="#"><i class="fa fa-facebook"></i></a>
                          </div>



                     

                          

@if (Auth::check())



        <div class="header__top__right__language">
            <img src="img/language.png" alt="">
            <div>{{ Auth::user()->name; }}</div>
            <span class="arrow_carrot-down"></span> 
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
           @csrf
        </form>  
            <ul>
              <li><a href="{{ route('myprofile',Auth::user()->id) }}">بروفايل </a></li>
              <li><a href="#" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">خــــOOــروج</a></li>
            </ul>
        </div>
        




@else


<div class="header__top__right__language">
    <img src="img/language.png" alt="">
    <div>تسجيل</div>
    <span class="arrow_carrot-down"></span>
    <ul>
      <li><a data-toggle="modal" data-target="#my-modal">{{ trans('sentence.login')}}</a></li>
    </ul>
</div>





@endif
          
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="container">
          <div class="row">
              <div class="col-lg-3 tar">
                  <div class="header__logo">
                      <a href="/"><img style="width: 60px;" src="img/logo.png" alt=""></a>
                  </div>
              </div>
              <div class="col-lg-6 tar">
                  <nav class="header__menu">
                      <ul>
                          <li class="active"><a href="/">{{ trans('sentence.home')}}</a></li>
                          <li><a href="./contact.html">{{ trans('sentence.contacts')}}</a></li>
                      </ul>
                  </nav>
              </div>
              <div class="col-lg-3 tar">
                  <div class="header__cart">
                      <ul>
                          <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                          <li><a href="{{ route('cart.list') }}"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                      </ul>
                      <div class="header__cart__price"> <span>{{ Cart::getTotal() . trans('sentence.currency')}}</span></div>
                  </div>
              </div>
          </div>
          <div class="humberger__open">
              <i class="fa fa-bars"></i>
          </div>
      </div>
  </header>
  <!-- Header Section End -->
  