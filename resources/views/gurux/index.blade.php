@extends('layouts.master')

@section('title', '| Data Guru')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-offset-1 col-lg-10">
			<div class="card border-dark">
				<div class="card-header border-dark text-center">
					Daftar
				</div>

				<div class="card-body">
					<div class="form-row">
						<div class="col-md-4">
							<h4 class="card-title">Data Guru</h4>
							<h6 class="card-subtitle mb-2 text-muted">
								{{ $gurux->total() }} guru ({{ $gurux->lastItem() }} dari {{ $gurux->total() }})
							</h6>
						</div>

						<div class="col-sm-offset-6 col-md-2">
							{!! Form::open([
									'route' => ['guru.create'],
									'method' => 'GET',
								])
							!!}
								{{ Form::submit('Tambah', [
										'class' => 'btn btn-outline-primary btn-block',
									])
								}}
							{!! Form::close() !!}
						</div>
					</div>
					<p class="card-text">
						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th>NIP</th>
										<th>Nama Lengkap</th>
										<th>Tgl. Lahir</th>
										<th>Jenis Kelamin</th>
										<th>Gelar</th>
										<th>Jabatan</th>
										<th class="text-center">Opsi</th>
									</tr>
								</thead>

								<tbody>
									<?php
										$no = 1;
									?>
									@foreach($gurux as $guru)
									<tr>
										<th scope="row">{{ $no }}</th>
										<td>{{ $guru->nip }}</td>
										<td style="min-width:200px;">{{ $guru->nama_lengkap }}</td>
										<td>{{ $guru->tgl_lahir }}</td>
										<td>{{ $guru->jeniskelaminx->nama }}</td>
										<td style="min-width:100px;">{{ $guru->gelar }}</td>
										<td style="min-width:150px;">{{ $guru->jabatanx->nama }}</td>
										<td class="text-center" style="min-width:100px;">
											{!! Form::open([
													'route' => ['guru.show', $guru->nip],
													'method' => 'GET',
												])
											!!}
												{{ Form::submit('Lihat', [
														'class' => 'btn btn-outline-info btn-block',
													])
												}}
											{!! Form::close() !!}
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

				<div class="card-footer border-dark bg-transparent">
					<!--  -->
				</div>
			</div>
		</div>
	</div>
	<hr class="border-dark" />
</div>

@endsection