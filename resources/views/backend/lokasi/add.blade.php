
@extends('layout.app')
@section('title') {{  "Form Lokasi" }} @endsection
@section('isi')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Lokasi</h1>
        </div>
        <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Form Lokasi</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('lokasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        Nama Lokasi : <input type="text" class="form-control @error('nama_lokasi') is-invalid @enderror" name="nama_lokasi" value="{{ old('nama_lokasi') }}" placeholder="Masukkan Nama Lokasi">
                        <!-- error message untuk title -->
                        @error('nama_lokasi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        <div id="MapLocation" style="height: 400px"></div>
                        <text-area id = "lng"></text-area>
                        <br>
                        Latitude : <input type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{ old('latitude') }}" id="Latitude" placeholder="Latitude">
                        <!-- error message untuk title -->
                        @error('latitude')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        Longitude : <input type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{ old('longitude') }}" id="Longitude" placeholder="Longitude">
                        <!-- error message untuk title -->
                        @error('longitude')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        Gambar
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                           name="gambar"  value="">
                                    @error('gambar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                        Diskripsi : <textarea name="diskripsi" class="form-control  @error('diskripsi') is-invalid @enderror" cols="30" rows="10"></textarea>
                        <!-- error message untuk title -->
                        @error('diskripsi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        Kategori:
                        <select name="id_kategori" class="form-control">
                        @forelse ($kategori as $row)
                                <option value="{{ $row->id }}">{{ $row->kategori }}</option>
                        @empty
                            <option value="">Data tidak ada</option>
                        @endforelse
                        </select>
                        <!-- error message untuk title -->
                        @error('id_kategori')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        Icon : <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{ old('icon') }}" placeholder="Icon Kategori">
                        <!-- error message untuk title -->
                        @error('icon')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                         <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>
</div>
<link rel="stylesheet" href="https://npmcdn.com/leaflet@0.7.7/dist/leaflet.css">
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://npmcdn.com/leaflet@0.7.7/dist/leaflet.js"></script>
    <script>
        $(function() {
// use below if you want to specify the path for leaflet's images
//L.Icon.Default.imagePath = '@Url.Content("~/Content/img/leaflet")';

var curLocation = [0, 0];
// use below if you have a model
// var curLocation = [@Model.Location.Latitude, @Model.Location.Longitude];

if (curLocation[0] == 0 && curLocation[1] == 0) {
curLocation = [{{ $pengaturan->latitude }},{{ $pengaturan->longitude }}];
}

var map = L.map('MapLocation').setView(curLocation, {{ $pengaturan->zoom }});

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

map.attributionControl.setPrefix(false);
map.options.minZoom = 9;
map.options.maxZoom = 20;
var marker = new L.marker(curLocation, {
draggable: 'true'
});

marker.on('dragend', function(event) {
var position = marker.getLatLng();
marker.setLatLng(position, {
  draggable: 'true'
}).bindPopup(position).update();
$("#Latitude").val(position.lat);
$("#Longitude").val(position.lng).keyup();
});

$("#Latitude, #Longitude").change(function() {
var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
marker.setLatLng(position, {
  draggable: 'true'
}).bindPopup(position).update();
map.panTo(position);
});

map.addLayer(marker);
})
    </script>
@endsection


