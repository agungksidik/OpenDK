@extends('layouts.dashboard_template')

@section('content')
<section class="content-header">
  <h1>
    {{ $page_title ?? "Page Title" }}
    <small>{{ $page_description ?? '' }}</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ route('data.fasilitas-paud.index') }}">Daftar Fasilitas PAUD</a></li>
    <li class="active">{{ $page_description ?? '' }}</li>
  </ol>
</section>

<section class="content container-fluid">

  @include('partials.flash_message')
  <div class="row">
    <div class="col-md-12">
      <!-- form start -->
      {!! Form::open( [ 'route' => 'data.fasilitas-paud.store', 'method' => 'post','id' => 'form-store', 'class' =>
      'form-horizontal form-label-left', 'files' => true ] ) !!}
      <div class="box-body">
        @if(count($errors) > 0)
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Ups!</strong> Ada beberapa masalah dengan masukan Anda.<br><br>
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="list_desa" class="control-label col-md-4 col-sm-3 col-xs-12">Desa</label>
              <div class="col-md-8">
                <select class="form-control" id="list_desa" name="desa_id">
                  @foreach(\App\Models\DataDesa::all() as $desa)
                    <option value="{{ $desa->desa_id }}">{{ $desa->nama }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="bulan" class="control-label col-md-4 col-sm-3 col-xs-12">Semester</label>
              <div class="col-md-8">
                <select class="form-control" id="bulan" name="semester">
                  <option value="1">Semester 1</option>
                  <option value="2">Semester 2</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="list_year" class="control-label col-md-4 col-sm-3 col-xs-12">Tahun</label>
              <div class="col-md-8">
                <select class="form-control" id="list_year" name="tahun">
                  @foreach($years_list as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="jumlah_paud" class="control-label col-md-4 col-sm-3 col-xs-12">Jumlah PAUD <span
                  class="required">*</span></label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                {!! Form::number('jumlah_paud', null, ['class' => 'form-control', 'required' => true, 'id' =>
                'jumlah_paud']) !!}
              </div>
            </div>
            <div class="form-group">
              <label for="jumlah_guru_paud" class="control-label col-md-4 col-sm-3 col-xs-12">Jumlah Guru PAUD <span
                  class="required">*</span></label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                {!! Form::number('jumlah_guru_paud', null, ['class' => 'form-control', 'required' => true, 'id' =>
                'jumlah_guru_paud']) !!}
              </div>
            </div>
            <div class="form-group">
              <label for="jumlah_siswa_paud" class="control-label col-md-4 col-sm-3 col-xs-12">Jumlah Siswa PAUD <span
                  class="required">*</span></label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                {!! Form::number('jumlah_siswa_paud', null, ['class' => 'form-control', 'required' => true, 'id' =>
                'jumlah_siswa_paud']) !!}
              </div>
            </div>
            <div class="ln_solid"></div>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <div class="pull-right">
          <div class="control-group">
            <a href="{{ route('data.fasilitas-paud.index') }}">
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Batal</button>
            </a>
            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i>&ensp;Simpan</button>
          </div>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</section>
@endsection