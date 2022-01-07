@extends('layouts.app')

@section('content')
    <!-- ======= product Section ======= -->
<input type="hidden" value="" class="img_dest">
    <input type="hidden" value="" class="full_img">
    <input type="hidden" value="" class="imgdest">
    <input type="hidden" value="" class="fullimg">
    <section id="product" class="team section-bg">


      <div class="container" style="direction: ltr;" data-aos="fade-up">
        <div class="section-title">
          <h2>المنتجات</h2>
        </div>
        <div class="row">
<label for="it_f" class="img_l col-lg-2 col-md-4 col-6 d-flex btn btn-primary">
 اضف منتج جديد
  <div class="align-items-center justify-content-center">
       <img src="" style="display: none" class="img-fluid base64data_" alt="">
     </div> 
   
</label>
        </div>
        <div class="row">
@forelse ($product as $product)
<div class="col-lg-6" style="margin-top:15px;">
  <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
  <label for="itf" class="imgl ">
    <div class="pic">
      <img src="{{ $product->sec9 }}" class="img-fluid base64data" alt="">
    </div>
      </label> 
    <div class="member-info">
      <h4>{{ $product->sec2 }}</h4>
      <span>{{ $product->sec3 }}</span>
      <p><label>السعر</label>{{ $product->sec5 }}</p>
      <p><label>الوحدة</label>{{ $product->sec4 }}</p>
      <p style="
      
     
      ">
      <label>الكمية المتاحة</label>
      <label style="
      position: absolute;
    left: 33px;
    background: #40a846;
    color: white;
    padding: 10px;
    font-size: 20px;
    bottom: 12px;
    border-radius: 10px;
      
    @if($product->sec6<11)

background:red;
   @else


   @endif



      "> {{ $product->sec6 }}</label>
     </p>
    </div>
  </div>
  <a style="margin-top:15px;"   data-toggle="modal" data-target="#editproduct" class="editproduct btn btn-success btn-get-started scrollto">
              
    <input class="id" type="hidden" value="{{ $product->id }}">
    <input class="sec2" type="hidden" value="{{ $product->sec2 }}">
    <input class="sec3" type="hidden" value="{{ $product->sec3 }}">
    <input class="sec4" type="hidden" value="{{ $product->sec4 }}">
    <input class="sec2_ar" type="hidden" value="{{ $product->sec2_ar }}">
    <input class="sec3_ar" type="hidden" value="{{ $product->sec3_ar }}">
    <input class="sec4_ar" type="hidden" value="{{ $product->sec4_ar }}">
    <input class="sec5" type="hidden" value="{{ $product->sec5 }}">
    <input class="sec6" type="hidden" value="{{ $product->sec6 }}">
    <input class="sec7" type="hidden" value="{{ $product->sec7 }}">
    <input class="sec8" type="hidden" value="{{ $product->sec8 }}">
    تعديل
</a>
<a style="margin-top:15px;"   data-toggle="modal" data-target="#dele" class="del btn btn-danger btn-get-started scrollto"><input class="id" type="hidden" value="{{ $product->id }}">حذف</a>

</div> 
@empty
    لاتوجد منتجات بعد
@endforelse
         

        </div>

      </div>
    </section><!-- End product Section -->
 @include('ecommerce.products.delete')
@include('ecommerce.products.edit')
@include('ecommerce.products.add')

@include('ecommerce.products.imgcrop')
@include('ecommerce.products.imgcrop_upload_product') 

 


@endsection


@section('scripts')
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js" integrity="sha512-h9kKZlwV1xrIcr2LwAPZhjlkx+x62mNwuQK5PAu9d3D+JXMNlGx8akZbqpXvp0vA54rz+DrqYVrzUGDMhwKmwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
<script type="text/javascript" src="{{asset('da/js/tasks.js')}}"></script>
<script>
     
     $(document).on('keyup', '#discount', function(){
      $(this).parent().find('#after_salary').val(Number( $(this).parent().find('#current_salary').val()) - Number($(this).val()));
     });

      $('.dataTable').DataTable();
      setInterval(function(){
        
        $('.previous a').html('<i class="bi bi-skip-backward"></i>');
      $('.next a').html('<i class="bi bi-skip-forward"></i>');
      },500);
    
</script>
@endsection