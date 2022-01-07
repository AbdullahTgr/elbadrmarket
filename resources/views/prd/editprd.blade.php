<div class="modal fade" id="editprd" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
          <form action="{{route('editprd')}}" method="post">
             @csrf
             Product Name
             <textarea class="form-control sec2" name="sec2" style="width: 100%"></textarea> 
             Product Description
             <textarea class="form-control sec3" name="sec3" style="width: 100%"></textarea> 
             اسم المنتج
             <textarea class="form-control sec2_ar" name="sec2_ar" style="width: 100%"></textarea> 
             تفاصيل المنتج
             <textarea class="form-control sec3_ar" name="sec3_ar" style="width: 100%"></textarea> 

              <input  type="hidden" class="modaledel_id" name="prd_id" value="0"> 
              <input class="form-control" type="submit" value="Edit"> 
         </form>
    </div>
    <div class="modal-body">
    </div>
  </div>
</div>
