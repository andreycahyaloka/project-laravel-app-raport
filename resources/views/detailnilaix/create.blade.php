@extends('layouts.master')

@section('title', '| Tambah Nilai Siswa')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-offset-3 col-md-6">
			<div class="card border-dark">
				<div class="card-header border-dark text-center">
					Tambah
				</div>

				<div class="card-body">
					<h4 class="card-title">Tambah Nilai Siswa</h4>
					<p class="card-text">
						{!! Form::open([
								'route' => ['detailnilai.store'],
								'method' => 'POST',
								'name' => 'autoSumForm',
							])
						!!}

						<div class="form-row">
							<div class="form-group col-md-6">
							{{ Form::label('nilai_kodenilai_id', 'Kode Nilai:') }}
							{{ Form::select('nilai_kodenilai_id', $nilaix->pluck('kodenilai', 'id'), null, [
									'class' => 'form-control',
									'id' => 'nilai_kodenilai_id',
									'placeholder' => '',
									'required',
								])
							}}
							</div>
						</div>

						<div class="form-group">
							{{ Form::label('siswa_nis_id', 'Nama Siswa:') }}
							{{ Form::select('siswa_nis_id', $siswax->pluck('nama_lengkap', 'id'), null, [
									'class' => 'form-control',
									'id' => 'siswa_nis_id',
									'placeholder' => '',
									'required',
								])
							}}
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

				<div class="card-footer border-dark bg-transparent">
					<div class="form-row">
						<div class="form-group col-sm-offset-4 col-md-4">
							{!! Html::linkroute('detailnilai.index', 'Batal', null, [
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