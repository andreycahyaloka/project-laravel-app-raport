@extends('layouts.master')

@section('title', '| Data Jurusan')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-offset-1 col-md-6">
			<div class="card border-dark">
				<div class="card-header border-dark text-center">
					Daftar
				</div>

				<div class="card-body mb-0 pb-0">
					<div class="form-row">
						<div class="col-md-4">
							<h4 class="card-title">Data Jurusan</h4>
							<h6 class="card-subtitle mb-2 text-muted">
								{{ $jurusanx->total() }} jurusan ({{ $jurusanx->lastItem() }} dari {{ $jurusanx->total() }})
							</h6>
						</div>
					</div>
					<p class="card-text mb-0 pb-0">
						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th>Nama Jurusan</th>
										<th class="text-center">Opsi</th>
									</tr>
								</thead>

								<tbody>
									<?php
										$no = 1;
									?>
									@foreach($jurusanx as $jurusan)
									<tr>
										<th scope="row">{{ $no }}</th>
										<td style="min-width:150px;">{{ $jurusan->nama }}</td>
										<td class="text-center" style="min-width:100px;">
											<div class="form-row">
												<div class="col-lg-6">
													{{ Form::button('Hapus', [
															'class' => 'btn btn-outline-danger btn-block',
															'data-toggle' => 'modal',
															'data-target' => '#myModalConfirmDelete',
														])
													}}
												</div>



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
						Apa anda ingin menghapus data jurusan ini?<br />
						" {{ $jurusan->nama }} "
					</strong>
				</p>
				<!--confirm delete form-->
				{!! Form::open([
						'route' => ['jurusan.destroy', $jurusan->id],
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



												<div class="col-lg-6">
													{!! Form::open([
															'route' => ['jurusan.edit', $jurusan->id],
															'method' => 'GET',
														])
													!!}
														{{ Form::submit('Edit', [
																'class' => 'btn btn-outline-info btn-block',
															])
														}}
													{!! Form::close() !!}
												</div>
											</div>
											

											
										</td>
									</tr>
									<?php
										$no++;
									?>
									@endforeach
								</tbody>
							</table>
						</div>
					</p>
				</div>

				<div class="card-footer border-dark bg-transparent mb-0 pb-0 mt-0 pt-0">
					{!! $jurusanx->links(); !!}
				</div>
			</div>
			<br />
		</div>

		<div class="col-md-4">
			<div class="card border-dark">
				<div class="card-header border-dark text-center">
					Tambah Jurusan
				</div>

				<div class="card-body mb-0 pb-0">
					<p class="card-text mb-0 pb-0">
						{!! Form::open([
								'route' => ['jurusan.store'],
								'method' => 'POST',
							])
						!!}

						<div class="form-group">
							{{ Form::label('nama', 'Nama Jurusan:') }}
							{{ Form::text('nama', null, [
									'class' => 'form-control',
									'placeholder' => 'nama jurusan',
									'autocomplete' => 'off',
									'required',
									'value' => 'old("nama")',
									'pattern' => '[a-z ]{1,100}',
									'title' => 'hanya huruf kecil, (spasi), max 100 karakter',
								])
							}}
						</div>
					</p>
				</div>

				<div class="card-footer border-dark bg-transparent">
					<div class="form-row">
						<div class="col-sm-offset-6 col-md-6">
							{{ Form::submit('Tambah', [
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