@extends('backend.app')

@section("content")
   <div class="container">
       <div class="page-title">
           <h3>DATA BERITA</h3>
       </div>
       <!-- tabel untuk halaman tampil berita -->
       <div class="col-md-12">
           @if(session()->has('messages'))
            <p class="alert alert-info">{{session()->get('messages')}}</p>
           @endif
           <!-- bagian button -->
           <div class="col-md-7 mb-3">
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-berita-modal">Tambah data</button>
            <a href="" class="btn btn-sm btn-warning">Rekap</a>
           </div>
               <div class="edited"></div>
           <hr>
           <!-- bagian tabel -->
           <div class="table-responsive bg-white p-3">
               <table id="tabel-berita" style="width:1700px" class="table text-center table-bordered table-striped">
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
                               <td>{{$berita->nama}} - {{$berita->nama_wilayah}}</td>
                               <td>{{date("d-M-Y", strtotime($berita->tanggal_submit))}}</td>
                               <td>Rp. {{number_format($berita->honor,0,'','.')}}</td>
                               <td>
                                   <a id="edit" data-id="{{$berita->id_berita}}" class="text-secondary" href="javascript:void(0)"><i class="fa fa-edit fa-2x"></i></a>
                                   &nbsp;
                                   <a onclick="return confirm('apakah anda yakin ingin menghapus data ini?')" class="text-danger" href="{{route('admin.berita.delete', $berita->id_berita)}}"><i class="fa fa-trash fa-2x"></i></a>
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
   <!-- modal untuk tambah data berita -->
 <div class="modal fade" id="tambah-berita-modal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">TAMBAH DATA BERITA</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start">
                        <form accept-charset="utf-8" method="POST" action="{{route('admin.berita.post_tambah_berita')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="kode" class="form-label">Nama Wartawan</label>
                                <select name="kode" id="kode" class="form-control">
                                    <option value="">--Pilih nama wartawan--</option>
                                    @if(count($data_wartawan) > 0)
                                        @foreach($data_wartawan as $wartawan)
                                            <option value="{{$wartawan->kode}}">{{$wartawan->nama}} - {{$wartawan->nama_wilayah}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                             <div class="mb-3">
                                <label for="judul" class="form-label">Judul Berita</label>
                                <input required type="text" name="judul_berita" placeholder="Ketikan judul berita" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="Tanggal" class="form-label">Tanggal Submit</label>
                                <input required type="date" name="tanggal_submit" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="link" class="form-label">Link Berita</label>
                                <input required type="text" name="link_berita" placeholder="https://sitename.com/judul-berita-disini" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="honor" class="form-label">honor</label>
                                <input required disabled type="number" name="honor" placeholder="Honor berita sudah di tentukan" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
   <!-- modal untuk edit berita -->
      @endsection
      @section('jsbottom')
          @parent
          <script src="{{asset('assets/vendor/datatables/datatables.min.js')}}"></script>
          <script>
              // Initiate datatables in roles, tables, users page
             $(window).on('load', function () {
                 (function() {
                     'use strict';
                     $('#tabel-berita').DataTable({
                         responsive: false,
                         lengthChange: true,
                         searching: true,
                         ordering: true
                     });
                     const edit_action = function () {
                         const edit_btn = document.querySelectorAll("#edit");
                         edit_btn.forEach(function (e) {
                             e.onclick = function (ev) {
                                 ev.target.classList.remove('fa-edit')
                                 ev.target.classList.add('fa-spinner')
                                 ev.target.classList.add('fa-spin')

                                 $.ajax({
                                     url:"{{url('/admin/berita/edit')}}/"+e.getAttribute('data-id'),
                                     type:"GET",
                                     success:function (e) {
                                         ev.target.classList.remove('fa-spinner');
                                         ev.target.classList.add('fa-edit');
                                         ev.target.classList.remove('fa-spin');
                                        $(".edited").html(e);
                                     }
                                 })
                             }
                         })

                     }
                     edit_action();


                 })();
             });
             //function for edit data

          </script>
      @endsection
