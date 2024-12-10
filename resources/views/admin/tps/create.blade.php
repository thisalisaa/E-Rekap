@extends('layouts.admin')

@section('title', 'Tambah Data TPS')


@section('content')
<div class="container">
    <div class="card card-primary">
        <div class="card-header" style="background-color: #6c757d; color: #ffffff;">
            <h3 class="card-title">Tambah Data TPS</h3>
        </div>
        <form action="{{ route('admin.tps.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <!-- Input Fields -->
                <div class="form-group">
                    <label for="name">Nama TPS</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-building"></i>
                            </span>
                        </div>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="code">Kode TPS</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-barcode"></i>
                            </span>
                        </div>
                        <input type="text" name="code" class="form-control" id="code" required>
                    </div>
                </div>

                <!-- Dropdown Fields for Wilayah -->
                <div class="form-group">
                    <label for="provinsi_id">Provinsi</label>
                    <select class="form-control" id="provinsi_id" name="provinsi_id" required>
                        <option value="">Pilih Provinsi</option>
                        @foreach($provinsis as $provinsi)
                            <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="kabupaten_id">Kabupaten</label>
                    <select class="form-control" id="kabupaten_id" name="kabupaten_id" required>
                        <option value="">Pilih Kabupaten</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="kecamatan_id">Kecamatan</label>
                    <select class="form-control" id="kecamatan_id" name="kecamatan_id" required>
                        <option value="">Pilih Kecamatan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="kelurahan_id">Kelurahan</label>
                    <select class="form-control" id="kelurahan_id" name="kelurahan_id" required>
                        <option value="">Pilih Kelurahan</option>
                    </select>
                </div>

                <!-- Additional Input Fields -->
                <div class="form-group">
                    <label for="rt">RT</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-home"></i>
                            </span>
                        </div>
                        <input type="text" name="rt" class="form-control" id="rt" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="rw">RW</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-home"></i>
                            </span>
                        </div>
                        <input type="text" name="rw" class="form-control" id="rw" required>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-secondary">Simpan</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>

<!-- Data JSON untuk dropdown -->
<script type="application/json" id="kabupaten-data">
    @json($kabupatens)
</script>
<script type="application/json" id="kecamatan-data">
    @json($kecamatans)
</script>
<script type="application/json" id="kelurahan-data">
    @json($kelurahans)
</script>

<script src="{{ asset('js/tps.js') }}"></script>
@endsection
