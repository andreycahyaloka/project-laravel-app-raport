@extends('layouts.master')

@section('title', "| Edit $jurusanx->nama")

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-offset-1 col-md-6">
			<div class="card border-dark">
				<div class="card-header border-dark text-center">
					Edit {{ $jurusanx->nama }}
				</div>

				<div class="card-body mb-0 pb-0">
					<h4 class="card-title">Edit Data</h4>
					<p class="card-text mb-0 pb-0">
						{!! Form::model($jurusanx, [
								'route' => ['jurusan.update', $jurusanx->id],
								'method' => 'PUT',
							])
						!!}

						<div class="form-group">
							{{ Form::label('nama', 'Nama Jurusan:') }}
							{{ Form::text('nama', null, [
									'class' => 'form-control',
									'placeholder' => 'nama jurusan',
									'autocomplete' => 'off',
									'required',
									'pattern' => '[a-z ]{1,100}',
									'title' => 'hanya huruf kecil, (spasi), max 100 karakter',
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
							{{ date('j M, Y', strtotime($jurusanx->updated_at)) }}
							{{ date('H:i', strtotime($jurusanx->updated_at)) }}
						</div>
					</div>
				</div>
				<div class="card-footer border-dark bg-transparent mb-0 pb-0">
				<div class="form-row">
						<div class="form-group col-md-6">
							{!! Html::linkroute('jurusan.index', 'Batal', null, [
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