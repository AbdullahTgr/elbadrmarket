<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
          <form action="{{route('editprds')}}" method="post">
             @csrf
             Products Description Under Head Line 
             <textarea class="form-control" name="sec1" style="width: 100%">{{ $setups[12]->sec1 }}</textarea> 
          تفاصيل جذئ الخدمات
             <textarea class="form-control" name="sec1_ar" style="width: 100%">{{ $setups[12]->sec1_ar }}</textarea> 
             
              
              <input class="form-control" type="submit" value="Edit"> 
         </form>
    </div>
    <div class="modal-body">
    </div>
  </div>
</div>
