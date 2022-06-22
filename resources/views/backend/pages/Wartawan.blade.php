@extends('backend.app')
@section('content')
    <style>
        #wartawan_filter .form-control{
           width: 100%;
            border-radius: 0;
            margin-top: 3px;
        }
    </style>
<div class="container">
    <div class="page-title">
        <h3>Wartawan</h3>
    </div>
    <hr>
    <div class="col-md-12 mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-wartawan-modal">Tambah data</button>
    </div>
    @if(session()->has('messages'))
        <p class="alert alert-primary">{{session()->get('messages')}}</p>
    @endif
    <!-- tabel wartawan -->
    <div class="table-responsive">
        <table style="width: 1500px" id="wartawan" class="table text-center table-bordered table-hover mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>KODE</th>
                    <th>Nama</th>
                    <th>TTL</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Jk</th>
                    <th>Alamat</th>
                    <th>Wilayah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @php
            $i = 0
            @endphp
            @if(count($wartawan_data) > 0)
                @foreach($wartawan_data as $data)
                    @php
                    $i++
                    @endphp
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$data->kode}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->tempat_lahir}} , {{date('d-m-Y', strtotime($data->tanggal_lahir))}}</td>
                        <td>{{$data->telepon}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{strtoupper($data->jk)}}</td>
                        <td>
                            @if(strlen($data->alamat) > 15)
                                <div title="{{$data->alamat}}">{{substr($data->alamat,0,15)}}...</div>
                            @else
                                {{$data->alamat}}
                            @endif
                        </td>
                        <td>{{$data->nama_wilayah}}</td>
                        <td>
                            <a href="{{route('admin.wartawan.edit', $data->kode)}}"><i class="fa fa-pen-square fa-2x text-secondary"></i></a> &nbsp;
                            <a onclick="return confirm('Apakah yakin! Ingin menghapus data ini?')" href="{{route('admin.wartawan.delete', $data->kode)}}"><i class="fa fa-trash fa-2x text-danger"></i></a>
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
@endsection
        <div class="modal fade" id="tambah-wartawan-modal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">TAMBAH DATA WARTAWAN</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start">
                        <form accept-charset="utf-8" method="POST" action="{{route('admin.wartawan.post_tambah_wartawan')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input required type="text" name="nama" placeholder="Ketikan nama" class="form-control">
                            </div>
                             <div class="mb-3">
                                <label for="tempatlahir" class="form-label">Tempat Lahir</label>
                                <input required type="text" name="tempat_lahir" placeholder="e.x sumedang" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="Tanggal" class="form-label">Tanggal Lahir</label>
                                <input required type="date" name="tanggal_lahir" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="telwa" class="form-label">Telepon/Wa</label>
                                <input required type="number" name="telepon" placeholder="e.x 62" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input required type="email" name="email" placeholder="ketikan email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="jk">JK</label>
                                <select class="form-control" name="jk" id="jk">
                                    <option value="pria">Pria</option>
                                    <option value="wanita">Wanita</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="wilayah" class="form-label">Wilayah</label>
                                <select required class="form-control" name="kode_wilayah" id="wilayah">
                                    <option value="">--No data--</option>
                                    @if(!empty($wilayah))
                                        @foreach($wilayah as $wlyh)
                                            <option value="{{$wlyh['kode_wilayah']}}">{{$wlyh['nama_wilayah']}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea required name="alamat" id="" cols="20" rows="4" class="form-control"></textarea>
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

