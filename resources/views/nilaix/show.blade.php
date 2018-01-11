@extends('layouts.master')

@section('title', "| $nilaix->kodenilai")

@section('content')

<div class="modal fade" id="myModalConfirmDelete" role="dialog" aria-labelledby="myModalConfirmDeleteLabel" aria-hidden="true" tabindex="-1">
	<div class="modal-dialog" role="document">

		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalConfirmDeleteLabel">Peringatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center">
				<p>
					<strong>
						Apa anda ingin menghapus data nilai ini?<br />
						" {{ $nilaix->kodenilai }} "
					</strong>
				</p>
				{!! Form::open([
						'route' => ['nilai.destroy', $nilaix->id],
						'method' => 'DELETE',
					])
				!!}
					{{ Form::submit('Hapus', [
						'class' => 'btn btn-danger btn-lg btn-block',
					]) }}
				{!! Form::close() !!}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-offset-1 col-md-6">
			<div class="card border-dark">
				<div class="card-header border-dark text-center">
					{{ $nilaix->kodenilai }}
				</div>
				<div class="card-body">
					<h4 class="card-title">{{ $nilaix->kodenilai }}</h4>
					<h6 class="card-subtitle mb-2 text-muted">
						({{ $detailnilaix->total() }} siswa terdaftar)
					</h6>
					<p class="card-text">
						<form>
							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('guru_nip_id', 'Nama Guru:') }}
								</div>
								<div class="col-md-8">
									<td>{{ $nilaix->gurux->nama_lengkap }}</td>
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('mapel_kodemapel_id', 'Nama Mata Pelajaran:') }}
								</div>
								<div class="col-md-8">
									<td>{{ $nilaix->mapelx->nama_mapel }}</td>
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('kelas_kodekelas_id', 'Nama Kelas:') }}
								</div>
								<div class="col-md-8">
									<td>{{ $nilaix->kelasx->nama_kelas }}</td>
								</div>
							</div>
						</form>
					</p>
				</div>

				<div class="card-footer border-dark bg-transparent">
					<div class="form-row">
						<div class="form-group col-sm-offset-8 col-md-4">
							{!! Form::open([
									'route' => ['nilai.print', $nilaix->id],
									'method' => 'GET',
								])
							!!}
								{{ Form::submit('Print', [
										'class' => 'btn btn-outline-primary btn-block',
									])
								}}
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
			<br />
		</div>

		<div class="col-md-4">
			<div class="card border-dark">
				<div class="card-header border-dark text-center">
					Opsi
				</div>
				<div class="card-body">
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
				<div class="card-footer border-dark bg-transparent">
				<div class="form-row">
						<div class="form-group col-lg-4 col-md-6">
							{!! Form::open([
									'route' => ['nilai.index'],
									'method' => 'GET',
								])
							!!}
								{{ Form::submit('Kembali', [
										'class' => 'btn btn-outline-warning btn-block',
									])
								}}
							{!! Form::close() !!}
						</div>

						<div class="form-group col-lg-4 col-md-6">
							{{ Form::button('Hapus', [
									'class' => 'btn btn-outline-danger btn-block',
									'data-toggle' => 'modal',
									'data-target' => '#myModalConfirmDelete',
								])
							}}
						</div>

						<div class="form-group col-lg-4">
							{!! Form::open([
									'route' => ['nilai.edit', $nilaix->kodenilai],
									'method' => 'GET',
								])
							!!}
								{{ Form::submit('Edit', [
										'class' => 'btn btn-outline-primary btn-block',
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