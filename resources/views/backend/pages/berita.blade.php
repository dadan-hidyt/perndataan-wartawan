@extends('backend.app')

@section("content")
   <div class="container">
       <div class="page-title">
           <h3>DATA BERITA</h3>
       </div>
       <!-- tabel untuk halaman tampil berita -->
       <div class="col-md-12">
           <!-- bagian button -->
           <div class="col-md-7 mb-3">
               <a class="btn btn-sm btn-primary">Tambah Berita</a> &nbsp;
               <a href="" class="btn btn-sm btn-warning">Rekap</a>
           </div>
           <hr>
           <!-- bagian tabel -->
           <div class="table-responsive">
               <table id="tabel-berita" style="width:1700px" class="table text-center table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Judul Berita</th>
                        <th>link_berita</th>
                        <th>Wartawan</th>
                        <th>tanggal_submit</th>
                        <th>Honor</th>
                        <th>Action</th>
                    </tr>
                </thead>
                   <tbody>
                   @if(count($data_berita) > 0)
                       @foreach($data_berita as $berita)
                           <tr>
                               <td>{{$berita->judul_berita}}</td>
                               <td><a target="__blank" title="{{$berita->link_berita}}" href="{{$berita->link_berita}}">Buka Link Berita</a></td>
                               <td>{{$berita->nama}}</td>
                               <td>{{date("d-M-Y", strtotime($berita->tanggal_submit))}}</td>
                               <td>{{$berita->honor}}</td>
                               <td>
                                   <a class="text-secondary" href="{{route("admin.berita.edit", $berita->id_berita)}}"><i class="fa fa-edit fa-2x"></i></a>
                                   &nbsp;
                                   <a class="text-danger" href="{{route("admin.berita.delete", $berita->id_berita)}}"><i class="fa fa-trash fa-2x"></i></a>
                               </td>
                           </tr>
                       @endforeach
                   @else
                    <tr>
                        <td colspan="8">Tidak ada data</td>
                    </tr>
                   @endif
                   </tbody>
               </table>
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

            $('#tabel-berita').DataTable({
                responsive: false,
                lengthChange: true,
                searching: true,
                ordering: true
            });
        })()
    </script>
@endsection
