@extends('layouts.app')

@section('content')

<?php

    $role = Auth::user()->role;
    $myid = Auth::user()->id;

?>
<style>
  .card {
    height: 95%;
  }
</style>
<div class="container">
    <div class="row">
        <h2 class="mb-2">تغيير الصور </h2>

        <input type="hidden" value="" class="full_img">
        <input type="hidden" value="" class="imgdest">
        <input type="hidden" value="" class="fullimg">

        <label for="itf" class="imgl col-6">
          <div class="pic">
            <img src="img/breadcrumb.jpg" class="img-fluid base64data" alt="">
          </div>
         </label>  
         <label for="itf" class="imgl col-6">
           <div class="pic">
             <img src="img/hero/banner.jpg" class="img-fluid base64data" alt="">
           </div>
          </label>

          <label for="itf" class="imgl col-6">
            <div class="pic">
              <img src=" img/banner/banner-1.jpg " class="img-fluid base64data" alt="">
            </div>
           </label>
           <label for="itf" class="imgl col-6">
             <div class="pic">
               <img src=" img/banner/banner-2.jpg " class="img-fluid base64data" alt="">
             </div>
            </label>
          
        



      </div>
</div>



@include('panars.imgcrop') 
@endsection


@section('scripts')
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js" integrity="sha512-h9kKZlwV1xrIcr2LwAPZhjlkx+x62mNwuQK5PAu9d3D+JXMNlGx8akZbqpXvp0vA54rz+DrqYVrzUGDMhwKmwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('da/js/tasks.js')}}"></script>
<script>
   
</script>
@endsection


