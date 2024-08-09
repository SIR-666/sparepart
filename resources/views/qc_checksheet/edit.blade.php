{{-- @extends('layout.template')
<!-- START FORM -->
@section('konten')

<style>
    .btn-custom-red {
      background-color: #ff0000; /* Merah */
      border-color: #ff0000;
    }
  </style> --}}
<form action='#' method='post' id="form-edit">
{{-- <form  method='post'> --}}
    @csrf 
    @method('PUT')   
    {{-- <div class="my-3 p-3 bg-body rounded shadow-sm"> --}}
        <div class="mb-3 row align-items-center">
            <label for="product_name" class="col-sm-2 col-form-label text-end">Nama Product</label>
            <div class="col-sm-10" style="font-weight: bold;">
                <input type="text" class="form-control" name='product_name' value="" id="edit_product_name" disabled>
            </div>
        </div>
        

        <div class="mb-3 row">
            <label for="no_ladle" class="col-sm-2 col-form-label text-end">No Ladle</label>
            <div class="col-sm-1">
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                <input type="number" class="form-control" name='no_ladle' value="" id="edit_no_ladle">
            </div>
            <label for="material" class="col-sm-1 col-form-label text-end">Material</label>
            <div class="col-sm-2">
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
            <input type="text" class="form-control" name='material' value="" id="edit_material">
            </div>
            <label for="charging" class="col-sm-1 col-form-label text-end">Charging</label>
            <div class="col-sm-1">
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
            <input type="number" class="form-control" name='charging' value="" id="edit_charging">
            </div>
            
        </div>
        <div class="mb-3 row">
        </div>

        <div class="mb-3 row">
            <label for="temp_tapping" class="col-sm-2 col-form-label text-end">Temp. Tapping</label>
            <div class="col-sm-2">
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                <input type="number" type="any" class="form-control" name='temp_tapping' value="" id="edit_temp_tapping">
            </div>
            <label for="start_tapping" class="col-sm-2 col-form-label text-end">Start Tapping</label>
            <div class="col-sm-2">
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                <input type="time" class="form-control" name="start_tapping" value="" id="edit_start_tapping">
            </div>
            <label for="reaction_time" class="col-sm-2 col-form-label text-end">Reactime Time</label>
            <div class="col-sm-2">
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                <input type="number" step="any" class="form-control" name='reaction_time' value="" id="edit_reaction_time">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="start_pouring" class="col-sm-2 col-form-label text-end">Start Pouring</label>
            <div class="col-sm-2">
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                <input type="time" class="form-control" name='start_pouring' value="" id="edit_start_pouring">
            </div>
            <label for="temp_start_pouring" class="col-sm-2 col-form-label text-end">Temp Start Pouring</label>
            <div class="col-sm-2">
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                <input type="number" class="form-control" name='temp_start_pouring' value="" id="edit_temp_start_pouring">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="time_pouring_n1" class="col-sm-2 col-form-label text-end">Time Pouring N1</label>
            <div class="col-sm-2">
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                <input type="time" class="form-control" name='time_pouring_n1' value="" id="edit_time_pouring_n1">
            </div>
            <label for="time_pouring_n2" class="col-sm-2 col-form-label text-end">Time Pouring N2</label>
            <div class="col-sm-2">
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                <input type="time" class="form-control" name='time_pouring_n2' value="" id="edit_time_pouring_n2">
            </div>
            <label for="time_pouring_n3" class="col-sm-2 col-form-label text-end">Time Pouring N3</label>
            <div class="col-sm-2">
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                <input type="time" class="form-control" name='time_pouring_n3' value="" id="edit_time_pouring_n3">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="finish_pouring" class="col-sm-2 col-form-label text-end">Time Finish Pouring</label>
            <div class="col-sm-2">
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                <input type="time" class="form-control" name='finish_pouring' value="" id="edit_finish_pouring">
            </div>
            <label for="temp_finish_pouring" class="col-sm-2 col-form-label text-end">Temp. Finish Pouring</label>
            <div class="col-sm-2">
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                <input type="number" type="any" class="form-control" name='temp_finish_pouring' value="" id="edit_temp_finish_pouring">
            </div>
            <label for="qty_mould" class="col-sm-2 col-form-label text-end">Qty Mould</label>
            <div class="col-sm-2">
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                <input type="number" class="form-control" name='qty_mould' value="" id="edit_qty_mould">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="fading_time" class="col-sm-2 col-form-label text-end">Fading Time</label>
            <div class="col-sm-2">
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                <input type="number" class="form-control" name='fading_time' value="" id="edit_fading_time">
            </div>
            <label for="defect_short" class="col-sm-2 col-form-label text-end">Defect Short Pouring</label>
            <div class="col-sm-2">
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                <input type="number" class="form-control" name='defect_short' value="" id="edit_defect_short">
            </div>
            <label for="mold_bocor" class="col-sm-2 col-form-label text-end">Defect Mold Bocor</label>
            <div class="col-sm-2">
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                <input type="number" class="form-control" name='mold_bocor' value="" id="edit_mold_bocor">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="marubo" class="col-sm-2 col-form-label text-end">Marubo Type</label>
            <div class="col-sm-2">
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                <input type="text" class="form-control" name='marubo' value="" id="edit_marubo">
            </div>
            <label for="frm" class="col-sm-2 col-form-label text-end">FRM/LDR Check</label>
            <div class="col-sm-2">
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                <input type="text" type="any" class="form-control" name='frm' value="" id="edit_frm">
            </div>
            <label for="remark" class="col-sm-2 col-form-label text-end">Remark</label>
            <div class="col-sm-2">
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                <input type="text" class="form-control" name='remark' value="" id="edit_remark">
            </div>
        </div>

    
        <div class="mb-3 row">
        </div>
        <div class="mb-3 row">
        </div>
        <div class="mb-3 row">
            <label for="jabatan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10 text-end">
                
                {{-- <a href='{{url('cs')}}' class="btn btn-primary btn-custom-red" name="back"><i class="fa fa-backward" aria-hidden="true"></i> BACK</a> --}}
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success " name="submit">SIMPAN <i class="fa fa-bookmark" aria-hidden="true"> </i></button>
                
            </div>
            
        </div>

        {{-- <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="formModalLabel">Edit Product</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action='{{url('cs/'.$data->product_name)}}' method='post'>
                    @csrf 
                    @method('PUT')
                    <!-- Your form content goes here -->
                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                      <!-- Form fields here -->
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div> --}}
  
    
    {{-- </div> --}}
</form>

<!-- AKHIR FORM -->
       
{{-- @endsection --}}
