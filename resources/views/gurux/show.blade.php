@extends('layouts.master')

@section('title', "| $gurux->nip")

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
						Apa anda ingin menghapus data guru ini?<br />
						" {{ $gurux->nama_lengkap }} "
					</strong>
				</p>
				{!! Form::open([
						'route' => ['guru.destroy', $gurux->id],
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
					{{ $gurux->nip }}
				</div>
				<div class="card-body">
					<h4 class="card-title">{{ $gurux->nama_lengkap }}</h4>
					<p class="card-text">
						<form>
							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('tempat_lahir', 'Tempat / Tgl. Lahir:') }}
								</div>
								<div class="col-md-4">
									{{ $gurux->tempat_lahir }}
								</div>
								<div class="col-md-4">
									{{ $gurux->tgl_lahir }}
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('alamat', 'Alamat:') }}
								</div>
								<div class="col-md-8">
									{{ $gurux->alamat }}
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('jeniskelamin_id', 'Jenis Kelamin:') }}
								</div>
								<div class="col-md-8">
									<td>{{ $gurux->jeniskelaminx->nama }}</td>
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('agama_id', 'Agama:') }}
								</div>
								<div class="col-md-8">
									<td>{{ $gurux->agamax->nama }}</td>
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('jenjangstudi_id', 'Jenjang Studi:') }}
								</div>
								<div class="col-md-8">
									<td>{{ $gurux->jenjangstudix->nama }}</td>
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('gelar', 'Gelar:') }}
								</div>
								<div class="col-md-8">
									{{ $gurux->gelar }}
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('tahun_lulus', 'Tahun Lulus:') }}
								</div>
								<div class="col-md-8">
									{{ $gurux->tahun_lulus }}
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('no_telp', 'No Telp:') }}
								</div>
								<div class="col-md-8">
									{{ $gurux->no_telp }}
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('status_id', 'Status:') }}
								</div>
								<div class="col-md-8">
									<td>{{ $gurux->statusx->nama }}</td>
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('jabatan_id', 'Jabatan:') }}
								</div>
								<div class="col-md-8">
									<td>{{ $gurux->jabatanx->nama }}</td>
								</div>
							</div>
						</form>
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
				<div class="card-body">
					<div class="form-group">
						<div>
							{{ Form::label('updated_at', 'Terakhir Diperbarui:') }}
						</div>
						<div>
							{{ date('j M, Y', strtotime($gurux->updated_at)) }}
							{{ date('H:i', strtotime($gurux->updated_at)) }}
						</div>
					</div>
				</div>
				<div class="card-footer border-dark bg-transparent">
				<div class="form-row">
						<div class="form-group col-lg-4 col-md-6">
							{!! Form::open([
									'route' => ['guru.index'],
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
									'route' => ['guru.edit', $gurux->nip],
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