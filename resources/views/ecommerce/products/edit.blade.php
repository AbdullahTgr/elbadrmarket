<div class="modal fade" id="editproduct" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
          <form action="{{route('editproduct')}}" method="post">
             @csrf
              
             اسم المنتج
             <textarea class="form-control sec2" name="sec2" style="width: 100%"></textarea> 
             
             الوصف
             <textarea class="form-control sec3" name="sec3" style="width: 100%"></textarea> 
             
             الوحدة (قطعة\ كيلوجرام)

             <textarea class="form-control sec4" name="sec4" style="width: 100%"></textarea> 
         
             السعر
             <textarea class="form-control sec5" name="sec5" style="width: 100%"></textarea> 
             الكمية
             <textarea class="form-control sec6" name="sec6" style="width: 100%"></textarea> 
             
             <input type="hidden" value="@if(count($scats)!=0){{ $scats[0]->id }}@endif" id="sec9_ar_ep" class="sec9_ar_ep">
             <select id="mySelect_ep" onchange="myFunction_ep()"  >
                 @forelse ($scats as $scat)
                     <option value="{{ $scat->id }}">{{ $scat->sec2 }}</option>
                 @empty
                 <option value="">لاتوجد فئات فرعية اضف من فضلك  <a href="{{ route('scats') }}"> اضف</a></option>
                     
                 @endforelse
             </select>

              <input  type="hidden" class="modaledel_id" name="modaledel_id" value="0"> 
              <input class="form-control" type="submit" value="تعديل"> 
         </form>
    </div>
    <div class="modal-body">
    </div>
  </div>
</div>
 
<script>
  function myFunction_ep() {
var x = document.getElementById("mySelect_ep").value;
document.getElementById("sec9_ar_ep").value =  x;
}
</script>