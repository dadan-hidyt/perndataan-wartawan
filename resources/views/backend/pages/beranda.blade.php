@extends("backend.app")
@section("title", 'Home')
@section('external-css')
@parent
<style>
    .card{
        border: none;
    }
</style>
@endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="col col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                       <div class="mb-3">
                           <b>Total Wartawan</b>
                       </div>
                        <div class="mb-3">
                            <h2>{{$total_wartawan}}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                            <b>Total Berita</b>
                        </div>
                        <div class="mb-3">
                            <h2>{{$total_berita}}</h2>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
