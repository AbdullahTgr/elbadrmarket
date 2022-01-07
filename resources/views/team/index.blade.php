@extends('layouts.app')

@section('content')
    <!-- ======= Team Section ======= -->
<input type="hidden" value="" class="img_dest">
    <input type="hidden" value="" class="full_img">
    <input type="hidden" value="" class="imgdest">
    <input type="hidden" value="" class="fullimg">
    <section id="team" class="team section-bg">


      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Team</h2>
        </div>
        <div class="row">
<label for="it_f" class="img_l col-lg-2 col-md-4 col-6 d-flex btn btn-primary">
  Add Team Member

  <div class="align-items-center justify-content-center">
       <img src="" style="display: none" class="img-fluid base64data_" alt="">
     </div>
   
</label>
        </div>
        <div class="row">
@forelse ($team as $team)
<div class="col-lg-6" style="margin-top:15px;">
  <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
  <label for="itf" class="imgl ">
    <div class="pic">
      <img src="{{ $team->sec9 }}" class="img-fluid base64data" alt="">
    </div>
      </label> 
    <div class="member-info">
      <h4>{{ $team->sec2 }}</h4>
      <span>{{ $team->sec3 }}</span>
      <p>{{ $team->sec4 }}</p>
      <div class="social">
        <a target="_blank" href="{{ $team->sec5 }}"><i class="ri-twitter-fill"></i></a>
        <a target="_blank" href="{{ $team->sec6 }}"><i class="ri-facebook-fill"></i></a>
        <a target="_blank" href="{{ $team->sec7 }}"><i class="ri-instagram-fill"></i></a>
        <a target="_blank" href="{{ $team->sec8 }}"> <i class="ri-linkedin-box-fill"></i> </a>
      </div>
    </div>
  </div>
  <a style="margin-top:15px;"   data-toggle="modal" data-target="#editteam" class="editteam btn btn-success btn-get-started scrollto">
              
    <input class="id" type="hidden" value="{{ $team->id }}">
    <input class="sec2" type="hidden" value="{{ $team->sec2 }}">
    <input class="sec3" type="hidden" value="{{ $team->sec3 }}">
    <input class="sec4" type="hidden" value="{{ $team->sec4 }}">
    <input class="sec2_ar" type="hidden" value="{{ $team->sec2_ar }}">
    <input class="sec3_ar" type="hidden" value="{{ $team->sec3_ar }}">
    <input class="sec4_ar" type="hidden" value="{{ $team->sec4_ar }}">
    <input class="sec5" type="hidden" value="{{ $team->sec5 }}">
    <input class="sec6" type="hidden" value="{{ $team->sec6 }}">
    <input class="sec7" type="hidden" value="{{ $team->sec7 }}">
    <input class="sec8" type="hidden" value="{{ $team->sec8 }}">
    Edit
</a>
<a style="margin-top:15px;"   data-toggle="modal" data-target="#dele" class="del btn btn-danger btn-get-started scrollto"><input class="id" type="hidden" value="{{ $team->id }}">Delete</a>

</div> 
@empty
    No Team Founded Yet
@endforelse
         

        </div>

      </div>
    </section><!-- End Team Section -->

@include('team.delete')
@include('team.edit')
@include('team.add')

@include('imgcrop')
@include('imgcrop_upload_team')



@endsection


@section('scripts')
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js" integrity="sha512-h9kKZlwV1xrIcr2LwAPZhjlkx+x62mNwuQK5PAu9d3D+JXMNlGx8akZbqpXvp0vA54rz+DrqYVrzUGDMhwKmwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
<script type="text/javascript" src="{{asset('js/tasks.js')}}"></script>
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