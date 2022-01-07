<div class="modal fade" id="editmcat" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
          <form action="{{route('editmcat')}}" method="post">
             @csrf
             
    
    Name
    <textarea class="form-control sec2" name="sec2" style="width: 100%"></textarea> 
    
    Position
    <textarea class="form-control sec3" name="sec3" style="width: 100%"></textarea> 
    
    Description
    <textarea class="form-control sec4" name="sec4" style="width: 100%"></textarea> 
    


    الاسم
    <textarea class="form-control sec2_ar" name="sec2_ar" style="width: 100%"></textarea> 
    
    المرتبة
    <textarea class="form-control sec3_ar" name="sec3_ar" style="width: 100%"></textarea> 
    
    تفاصيل
    <textarea class="form-control sec4_ar" name="sec4_ar" style="width: 100%"></textarea> 


    Twitter Link
    <textarea class="form-control sec5" name="sec5" style="width: 100%"></textarea> 
    
    Facebook Link
    <textarea class="form-control sec6" name="sec6" style="width: 100%"></textarea> 
    
    Instgram Link
    <textarea class="form-control sec7" name="sec7" style="width: 100%"></textarea> 
    
    LinkedIn Profile Link
    <textarea class="form-control sec8" name="sec8" style="width: 100%"></textarea> 

              <input  type="hidden" class="modaledel_id" name="modaledel_id" value="0"> 
              <input class="form-control" type="submit" value="Edit"> 
         </form>
    </div>
    <div class="modal-body">
    </div>
  </div>
</div>
