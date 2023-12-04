@extends('layout.app')
@section('title') {{  "Data Lokasi" }} @endsection
@section('isi')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Lokasi</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/lokasi">Kategori</a></div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Lokasi </h2>
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Lokasi</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                            <th>No</th>
                            <th>Nama Lokasi</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Gambar</th>
                            <th>Kategori</th>
                            <th>Icon</th>
                            <th><a href="{{route('lokasi.create')}}" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Data</a> </th>
                        </tr>
                        @forelse ($lokasi as $row )
                        <tr>
                            <td>{{$nomor++}}</td>
                            <td>{{$row->nama_lokasi}}</td>
                            <td>{{$row->latitude}}</td>
                            <td>{{$row->longitude}}</td>
                            <td>{{$row->gambar}}</td>
                            <td>{{$row->id_kategori}}</td>
                            <td><i class="{{$row->icon}}"></i></td>
                            <td><a href="#" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger"><i class="fa fa-f3 fa-trash"></i></a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Data Belum Ada</td>
                        </tr>
                    @endforelse
                      </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        {{ $lokasi->links() }}
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>
</div>
<script>
    //message with toastr
    @if(session()->has('success'))

        toastr.success('{{ session('success') }}', 'BERHASIL!');

    @elseif(session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!');

    @endif
</script>
@endsection