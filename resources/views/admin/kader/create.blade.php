@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header" style="background-color: #6c757d; color: #ffffff;">
                <h3 class="card-title">Tambah Kader</h3>
            </div>
            <form action="{{ route('admin.kaders.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <!-- Input Fields -->
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" required>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tps">TPS</label>
                        <input type="text" class="form-control" id="tps" name="tps" required>
                    </div>

                    <!-- Dropdown Fields -->
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

    <script src="{{ asset('js/kader.js') }}"></script>
@endsection
