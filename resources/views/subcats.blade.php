 
 <div class="row featured__filter">
                @forelse ($scats as $product)

<div class="col-lg-3 col-md-4 col-sm-6 mix  new" >

    
    <div class="featured__item">
        <div style="height: 200px" onclick="window.location='{{ route('s__products',[ $product->id]) }}'" class="featured__item__pic set-bg" data-setbg="{{ $product->sec9 }}"></div>
        
        <div class="featured__item__text">
            <h6><a href="{{ route('s__products',[ $product->id]) }}">{{ $product->sec2 }}</a></h6>
            <h5>جنية {{ $product->sec5 }} </h5>
        </div>
    </div>
</div>

                @empty
لاتوجد فئات
                @endforelse
                </div>