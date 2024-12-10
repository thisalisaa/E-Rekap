@extends('layouts.admin')

@section('header-title', 'Daftar Hasil Pemilihan')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Hasil Pemilihan</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pemeriksa</th>
                        <th>Jenis Pemeriksa</th>
                        <th>Jenis Saksi</th>
                        <th>Nama Kandidat</th>
                        <th>Hasil Pemilihan (Foto)</th>
                        <th>Waktu Unggah</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasilPemilihan as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->saksi->nama }}</td>
                            <td>{{ $item->saksi->jenis_pemeriksa }}</td>
                            <td>{{ $item->saksi->jenis_saksi }}</td>
                            <td>{{ $item->saksi->nama_pasang_kandidat }}</td>
                            <td>
                                <img src="{{ asset('uploads/hasil_pemilihan/' . $item->file_name) }}" alt="Hasil Pemilihan" width="100">
                            </td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ ucfirst($item->status) }}</td> <!-- Menampilkan status -->
                            <td>
                                @if($item->status === 'belum')
                                    <a href="{{ route('admin.hasil_pemilihan.verifikasi', $item->id) }}" class="btn btn-success btn-sm">Verifikasi</a>
                                @else
                                    <span class="badge badge-success">Terverifikasi</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
