<div class="col-lg-3" >
    <div class="hero__categories">
        <div class="hero__categories__all">
            <i class="fa fa-bars"></i>
            <span>{{ trans('sentence.allcategories')}}</span>
        </div>
        <ul>
            @forelse ($mcats as $item)
                <li><a href="{{ route('sub_cats',[$item->id]) }}">{{ $item->sec2; }}</a></li>
            @empty
            <li><a href="#">NO Departments</a></li>
            @endforelse
        </ul>
    </div>
</div>