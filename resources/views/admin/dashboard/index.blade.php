@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<!-- Content Header (Page header) -->


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- TPS Box -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-gradient-info">
                    <span class="info-box-icon"><i class="fas fa-map-marker-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah TPS</span>
                        <span class="info-box-number">4</span>
                    </div>
                </div>
            </div>

            <!-- Suara Box -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-gradient-success">
                    <span class="info-box-icon"><i class="fas fa-vote-yea"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Suara</span>
                        <span class="info-box-number">6</span>
                    </div>
                </div>
            </div>

            <!-- KPPS Box -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-gradient-warning">
                    <span class="info-box-icon"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah KPPS</span>
                        <span class="info-box-number">7</span>
                    </div>
                </div>
            </div>

            <!-- Uploaded Results Box -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-gradient-danger">
                    <span class="info-box-icon"><i class="fas fa-upload"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Hasil Unggah</span>
                        <span class="info-box-number">2</span>
                    </div>
                </div>
            </div>

            <!-- Verified Results Box -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-gradient-info">
                    <span class="info-box-icon"><i class="fas fa-check-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Hasil Terverifikasi</span>
                        <span class="info-box-number">1</span>
                    </div>
                </div>
            </div>

            <!-- Pending Results Box -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-gradient-secondary">
                    <span class="info-box-icon"><i class="fas fa-hourglass-half"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Hasil Belum Unggah</span>
                        <span class="info-box-number">5</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
