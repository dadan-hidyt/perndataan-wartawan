@extends('backend.app')
@section('content')
<div class="container">
    <div class="page-title">
        <h1>REKAP</h1>
    </div>
    <hr>
    <div class="col-md-12 shadow-sm p-4">
       <div class="container">

           <form action="{{route('admin.rekap.export_excel')}}">
               <div class="form-group mb-6">
                   <label for="wartawan">Wartawan</label>
                   <select name="kode" id="" class="form-control">
                        @if(count($wartawan) > 0)
                        @foreach($wartawan as $wr)
                               <option value="{{$wr->kode}}" id="">{{$wr->nama}} | {{$wr->nama_wilayah}}</option>
                        @endforeach
                       @endif
                   </select>

                   <div class="form-group mt-3">
                       <label for="tanggal">Tanggal</label>
                       <div class="row mt-2">
                           <div class="col-md-2">
                               <label  for="inline-form-username">Dari</label>
                               <input type="date" class="form-control" name="dari" placeholder="Username">
                           </div>
                           <div class="col-md-2">
                               <label  for="inline-form-password">Sampe</label>
                               <input type="date" class="form-control" name="sampe" placeholder="Password">
                           </div>
                       </div>
                   </div>
                  <button class="btn btn-primary mt-4" type="submit">REKAP</button>
           </form>

       </div>
    </div>
</div>
@endsection

@section('jsbottom')
    @parent
    <script src="{{asset('assets/vendor/datatables/datatables.min.js')}}"></script>
    <script>
        // Initiate datatables in roles, tables, users page
        (function() {
            'use strict';

            $('#wartawan').DataTable({
                responsive: false,
                lengthChange: true,
                searching: true,
                ordering: true
            });
        })()
    </script>
@endsection

