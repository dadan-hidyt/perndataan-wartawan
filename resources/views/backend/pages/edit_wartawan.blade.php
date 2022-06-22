@extends('backend.app')

@section('content')
    <div class="container">
        <div class="page-title">
            <h3>Edit Data Wartawan</h3>
        </div>
        <!-- halaman edit -->
        <div class="col-md-12 bg-white shadow-sm p-4">
            <form action="{{route('admin.wartawan.post_edit')}}" method="POST">
                @csrf
                <div class="col-md-12 mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" value="{{$data_wartawan[0]->nama}}" class="form-control">
                </div>
                <input type="hidden" name="kode" value="{{$data_wartawan[0]->kode}}">

                <div class="col-md-12 mb-3">
                    <label for="telepon">telepon/wa</label>
                    <input type="text" name="telepon" value="{{$data_wartawan[0]->telepon}}" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="Email">Email</label>
                    <input type="email" name="Email" value="{{$data_wartawan[0]->email}}" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="Email">JK</label>
                    <select class="form-control" name="jk" id="">
                        @php($jk = ['pria','wanita']);
                        @foreach($jk as $jj)
                            @if($data_wartawan[0]->jk === $jj)
                                <option value="{{$jj}}" selected>{{$jj}}</option>
                            @else
                                <option value="{{$jj}}">{{$jj}}</option>

                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="TTL">TTL</label>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="tempat_lahir" class="form-control" value="{{$data_wartawan[0]->tempat_lahir}}" placeholder="Tempat Lahir">
                        </div>
                        <div class="col">
                            <input type="date" value="{{$data_wartawan[0]->tanggal_lahir}}"  name="tanggal_lahir" class="form-control" placeholder="Last name">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="alamat">ALAMAT</label>
                    <textarea name="alamat" cols="30" rows="4" class="form-control">
 {{$data_wartawan[0]->alamat}}
                    </textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="Wilayah">Wilayah</label>
                    <select class="form-control" name="kode_wilayah" id="">
                        <option value="">--WILAYAH--</option>
                        @if(!empty($data_wilayah))
                            @foreach($data_wilayah as $wil)
                                @if($data_wartawan[0]->kode_wilayah == $wil['kode_wilayah'])
                                    <option selected value="{{$wil['kode_wilayah']}}">{{$wil['nama_wilayah']}}</option>
                                @else
                                    <option  value="{{$wil['kode_wilayah']}}">{{$wil['nama_wilayah']}}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-1 mb-4">
                    <button class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
