@extends('layout.app')
@section('isi')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pengguna</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/dataPengguna">Pengguna</a></div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Pengguna</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th><a href="{{route('daftar')}}">Tambah Data</a> </th>
                        </tr>
                        @forelse ($pengguna as $row )
                        <tr>
                            <td>{{$nomor++}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
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
                </div>
              </div>
            </div>
        </div>
    </section>
</div>
@endsection

