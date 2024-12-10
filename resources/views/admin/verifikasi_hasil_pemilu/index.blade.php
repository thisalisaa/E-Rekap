@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Verifikasi Hasil Pemilu</h3>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>TPS</th>
                        <th>Jumlah Suara</th>
                        <th>Foto Hasil</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hasilPemilu as $hasil)
                        <tr>
                            <td>{{ $hasil->tps->name }}</td>
                            <td>{{ $hasil->jumlah_suara }}</td>
                            <td>
                                @if($hasil->foto_hasil)
                                    <img src="{{ asset('storage/' . $hasil->foto_hasil) }}" alt="Foto Hasil" width="100">
                                @else
                                    Tidak ada foto
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('verifikasi.hasil_pemilu', $hasil->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Verifikasi</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
