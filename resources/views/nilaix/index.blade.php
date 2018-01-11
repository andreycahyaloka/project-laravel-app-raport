@extends('layouts.master')

@section('title', '| Data Nilai')

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
							<h4 class="card-title">Data Nilai</h4>
							<h6 class="card-subtitle mb-2 text-muted">
								{{ $nilaix->total() }} raport ({{ $nilaix->lastItem() }} dari {{ $nilaix->total() }})
							</h6>
						</div>

						<div class="col-sm-offset-6 col-md-2">
							{!! Form::open([
									'route' => ['nilai.create'],
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
										<th>Kode Nilai</th>
										<th>Nama Guru</th>
										<th>Nama Mapel</th>
										<th>Nama Kelas</th>
										<th class="text-center">Opsi</th>
									</tr>
								</thead>

								<tbody>
									<?php
										$no = 1;
									?>
									@foreach($nilaix as $nilai)
									<tr>
										<th scope="row">{{ $no }}</th>
										<td>{{ $nilai->kodenilai }}</td>
										<td style="min-width:200px;">{{ $nilai->gurux->nama_lengkap }}</td>
										<td style="min-width:100px;">{{ $nilai->mapelx->nama_mapel }}</td>
										<td style="min-width:100px;">{{ $nilai->kelasx->nama_kelas }}</td>
										<td class="text-center" style="min-width:100px;">
											{!! Form::open([
													'route' => ['nilai.show', $nilai->kodenilai],
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