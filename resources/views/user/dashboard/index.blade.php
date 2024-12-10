@extends('layouts.user')

@section('title', 'Dashboard KPPS')

@section('content')
        <!-- Info Box Hasil Pemilihan -->
        <div class="col-md-6 col-lg-4">
            <div class="info-box bg-info">
                <span class="info-box-icon"><i class="far fa-file-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Hasil Pemilihan</span>
                    <span class="info-box-number">{{ $hasilPemilihanCount }}</span>
                </div>
            </div>
        </div>

        <!-- Info Box Hasil Pemilihan Terverifikasi -->
        <div class="col-md-6 col-lg-4">
            <div class="info-box bg-success">
                <span class="info-box-icon"><i class="far fa-check-circle"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Hasil Pemilihan Terverifikasi</span>
                    <span class="info-box-number">{{ $hasilPemilihanTerverifikasiCount }}</span>
                </div>
            </div>
        </div>

        <!-- Info Box Informasi TPS -->
        <div class="col-md-12">
            <div class="info-box bg-warning">
                <span class="info-box-icon"><i class="fas fa-info-circle"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Informasi TPS</span>
                    <div>
                        @if($tps)
                            <p><strong>Nama TPS:</strong> {{ $tps->name }}</p>
                            <p><strong>Kode TPS:</strong> {{ $tps->code }}</p>
                            <p><strong>RT:</strong> {{ $tps->rt }}</p>
                            <p><strong>RW:</strong> {{ $tps->rw }}</p>
                            <p><strong>Kelurahan:</strong> {{ $tps->kelurahan }}</p>
                            <p><strong>Kecamatan:</strong> {{ $tps->kecamatan }}</p>
                            <p><strong>Kota/Kabupaten:</strong> {{ $tps->kota_kabupaten }}</p>
                            <p><strong>Provinsi:</strong> {{ $tps->provinsi }}</p>
                        @else
                            <p>TPS tidak ditemukan untuk pengguna ini.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('styles')
<style>
    .info-box {
        height: 100%; 
        display: flex;
        align-items: center;
    }
    .info-box-icon {
        width: 80px;
        height: 80px;
        font-size: 2rem;
    }
    .info-box-content {
        padding: 10px;
    }
    .info-box-number {
        font-size: 1.5rem;
    }
    .info-box-text {
        font-size: 1rem;
    }
</style>
@endpush
