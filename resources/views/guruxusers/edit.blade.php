@extends('layouts.master')

@section('title', '| Edit Nilai Siswa')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-offset-1 col-md-6">
			<div class="card border-dark">
				<div class="card-header border-dark text-center">
					{{ $detailnilaix->nilaix->kodenilai }}
				</div>

				<div class="card-body mb-0 pb-0">
					<div class="form-group">
						<div>
							<h4 class="card-title">Edit siswa {{ $detailnilaix->siswax->nama_lengkap }}</h4>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								{{ Form::label('mapel_kodemapel_id', 'Nama Mata Pelajaran:') }}
								<h6 class="card-subtitle mb-2 text-muted">{{ $detailnilaix->nilaix->mapelx->nama_mapel }}</h6>
							</div>

							<div class="form-group col-sm-offset-4 col-md-4">
								{{ Form::label('kelas_kodekelas_id', 'Nama Kelas:') }}
								<h6 class="card-subtitle mb-2 text-muted">{{ $detailnilaix->nilaix->kelasx->nama_kelas }}</h6>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<div>
									{{ Form::label('guru_nip_id', 'Nama Guru:') }}
									<h6 class="card-subtitle mb-2 text-muted">{{ $detailnilaix->nilaix->gurux->nama_lengkap }}</h6>
								</div>
							</div>
						</div>
						
					</div>

					<p class="card-text mb-0 pb-0">
						{!! Form::model($detailnilaix, [
								'route' => ['guruuser.updatesiswa', $detailnilaix->id],
								'method' => 'PUT',
								'name' => 'autoSumForm',
							])
						!!}

						<div class="form-group form-row">
							<div class="col-md-4">
							{{ Form::label('siswa_nis_id', 'Nama Siswa:') }}
							</div>
							<div class="col-md-8">
							{{ $detailnilaix->siswax->nama_lengkap }}
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
							{{ Form::label('nilai_tugas', 'Nilai Tugas:') }}
							{{ Form::text('nilai_tugas', null, [
									'class' => 'form-control',
									'placeholder' => '(contoh: 00.00, 95.00, 75.25, 100.00)',
									'autocomplete' => 'off',
									'required',
									'pattern' => '([0-9]?[0-9]{2}).([0-9]{2})|100.00',
									'title' => 'hanya angka, pemisah pecahan dengan titik, dua angka dibelakang titik',
									'onFocus' => 'startCalc();',
									'onBlur' => 'stopCalc();',
								])
							}}
							</div>

							<div class="form-group col-md-6">
							{{ Form::label('nilai_ulangan', 'Nilai Ulangan:') }}
							{{ Form::text('nilai_ulangan', null, [
									'class' => 'form-control',
									'placeholder' => '(contoh: 00.00, 95.00, 75.25, 100.00)',
									'autocomplete' => 'off',
									'required',
									'pattern' => '([0-9]?[0-9]{2}).([0-9]{2})|100.00',
									'title' => 'hanya angka, pemisah pecahan dengan titik, dua angka dibelakang titik',
									'onFocus' => 'startCalc();',
									'onBlur' => 'stopCalc();',
								])
							}}
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
							{{ Form::label('nilai_uts', 'Nilai UTS:') }}
							{{ Form::text('nilai_uts', null, [
									'class' => 'form-control',
									'placeholder' => '(contoh: 00.00, 95.00, 75.25, 100.00)',
									'autocomplete' => 'off',
									'required',
									'pattern' => '([0-9]?[0-9]{2}).([0-9]{2})|100.00',
									'title' => 'hanya angka, pemisah pecahan dengan titik, dua angka dibelakang titik',
									'onFocus' => 'startCalc();',
									'onBlur' => 'stopCalc();',
								])
							}}
							</div>

							<div class="form-group col-md-6">
							{{ Form::label('nilai_uas', 'Nilai UAS:') }}
							{{ Form::text('nilai_uas', null, [
									'class' => 'form-control',
									'placeholder' => '(contoh: 00.00, 95.00, 75.25, 100.00)',
									'autocomplete' => 'off',
									'required',
									'pattern' => '([0-9]?[0-9]{2}).([0-9]{2})|100.00',
									'title' => 'hanya angka, pemisah pecahan dengan titik, dua angka dibelakang titik',
									'onFocus' => 'startCalc();',
									'onBlur' => 'stopCalc();',
								])
							}}
							</div>
						</div>

						<div class="form-group">
							{{ Form::label('nilai_akhir', 'Nilai UAS:') }}
							{{ Form::text('nilai_akhir', null, [
									'class' => 'form-control',
									'required',
									'readonly',
									'value' => '0',
								])
							}}
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
							{{ date('j M, Y', strtotime($detailnilaix->updated_at)) }}
							{{ date('H:i', strtotime($detailnilaix->updated_at)) }}
						</div>
					</div>
				</div>
				<div class="card-footer border-dark bg-transparent mb-0 pb-0">
					<div class="form-row">
						<div class="form-group col-md-6">
							{!! Html::linkroute('guruuser.indexdetail', 'Batal', [$detailnilaix->nilaix->kodenilai], [
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