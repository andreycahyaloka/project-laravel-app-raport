@extends('layouts.master')

@section('title', '| Tambah Data Nilai')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-offset-3 col-md-6">
			<div class="card border-dark">
				<div class="card-header border-dark text-center">
					Tambah
				</div>

				<div class="card-body mb-0 pb-0">
					<h4 class="card-title">Data Nilai</h4>
					<h6 class="card-subtitle mb-2 text-muted">Masukkan Data Nilai</h6>
					<p class="card-text mb-0 pb-0">
						{!! Form::open([
								'route' => ['nilai.store'],
								'method' => 'POST',
							])
						!!}

						<div class="form-row">
							<div class="form-group col-md-6">
							{{ Form::label('kodenilai', 'Kode Nilai:') }}
							{{ Form::text('kodenilai', null, [
									'class' => 'form-control',
									'placeholder' => 'kode nilai (contoh: nl255)',
									'autocomplete' => 'off',
									'required',
									'autofocus',
									'value' => 'old("kodenilai")',
									'pattern' => '((nl)([0-9]{3}))',
									'title' => 'hanya dimulai dengan (nl), kemudian angka, 3 digit',
								])
							}}
							</div>
						</div>

						<div class="form-group">
							{{ Form::label('guru_nip_id', 'Nama Guru:') }}
							{{ Form::select('guru_nip_id', $gurux->pluck('nama_lengkap', 'id'), null, [
									'class' => 'form-control',
									'id' => 'guru_nip_id',
									'placeholder' => '',
									'required',
								])
							}}
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
							{{ Form::label('mapel_kodemapel_id', 'Nama Mata Pelajaran:') }}
							{{ Form::select('mapel_kodemapel_id', $mapelx->pluck('nama_mapel', 'id'), null, [
									'class' => 'form-control',
									'id' => 'mapel_kodemapel_id',
									'placeholder' => '',
									'required',
								])
							}}
							</div>

							<div class="form-group col-md-6">
							{{ Form::label('kelas_kodekelas_id', 'Nama Kelas:') }}
							{{ Form::select('kelas_kodekelas_id', $kelasx->pluck('nama_kelas', 'id'), null, [
									'class' => 'form-control',
									'id' => 'kelas_kodekelas_id',
									'placeholder' => '',
									'required',
								])
							}}
							</div>
						</div>
					</p>
				</div>

				<div class="card-footer border-dark bg-transparent mb-0 pb-0">
					<div class="form-row">
						<div class="form-group col-sm-offset-4 col-md-4">
							{!! Html::linkroute('nilai.index', 'Batal', null, [
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