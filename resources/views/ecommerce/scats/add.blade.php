<div class="modal fade" id="addscat" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
          <form action="{{route('addscat')}}" method="post">
             @csrf
            <label for="itf" class="imgl  ">
              Change Image
              <div class="align-items-center justify-content-center" style="width: 100px">
                    <img src="{{ public_path('port_imgs/1.png') }}" alt="Select Img" class="img-fluid" alt="">
                    <input type="hidden" value="" class="imgport_upload" name="img">
                  </div>
            </label>
            
             <textarea class="form-control sec1" name="sec1" style="width: 100%"></textarea> 
             <textarea class="form-control sec2" name="sec2" style="width: 100%"></textarea> 
             <textarea class="form-control sec3" name="sec3" style="width: 100%"></textarea> 
             <textarea class="form-control sec4" name="sec4" style="width: 100%"></textarea> 
             
             
              <input class="form-control" type="submit" value="Add"> 
         </form>
    </div>
    <div class="modal-body">
    </div>
  </div>
</div>
