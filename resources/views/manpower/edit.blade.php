@extends('layout.template')
<!-- START FORM -->
@section('konten')

<style>
    .btn-custom-red {
      background-color: #ff0000; /* Merah */
      border-color: #ff0000;
    }
  </style>
<form action='{{url('mp/'.$data->noreg)}}' method='post'>
{{-- <form  method='post'> --}}
@csrf 
@method('PUT')   
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="noreg" class="col-sm-2 col-form-label">Noreg</label>
            <div class="col-sm-10">
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
               {{$data->noreg}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value="{{$data->name}}" id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='jabatan' value="{{$data->jabatan}}" id="jabatan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jabatan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10 text-end">
                
                <a href='{{url('mp')}}' class="btn btn-primary btn-custom-red" name="back"><i class="fa fa-backward" aria-hidden="true"></i> BACK</a>
                <button type="submit" class="btn btn-success " name="submit">SIMPAN <i class="fa fa-bookmark" aria-hidden="true"> </i></button>
                
            </div>
            
        </div>
        
    </div>
</form>

<!-- AKHIR FORM -->
       
@endsection
