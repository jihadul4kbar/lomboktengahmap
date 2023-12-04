
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
            <h2 class="section-title">Lokasi </h2>

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Form Lokasi</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('lokasi.store') }}" method="POST">
                        @csrf
                        Nama Lokasi : <input type="text" class="form-control @error('nama_lokasi') is-invalid @enderror" name="nama_lokasi" value="{{ old('nama_lokasi') }}" placeholder="Masukkan Nama Lokasi">
                        <!-- error message untuk title -->
                        @error('nama_lokasi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        Latitude : <input type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{ old('latitude') }}" placeholder="Latitude">
                        <!-- error message untuk title -->
                        @error('latitude')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        Longitude : <input type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{ old('longitude') }}" placeholder="Longitude">
                        <!-- error message untuk title -->
                        @error('longitude')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        Gambar
                        <input type="file" class="form-control @error('name') is-invalid @enderror"
                                           name="logo"  value="">
                                    @error('gambar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                        Icon : <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{ old('icon') }}" placeholder="Icon Kategori">
                        <!-- error message untuk title -->
                        @error('icon')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        Paren Kategori:
                        <select name="parent_id" class="form-control">
                        @forelse ($kategori as $row)
                                <option value="{{ $row->id }}">{{ $row->kategori }}</option>
                        @empty
                            <option value="">Data tidak ada</option>
                        @endforelse
                        </select>
                        <!-- error message untuk title -->
                        @error('parent_id')
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
@endsection


