@extends('layouts.user')


@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Hasil Pemilihan</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Pemeriksa</th>
                        <th>Jenis Pemeriksa</th>
                        <th>Jenis Saksi</th>
                        <th>Nama Kandidat</th>
                        <th>Hasil Pemilihan (Foto)</th>
                        <th>Waktu Unggah</th>
                        <th>Status</th> <!-- Kolom status verifikasi -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasilPemilihan as $item)
                        <tr>
                            <td>{{ $item->saksi->nama ?? '-' }}</td>
                            <td>{{ $item->saksi->jenis_pemeriksa ?? '-' }}</td>
                            <td>{{ $item->saksi->jenis_saksi ?? '-'}}</td>
                            <td>{{ $item->saksi->nama_pasang_kandidat ?? '-'}}</td>
                            <td>
                                <img src="{{ asset('uploads/hasil_pemilihan/' . $item->file_name) }}" alt="Hasil Pemilihan" width="100">
                            </td>
                            <td>{{ $item->created_at ?? '-'}}</td>
                            <td>
                                @if ($item->status === 'terverifikasi')
                                    <span class="badge badge-success">Terverifikasi</span>
                                @else
                                    <span class="badge badge-warning">Belum Diverifikasi</span>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
