@extends('layouts.user')

@section('header-title', 'Upload Hasil Pemilihan')

@section('content')
    <div class="container">
        <form action="{{ route('user.hasil_pemilihan.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="saksi_id" value="{{ $saksi->id }}">
            <div class="form-group">
                <label for="hasil_pemilihan_file">Pilih File</label>
                <input type="file" name="hasil_pemilihan_file" id="hasil_pemilihan_file" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
@endsection
