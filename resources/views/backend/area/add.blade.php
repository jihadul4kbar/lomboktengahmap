
@extends('layout.app')
@section('title') {{  "Form Area" }} @endsection
@section('isi')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Area</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Components</a></div>
              <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Form Area</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('area.store') }}" method="POST">
                        @csrf
                        Nama Area : <input type="text" class="form-control @error('nama_area') is-invalid @enderror" name="nama_area" value="{{ old('nama_area') }}" placeholder="Masukkan Nama Area">

                        <!-- pesan error untuk katagori -->
                        @error('nama_area')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        Data : <textarea name="data" class="form-control @error('data') is-invalid @enderror" cols="30" rows="10" placeholder="Data JSON Area"></textarea>
                        <!-- pesan error untuk icon -->
                        @error('data')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        Keterangan : <input type="text" class="form-control @error('ket') is-invalid @enderror" name="ket" value="{{ old('ket') }}" placeholder="Keterangan Area">

                        <!-- pesan error untuk icon -->
                        @error('ket')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        Paren Kategori:
                        <select name="id_kategori" class="form-control">
                        @if (!$kategori->isEmpty())
                            @foreach ($kategori as $row)
                              <option value="{{ $row->id }}">{{ $row->kategori }}</option>
                            @endforeach
                        @else
                          <option value="0">Umum</option>
                        @endif
                        </select>
                        <!--pesan error untuk paren kategori -->
                        @error('id_kategori')
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


