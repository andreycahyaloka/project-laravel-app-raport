@extends('layouts.master')

@section('title', "| Edit $nilaix->kodenilai")

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-offset-1 col-md-6">
			<div class="card border-dark">
				<div class="card-header border-dark text-center">
					Edit {{ $nilaix->kodenilai }}
				</div>

				<div class="card-body mb-0 pb-0">
					<h4 class="card-title">Edit Data</h4>
					<p class="card-text mb-0 pb-0">
						{!! Form::model($nilaix, [
								'route' => ['nilai.update', $nilaix->id],
								'method' => 'PUT',
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
									'value' => 'old("kodenilai")',
									'pattern' => '((nl)([0-9]{3}))',
									'title' => 'hanya dimulai dengan (nl), kemudian angka, 3 digit',
								])
							}}
							</div>
						</div>

						<div class="form-group">
							{{ Form::label('guru_nip_id', 'Nama Guru:') }}
							{{ Form::select('guru_nip_id', $gurux, null, [
									'class' => 'form-control',
									'id' => 'guru_nip_id',
									'required',
								])
							}}
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
							{{ Form::label('mapel_kodemapel_id', 'Nama Mata Pelajaran:') }}
							{{ Form::select('mapel_kodemapel_id', $mapelx, null, [
									'class' => 'form-control',
									'id' => 'mapel_kodemapel_id',
									'required',
								])
							}}
							</div>

							<div class="form-group col-md-6">
							{{ Form::label('kelas_kodekelas_id', 'Nama Kelas:') }}
							{{ Form::select('kelas_kodekelas_id', $kelasx, null, [
									'class' => 'form-control',
									'id' => 'kelas_kodekelas_id',
									'required',
								])
							}}
							</div>
						</div>
					</p>
				</div>
			</div>
			<br />
		</div>

		<div class="col-md-4">
			<div class="card border-dark">
				<div class="card-header border-dark text-center">
					Opsi
				</div>
				<div class="card-body mb-0 pb-0">
					<div class="form-group">
						<div>
							{{ Form::label('updated_at', 'Terakhir Diperbarui:') }}
						</div>
						<div>
							{{ date('j M, Y', strtotime($nilaix->updated_at)) }}
							{{ date('H:i', strtotime($nilaix->updated_at)) }}
						</div>
					</div>
				</div>
				<div class="card-footer border-dark bg-transparent mb-0 pb-0">
				<div class="form-row">
						<div class="form-group col-md-6">
							{!! Html::linkroute('nilai.show', 'Batal', [$nilaix->kodenilai], [
									'class' => 'btn btn-outline-warning btn-block',
								])
							!!}
						</div>

						<div class="form-group col-md-6">
							{{ Form::submit('Simpan', [
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