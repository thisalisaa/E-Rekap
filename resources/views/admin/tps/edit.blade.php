@extends('layouts.admin')

@section('title', 'Edit Data TPS')

@section('content')
<div class="container">
    <h1>Edit TPS</h1>
    <form action="{{ route('admin.tps.update', $tps->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama TPS</label>
            <input type="text" name="name" class="form-control" value="{{ $tps->name }}" required>
        </div>
        <div class="form-group">
            <label for="code">Kode TPS</label>
            <input type="text" name="code" class="form-control" value="{{ $tps->code }}" required>
        </div>
        <div class="form-group">
            <label for="rt">RT</label>
            <input type="text" name="rt" class="form-control" value="{{ $tps->rt }}" required>
        </div>
        <div class="form-group">
            <label for="rw">RW</label>
            <input type="text" name="rw" class="form-control" value="{{ $tps->rw }}" required>
        </div>
        <div class="form-group">
            <label for="kelurahan">Kelurahan</label>
            <input type="text" name="kelurahan" class="form-control" value="{{ $tps->kelurahan }}" required>
        </div>
        <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <input type="text" name="kecamatan" class="form-control" value="{{ $tps->kecamatan }}" required>
        </div>
        <div class="form-group">
            <label for="kota_kabupaten">Kota/Kabupaten</label>
            <input type="text" name="kota_kabupaten" class="form-control" value="{{ $tps->kota_kabupaten }}" required>
        </div>
        <div class="form-group">
            <label for="provinsi">Provinsi</label>
            <input type="text" name="provinsi" class="form-control" value="{{ $tps->provinsi }}" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    </form>
</div>
@endsection
