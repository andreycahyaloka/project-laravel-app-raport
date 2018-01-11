@extends('layouts.master')

@section('title', "| $siswax->nis")

@section('content')

<!-- Modal confirm delete-->
<div class="modal fade" id="myModalConfirmDelete" role="dialog" aria-labelledby="myModalConfirmDeleteLabel" aria-hidden="true" tabindex="-1">
	<div class="modal-dialog" role="document">

		<!-- Modal content-->
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
						Apa anda ingin menghapus data siswa ini?<br />
						" {{ $siswax->nama_lengkap }} "
					</strong>
				</p>
				<!--confirm delete form-->
				{!! Form::open([
						'route' => ['siswa.destroy', $siswax->id],
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
					{{ $siswax->nis }}
				</div>
				<div class="card-body">
					<h4 class="card-title">{{ $siswax->nama_lengkap }}</h4>
					<p class="card-text">
						<form>
							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('tempat_lahir', 'Tempat / Tgl. Lahir:') }}
								</div>
								<div class="col-md-4">
									{{ $siswax->tempat_lahir }}
								</div>
								<div class="col-md-4">
									{{ $siswax->tgl_lahir }}
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('alamat', 'Alamat:') }}
								</div>
								<div class="col-md-8">
									{{ $siswax->alamat }}
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('jeniskelamin_id', 'Jenis Kelamin:') }}
								</div>
								<div class="col-md-8">
									<td>{{ $siswax->jeniskelaminx->nama }}</td>
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('agama_id', 'Agama:') }}
								</div>
								<div class="col-md-8">
									<td>{{ $siswax->agamax->nama }}</td>
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('jurusan_id', 'Jurusan:') }}
								</div>
								<div class="col-md-8">
									<td>{{ $siswax->jurusanx->nama }}</td>
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('tahun_masuk', 'Tahun Masuk:') }}
								</div>
								<div class="col-md-8">
									{{ $siswax->tahun_masuk }}
								</div>
							</div>
						</form>
					</p>
				</div>
			</div>
		</div>
		<br />

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
							{{ date('j M, Y', strtotime($siswax->updated_at)) }}
							{{ date('H:i', strtotime($siswax->updated_at)) }}
						</div>
					</div>
				</div>
				<div class="card-footer border-dark bg-transparent">
				<div class="form-row">
						<div class="form-group col-lg-4 col-md-6">
							{!! Form::open([
									'route' => ['siswa.index'],
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
									'route' => ['siswa.edit', $siswax->nis],
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