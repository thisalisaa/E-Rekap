@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- card -->
            <div class="card card-primary">
                <div class="card-header" style="background-color: #6c757d; color: #ffffff;">
                    <h3 class="card-title">Tambah Pengguna</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.pengguna.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role">Peran</label>
                            <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                                <option value="kpps" {{ old('role') == 'kpps' ? 'selected' : '' }}>KPPS</option>
                                <option value="kpu" {{ old('role') == 'kpu' ? 'selected' : '' }}>KPU</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Input TPS -->
                        <div class="form-group">
                            <label for="tps_id">TPS</label>
                            <select id="tps_id" class="form-control @error('tps_id') is-invalid @enderror" name="tps_id">
                                <option value="">Pilih TPS</option>
                                @foreach ($tpsList as $tps)
                                    <option value="{{ $tps->id }}" {{ old('tps_id') == $tps->id ? 'selected' : '' }}>
                                        {{ $tps->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tps_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
    </div>
</div>
@endsection
