@extends('layouts.master')

@section('title', '| Tambah Data Siswa')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-offset-3 col-md-6">
			<div class="card border-dark">
				<div class="card-header border-dark text-center">
					Tambah
				</div>

				<div class="card-body">
					<h4 class="card-title">Data Siswa</h4>
					<h6 class="card-subtitle mb-2 text-muted">Masukkan Data Siswa</h6>
					<p class="card-text">
						{!! Form::open([
								'route' => ['siswa.store'],
								'method' => 'POST',
							])
						!!}

						<div class="form-row">
							<div class="form-group col-md-6">
							{{ Form::label('nis', 'Nis:') }}
							{{ Form::text('nis', null, [
									'class' => 'form-control',
									'placeholder' => 'nis',
									'autocomplete' => 'off',
									'required',
									'autofocus',
									'value' => 'old("nis")',
									'pattern' => '[0-9]{12}',
									'title' => 'hanya angka, 12 digit',
								])
							}}
							</div>
						</div>

						<div class="form-group">
							{{ Form::label('nama_lengkap', 'Nama Lengkap:') }}
							{{ Form::text('nama_lengkap', null, [
									'class' => 'form-control',
									'placeholder' => 'nama lengkap',
									'autocomplete' => 'off',
									'required',
									'value' => 'old("nama_lengkap")',
									'pattern' => '[a-z ]{1,100}',
									'title' => 'hanya huruf kecil, spasi, max 100 karakter',
								])
							}}
						</div>

						<div class="form-group">
							{{ Form::label('ttl', 'Tempat / Tgl. Lahir:') }}
							<div class="form-row">

								<div class="col-md-6">
							{{ Form::text('tempat_lahir', null, [
									'class' => 'form-control',
									'placeholder' => 'tempat lahir',
									'autocomplete' => 'off',
									'required',
									'value' => 'old("tempat_lahir")',
									'pattern' => '[a-z ]{1,100}',
									'title' => 'hanya huruf kecil, spasi, max 100 karakter',
								])
							}}
								</div>

								<div class="col-md-6">
							{{ Form::text('tgl_lahir', null, [
									'class' => 'form-control',
									'id' => 'datepicker',
									'placeholder' => 'dd/mm/yyyy',
									'autocomplete' => 'off',
									'required',
									'pattern' => '(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}',
									'title' => 'format tanggal dd/mm/yyyy',
								])
							}}
								</div>
							</div>
						</div>

						<div class="form-group">
							{{ Form::label('alamat', 'Alamat:') }}
							{{ Form::text('alamat', null, [
									'class' => 'form-control',
									'placeholder' => 'alamat',
									'autocomplete' => 'off',
									'required',
									'value' => 'old("alamat")',
									'pattern' => '[a-z0-9 .]{1,100}',
									'title' => 'hanya huruf kecil, angka, spasi, titik, max 100 karakter',
								])
							}}
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
							{{ Form::label('jeniskelamin_id', 'Jenis Kelamin:') }}
							{{ Form::select('jeniskelamin_id', $jeniskelaminx->pluck('nama', 'id'), null, [
									'class' => 'form-control',
									'id' => 'jeniskelamin_id',
									'placeholder' => '',
									'required',
								])
							}}
							</div>

							<div class="form-group col-md-6">
							{{ Form::label('agama_id', 'Agama:') }}
							{{ Form::select('agama_id', $agamax->pluck('nama', 'id'), null, [
									'class' => 'form-control',
									'id' => 'agama_id',
									'placeholder' => '',
									'required',
								])
							}}
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
							{{ Form::label('jurusan_id', 'Jurusan:') }}
							{{ Form::select('jurusan_id', $jurusanx->pluck('nama', 'id'), null, [
									'class' => 'form-control',
									'id' => 'jurusan_id',
									'placeholder' => '',
									'required',
								])
							}}
							</div>

							<div class="form-group col-md-6">
							{{ Form::label('tahun_masuk', 'Tahun Masuk:') }}
							{{ Form::text('tahun_masuk', null, [
									'class' => 'form-control',
									'id' => 'datepickeryear',
									'placeholder' => 'yyyy',
									'autocomplete' => 'off',
									'required',
									// 'readonly',
									'pattern' => '[0-9]{4}',
									'title' => 'format tahun yyyy',
								])
							}}
							</div>
						</div>
					</p>
				</div>

				<div class="card-footer border-dark bg-transparent">
					<div class="form-row">
						<div class="form-group col-sm-offset-4 col-md-4">
							{!! Html::linkroute('siswa.index', 'Batal', null, [
									'class' => 'btn btn-outline-warning btn-block',
								])
							!!}
						</div>

						<div class="form-group col-md-4">
							{{ Form::submit('Tambah', [
									'class' => 'btn btn-outline-success btn-block',
								])
							}}
						{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr class="border-dark" />
</div>

@endsection