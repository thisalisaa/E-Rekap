@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Masukkan Kode Aktivasi</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.activation.activate') }}">
                        @csrf

                        <div class="form-group">
                            <label for="activation_code">Kode Aktivasi</label>
                            <input id="activation_code" type="text" class="form-control @error('activation_code') is-invalid @enderror" name="activation_code" required autofocus>

                            @error('activation_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Aktivasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
