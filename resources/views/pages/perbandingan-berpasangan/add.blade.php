@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Matriks Berpasangan Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('kriteria.index') }}">Matriks Perbandingan Berpasangan</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->

<section class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Membuat Matriks Perbandingan Berpasangan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <form action="{{ route('perbandingan-berpasangan.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Kriteria 1</label>
                            <select data-placeholder="Pilih Kriteria " name="kriteria" id="kriteria"
                                class="form-control select2 {{ $errors->has('kriteria') ? "is-invalid":"" }}">
                                <option></option>
                                @foreach ($kriteria as $id => $kriteria)
                                <option value="{{ $id }}"
                                    {{ (in_array($id, old('sub_kriteria', [])) || isset($sub_kriteria) && $sub_kriteria->kriteria->contains($id)) ? 'selected' : '' }}>
                                    {{ $kriteria }}
                                </option>
                                @endforeach
                            </select>
                            @if($errors->has('kriteria'))
                            <span class="error invalid-feedback">{{ $errors->first('kriteria') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Kriteria 2</label>
                            <select data-placeholder="Pilih Kriteria " name="kriteria2" id="kriteria2"
                                class="form-control select2 {{ $errors->has('kriteria2') ? "is-invalid":"" }}">
                                <option></option>
                                @foreach ($kriteria2 as $id => $kriteria2)
                                <option value="{{ $id }}"
                                    {{ (in_array($id, old('sub_kriteria', [])) || isset($sub_kriteria) && $sub_kriteria->kriteria->contains($id)) ? 'selected' : '' }}>
                                    {{ $kriteria2 }}
                                </option>
                                @endforeach
                            </select>
                            @if($errors->has('kriteria2'))
                            <span class="error invalid-feedback">{{ $errors->first('kriteria2') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                            <a href="{{ route('perbandingan-berpasangan.index') }}"
                                class="btn btn-default float-left">@lang('global.cancel')</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
