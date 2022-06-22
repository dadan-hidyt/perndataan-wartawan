@extends('backend.app')

@section('content')
<div class="container">
    <div class="page-title">
        <h3>Data Wilayah</h3>
    </div>
    @if(!empty(session()->has('messages')))
    <p class="alert alert-primary">{{session('messages')}}</p>
    @endif
    <div class="card">
        <div class="card-header">data wilayah</div>
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Wilayah</button>
            <div class="modal fade" id="exampleModal" role="dialog" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Data wilayah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                            <p>Tambah data wilayah</p>
                            <form action="{{route('admin.wilayah.add')}}" method="post" accept-charset="utf-8">
                               @csrf
                                <div class="mb-3">
                                    <label for="namawilayah" class="form-label">Nama wilayah</label>
                                    <input required type="text" name="namawilayah" placeholder="Nama wilayah" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="namawilayah" class="form-label">Situs</label>
                                    <input required type="text" name="situs" value="https://jabar.wahananews.co" placeholder="Nama wilayah" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button name="submit" type="submit" class="btn btn-primary">ADD</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="wilayah" class="table col-md-10 table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama Wilayah</th>
                        <th scope="col">Situs</th>
                        <th scope="col">Handle</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($data_wilayah) > 0)
                        @foreach($data_wilayah as $wlyh)
                            <tr>
                                <td>{{$wlyh['kode_wilayah']}}</td>
                                <td>{{$wlyh['nama_wilayah']}}</td>
                                <td>{{$wlyh['situs']}}</td>
                                <td style="text-align: center">
                                    <a class="btn btn-sm btn-danger" href="{{route('admin.wilayah.delete',$wlyh['kode_wilayah'])}}" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="4">Tidak ada data</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
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

            $('#wilayah').DataTable({
                responsive: false,
                pageLength: 20,
                lengthChange: true,
                searching: true,
                ordering: true
            });
        })()
    </script>
@endsection
