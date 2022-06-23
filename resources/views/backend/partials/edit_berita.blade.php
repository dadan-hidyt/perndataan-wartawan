<div class="form bg-white  shadow-sm p-4">
    <div id="form">
        <div class="container">
                <div class="row">
                    <input type="hidden" id="id" value="{{$data[0]->id_berita}}">
                    <div class="form-group col-md-4">
                        <label for="companyName" class="mr-2 col-form-label">Judul Berita:&nbsp;</label>
                        <input type="text" class="form-control form-control" autocomplete="off" id="judul_berita" id="companyName" value="{{$data[0]->judul_berita}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="version" class="mr-2 col-form-label">Link Berita:&nbsp;</label>
                        <input type="text" class="form-control form-control" autocomplete="off" id="link_berita" id="companyName" value="{{$data[0]->link_berita}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="notes" class="mr-2 col-form-label">Tanggal Submit:&nbsp;</label>
                        <input type="date" class="form-control form-control" autocomplete="off" id="tanggal_submit" id="companyName" value="{{$data[0]->tanggal_submit}}">
                    </div>

                </div>
                <div class="form-group mt-3">
                    <div class="form-group col-lg-12">
                        <button type="button" id="btn" class="btn btn-primary">Edit Data</button>
                    </div>
                </div>
        </div>
    </div>
</div>


<script>
    $(window).ready(function (){
        $('#btn').on('click' ,function (e){
            let judul_berita = $("#judul_berita").val();
            let link_berita = $("#link_berita").val();
            let tanggal_submit = $("#tanggal_submit").val()
            let id = $("#id").val();
            e.target.innerHTML = "Proses...";
            $.ajax({
                url : "{{route('admin.berita.post_edit_berita')}}",
                type : 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    judul_berita : judul_berita,
                    link_berita : link_berita,
                    tanggal_submit : tanggal_submit,
                    id : id
                },
                success:function (es) {
                    console.log(es)
                    if(es.error == 0) {
                        if (confirm(es.message)) {
                            location.reload();
                        } else {
                            location.reload();
                        }
                    } else {
                        alert(es.message);
                    }
                }
            })
        });
    })
</script>
