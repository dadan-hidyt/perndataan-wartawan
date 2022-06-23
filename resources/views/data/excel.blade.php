<table style="width: 100%;border:1px solid red;text-align: center">
   <tr>
       <th style="font-size: 20px" colspan="5"><h1>Rekap {{$wartawan[0]->nama}}</h1></th>
   </tr>
   <tr>
       <th style="text-align: left;padding: 10px;" colspan="5">Nama:{{$wartawan[0]->nama}}</th>
   </tr>
   <tr>
       <th style="text-align: left;padding: 10px;" colspan="5">Wilayah:{{$wartawan[0]->nama_wilayah}}</th>
   </tr>
        <tr style="height: 40px">
            <th>ID</th>
            <th>JUDUL</th>
            <th>TANGGAL</th>
            <th>LINK</th>
            <th>HONOR</th>
        </tr>

    @if(count($berita) > 0)
        @php
            $id = 0;
            $jmlh = 0;
        @endphp
        @foreach($berita as $berit)
            @php($id++)
            @php($jmlh += $berit->honor)
            <tr >
                <td>{{$id}}</td>
                <td >{{$berit->judul_berita}}</td>
                <td >{{$berit->tanggal_submit}}</td>
                <td >{{$berit->link_berita}}</td>
                <td >{{$berit->honor}}</td>
            </tr>
        @endforeach
    @endif
    <tr>
        <td style="text-align: left" colspan="5">Total Berita: {{count($berita)}}</td>
    </tr>
    <tr>
       <td style="text-align: left" colspan="5">Total Honor: Rp. {{number_format($jmlh,0,'','.')}}</td>
    </tr>

</table>
