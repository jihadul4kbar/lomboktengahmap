
@extends('layout.app')
@section('title') {{  "Form Kategori" }} @endsection
@section('isi')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kategori</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Components</a></div>
              <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Kategori </h2>
            <p class="section-lead">Kategori peta</p>

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Form Kategori</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf
                        Kategori : <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{ old('kategori') }}" placeholder="Masukkan Kategori">

                        <!-- error message untuk title -->
                        @error('kategori')
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
                        Paren Kategori:
                        <select name="parent_id" class="form-control">
                        @forelse ($paren as $row)
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


