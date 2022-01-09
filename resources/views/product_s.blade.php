
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @forelse ($products as $product)
                        
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ $product->sec9 }}">
                            <h5><a href="{{ route('showproduct',[ $product->id]) }}">{{ $product->sec2 }}</a></h5>
                        </div>
                    </div>

                    @empty
                         
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/img/categories/cat-1.jpg">
                            <h5><a href="#">{{ trans('sentence.addproductplease') }}</a></h5>
                        </div>
                    </div>
                    
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li data-filter=".oranges">{{ trans('sentence.mostvisit') }}</li>
                            <li data-filter=".new">{{ trans('sentence.new') }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row featured__filter load">
                
                @forelse ($mostvisit as $product)
                <div class="col-6 col-lg-3 col-md-4 mix oranges">

                    
                    <div class="featured__item">
                        <div onclick="window.location='{{ route('showproduct',[ $product->id]) }}'" class="featured__item__pic set-bg" data-setbg="{{ $product->sec9 }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>

                                <li><a href="#"><label style="    padding: 0; margin: 0;" for="a2c{{ $product->id }}"><i class="fa fa-shopping-cart"></i></label></a></li>
                                

                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->sec2 }}" name="name">
                            <input type="hidden" value="{{ $product->sec5 }}" name="price">
                            <input type="hidden" value="{{ $product->sec9 }}"  name="image">
                            <input type="hidden" value="1" name="quantity">
                            <button id="a2c{{ $product->id }}" style="display: none"></button>
                        </form>





                            </ul>
                        </div>
                        
                        <div class="featured__item__text">
                            <h6><a href="{{ route('showproduct',[ $product->id]) }}">{{ $product->sec2 }}</a></h6>
                            <h5>جنية {{ $product->sec5 }} </h5>
                        </div>
                    </div>
                </div>

                @empty

                @endforelse













                @forelse ($products as $product)
                <div class=" col-6 col-md-4 col-lg-3  mix  new"  >

                    
                    <div class="featured__item">
                        <div onclick="window.location='{{ route('showproduct',[ $product->id]) }}'" class="featured__item__pic set-bg" data-setbg="{{ $product->sec9 }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>

                                <li><a href="#"><label style="    padding: 0; margin: 0;" for="a2c{{ $product->id }}"><i class="fa fa-shopping-cart"></i></label></a></li>
                                

                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->sec2 }}" name="name">
                            <input type="hidden" value="{{ $product->sec5 }}" name="price">
                            <input type="hidden" value="{{ $product->sec9 }}"  name="image">
                            <input type="hidden" value="1" name="quantity">
                            <button id="a2c{{ $product->id }}" style="display: none"></button>
                        </form>





                            </ul>
                        </div>
                        
                        <div class="featured__item__text">
                            <h6><a href="{{ route('showproduct',[ $product->id]) }}">{{ $product->sec2 }}</a></h6>
                            <h5>جنية {{ $product->sec5 }} </h5>
                        </div>
                    </div>
                </div>

                @empty

                @endforelse
                


                
            </div>
             


        </div>
        <div class="row featured__filter loadingarea">
                <button class="loadmore" data-id="{{ $last }}" >... المذيد</button>
        </div> 

    </section>
    
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="/img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
               
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>{{ trans('sentence.latestproducts') }}</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @forelse ($latest->slice(0, 3) as $item)
                                    
                                <a href="{{ route('showproduct',[ $item->id]) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ $item->sec9 }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                @empty
                                    
                                @endforelse
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @forelse ($latest->slice(3,3) as $item)
                                    
                                <a href="{{ route('showproduct',[ $item->id]) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ $item->sec9 }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                @empty
                                    
                                @endforelse
                            </div>
                            <div class="latest-prdouct__slider__item">
                                
                                @forelse ($latest->slice(6,3) as $item)
                                    
                                <a href="{{ route('showproduct',[ $item->id]) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ $item->sec9 }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                @empty
                                    
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>























                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>{{ trans('sentence.topratedproducts') }}</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @forelse ($toprated->slice(0, 3) as $item)
                                    
                                <a href="" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ $item->sec9 }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                @empty
                                    
                                @endforelse
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @forelse ($toprated->slice(3,3) as $item)
                                    
                                <a href="" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ $item->sec9 }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                @empty
                                    
                                @endforelse
                            </div>
                            <div class="latest-prdouct__slider__item">
                                
                                @forelse ($toprated->slice(6,3) as $item)
                                    
                                <a href="" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ $item->sec9 }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                @empty
                                    
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>{{ trans('sentence.reviewedproducts') }}</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @forelse ($reviewd->slice(0, 3) as $item)
                                    
                                <a href="" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ $item->sec9 }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                @empty
                                    
                                @endforelse
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @forelse ($reviewd->slice(3,3) as $item)
                                    
                                <a href="" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ $item->sec9 }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                @empty
                                    
                                @endforelse
                            </div>
                            <div class="latest-prdouct__slider__item">
                                
                                @forelse ($reviewd->slice(6,3) as $item)
                                    
                                <a href="" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ $item->sec9 }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                @empty
                                    
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Latest Product Section End -->
