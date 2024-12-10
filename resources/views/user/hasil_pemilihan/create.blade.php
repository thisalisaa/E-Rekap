@extends('layouts.user')

@section('title', 'Tambah Hasil Pemilihan')

@section('content')
    <div class="container mt-4">
        <form action="{{ route('user.hasil_pemilihan.store') }}" method="POST">
            @csrf
            <div id="saksi-container">
                <div class="saksi-group mb-4 p-3 border rounded shadow-sm">
                    <div class="row">
                        <!-- Nama dan NIK -->
                        <div class="col-md-6 mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama[]" id="nama" class="form-control form-control-sm" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" name="nik[]" id="nik" class="form-control form-control-sm" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="no_hp" class="form-label">No HP</label>
                            <input type="text" name="no_hp[]" id="no_hp" class="form-control form-control-sm" required>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Jenis Pemeriksa dan Jenis Saksi -->
                        <div class="col-md-6 mb-3">
                            <label for="jenis_pemeriksa" class="form-label">Jenis Pemeriksa</label>
                            <select name="jenis_pemeriksa[]" id="jenis_pemeriksa" class="form-select form-select-sm" required>
                                <option value="" disabled selected>Pilih Jenis Pemeriksa</option>
                                <option value="pps">PPS</option>
                                <option value="saksi">Saksi</option>
                                <option value="panwas">Panwas</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="jenis_saksi" class="form-label">Jenis Saksi</label>
                            <select name="jenis_saksi[]" id="jenis_saksi" class="form-select form-select-sm" required>
                                <option value="" disabled selected>Pilih Jenis Saksi</option>
                                <option value="saksi_pemilihan_presiden">Saksi Pemilihan Presiden</option>
                                <option value="saksi_pemilihan_dpr">Saksi Pemilihan DPR</option>
                                <option value="saksi_pemilihan_prd_provinsi">Saksi Pemilihan PRD Provinsi</option>
                                <option value="dps">DPS</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Pilih Kandidat -->
                        <div class="col-md-4 mb-3">
                            <label for="kader_id" class="form-label">Pilih Kandidat</label>
                            <select name="kader_id[]" id="kader_id" class="form-select form-select-sm kader-dropdown" required>
                                <option value="" disabled selected>Pilih Kandidat</option>
                                @foreach ($kaders as $kader)
                                    <option value="{{ $kader->id }}">{{ $kader->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Pasangan Kandidat -->
                        <div class="col-md-4 mb-3">
                            <label for="nama_pasang_kandidat" class="form-label">Pasangan Kandidat</label>
                            <select name="nama_pasang_kandidat[]" id="nama_pasang_kandidat" class="form-select form-select-sm pasangan-dropdown" required>
                                <option value="" disabled selected>Pilih Pasangan Kandidat</option>
                                @foreach ($kaders as $kader)
                                    <option value="{{ $kader->nama }}">{{ $kader->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Jenis Pemilihan -->
                        <div class="col-md-4 mb-3">
                            <label for="jenis_pemilihan" class="form-label">Jenis Pemilihan</label>
                            <select name="jenis_pemilihan[]" id="jenis_pemilihan" class="form-select form-select-sm" required>
                                <option value="" disabled selected>Pilih Jenis Pemilihan</option>
                                <option value="presiden_wakil_presiden">Presiden dan Wakil Presiden</option>
                                <option value="dpr">DPR</option>
                                <option value="dpd">DPD</option>
                                <option value="dprd">DPRD</option>
                                <option value="gubernur">Gubernur</option>
                                <option value="wali_kota">Wali Kota</option>
                                <option value="kepala_desa">Kepala Desa</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-5 mb-3">
                        <!-- Tombol Hapus Saksi dan Tambah Saksi saling berdekatan dan sejajar -->
                        <div>
                            <button type="button" class="btn btn-danger remove-saksi btn-sm" style="margin-right: 10px;">Hapus Saksi</button>
                            <button type="button" class="btn btn-warning btn-sm add-saksi">Tambah Saksi</button>
                        </div>
                    </div>
                    
                    <!-- Tombol Simpan di sebelah kanan -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.querySelector('.add-saksi').addEventListener('click', function() {
            var saksiContainer = document.getElementById('saksi-container');
            var saksiGroup = document.querySelector('.saksi-group').cloneNode(true);

            // Reset input values
            saksiGroup.querySelectorAll('input').forEach(input => input.value = '');
            saksiGroup.querySelectorAll('select').forEach(select => select.value = '');

            saksiContainer.appendChild(saksiGroup);
        });

        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-saksi')) {
                e.target.closest('.saksi-group').remove();
            }
        });
    </script>
@endsection
