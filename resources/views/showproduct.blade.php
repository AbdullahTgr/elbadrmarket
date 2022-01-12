@extends('layouts.appecom')






 


@section('content')

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
               @include('departments')
                <div class="col-lg-9">
                
               @include('search')
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>فئة {{ $scat[0]->sec2_ar }} </h2>
                        <div class="breadcrumb__option">
                            <a href="/">{{ trans('sentence.home') }}</a>
                            <a href="./index.html"> فئة رئيسية  {{ $mcat[0]->sec2_ar }} </a>
                            <span>فئة {{ $scat[0]->sec2_ar }} </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{ $product[0]->sec9 }}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="{{ $product[0]->sec9 }}"
                                src="{{ $product[0]->sec9 }}" alt="">
                            <img data-imgbigurl="{{ $product[0]->sec9 }}"
                                src="{{ $product[0]->sec9 }}" alt="">
                            <img data-imgbigurl="{{ $product[0]->sec9 }}"
                                src="{{ $product[0]->sec9 }}" alt="">
                            <img data-imgbigurl="{{ $product[0]->sec9 }}"
                                src="{{ $product[0]->sec9 }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $product[0]->sec2 }}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">{{ $product[0]->sec5 }} جنية</div>
                        <p>{{ $product[0]->sec3 }}</p>
                       


                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product[0]->id }}" name="id">
                            <input type="hidden" value="{{ $product[0]->sec2 }}" name="name">
                            <input type="hidden" value="{{ $product[0]->sec5 }}" name="price">
                            <input type="hidden" value="{{ $product[0]->sec9 }}"  name="image">
 <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                            <input type="" value="1" name="quantity">
                            <button id="a2c" style="display: none"></button>
                                </div>
                        <a  href="#" class="primary-btn "><label style="    padding: 0; margin: 0;" for="a2c">{{ trans('sentence.addtocart') }}</label></a>
                        
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        </form>
                            </div>
                        </div>













                        <ul>
                            <li><b>{{ trans('sentence.avaliable') }}</b> <span>In Stock</span></li>
                            <li><b>{{ trans('sentence.shipping') }}</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>{{ trans('sentence.weight') }}</b> <span>0.5 kg</span></li>
                            <li><b>{{ trans('sentence.shareon') }}</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">{{ trans('sentence.description') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">{{ trans('sentence.information') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">{{ trans('sentence.rewiews') }} <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>{{ trans('sentence.description') }}</h6>
                                    <p>{{ $product[0]->sec6 }}</p>
                                    <p>{{ $product[0]->sec8 }}</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>{{ trans('sentence.information') }}</h6>
                                    <p>{{ $product[0]->sec6 }}</p>
                                    <p>{{ $product[0]->sec8 }}</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>{{ trans('sentence.rewiews') }}</h6>
                                    <p>{{ $product[0]->sec6 }}</p>
                                    <p>{{ $product[0]->sec8 }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>{{ trans('sentence.relatedproducts') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($related as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">

                    
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ $product->sec9 }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{ route('showproduct',[ $product->id]) }}">{{ $product->sec2 }}</a></h6>
                            <h5>{{ $product->sec4 }}</h5>
                        </div>
                    </div>
                </div>

                @empty

                @endforelse
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
@endsection




@section('scripts')

<script>

    

</script>

@endsection