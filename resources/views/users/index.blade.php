@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
               
   <h2 class="mb-2">Settings</h2>
      <!-- Table -->
       <div class="row">

        <div class="col-12">
          <div style=" padding: 10px; " class="card shadow">
            <div class="card-header border-0">
              <h4 class="mb-0">Users</h4>
              <br>
            </div>
            <div class="table-responsive" style=" min-height: 400px; ">
              <table class="table align-items-center table-flush dataTable">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        
                      </tr>
                    </thead>
                    <tbody>
               
                      @foreach ($users as $user)
                      
                      <tr>
                        <th scope="row">
                          <div class="d-flex px-2 py-1">
                            <a href="{{route('profile',$user->id)}}" class="avatar rounded-circle mr-3">
                              <img class="img-icon" alt="Image placeholder" src="{{$user->photo ? asset('storage/' . $user->photo) : 'https://cdn.iconscout.com/icon/free/png-256/laptop-user-1-1179329.png'}}">
                            </a>
                            <div class="d-flex flex-column justify-content-center">
                              <a href="{{route('profile',$user->id)}}" class="mb-0 text-sm">{{$user->name}}</a>
                            </div>
                          </div>
                        </th>
                    
                        <td>
                          <div class="avatar-group">
                               {{$user->job_title}}
                          </div>
                        </td>
                        <td>
                            <span class="badge bg-{{$user->status == 1 ? 'success' : 'warning'}} mr-4">
                              <i class="bi bi-"></i> {{$user->status == null ? 'pendding' : 'approved'}}
                            </span>
                          </td>
                      </tr>
                      @endforeach
       

                      


                </tbody>
              </table>
            </div>
 
          </div>
        </div>





      </div>
   
   
 
   
        </div>
    </div>
</div>



@endsection


@section('scripts')
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js" integrity="sha512-h9kKZlwV1xrIcr2LwAPZhjlkx+x62mNwuQK5PAu9d3D+JXMNlGx8akZbqpXvp0vA54rz+DrqYVrzUGDMhwKmwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>

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