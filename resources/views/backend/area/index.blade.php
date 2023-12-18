@extends('layout.app')
@section('title') {{  "Data Area" }} @endsection
@section('isi')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Area</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/area">Area</a></div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Area</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                            <th>No</th>
                            <th>Nama Area</th>
                            <th>Data</th>
                            <th>Keterangan</th>
                            <th><a href="{{route('area.create')}}" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Data</a> </th>
                        </tr>
                        @forelse ($areas as $row )
                        <tr>
                            <td>{{$nomor++}}</td>
                            <td>{{$row->nama_area}}</td>
                            <td>{{$row->data}}</td>
                            <td>{{$row->ket}}</td>
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
                        {{ $areas->links() }}
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

