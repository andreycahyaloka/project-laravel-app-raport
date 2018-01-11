@extends('layouts.master')

@section('title', '| '.$gurux->nip.' Index')

@section('content')

<!-- <div class="container-fluid">
	<div class="row">
		<div class="col-sm-offset-2 col-md-8">
			<div class="card border-dark">
				<div class="card-header border-dark text-center">
					Selamat Datang Guru
				</div>

				<div class="card-body demo-card-body bg-secondary">
					<div class="text-center">
						<img src="/images/HEADER-copy.png" alt="Responsive image" class="img-fluid rounded img-thumbnail">
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-offset-1 col-md-10">
			<div class="card border-dark">
				<div class="card-header border-dark text-center">
					Daftar Raport {{ $gurux->nip }}
				</div>

				<div class="card-body">
					<div class="form-row">
						<div class="col-md-4">
							<h4 class="card-title">{{ $gurux->nama_lengkap }}</h4>
							<h6 class="card-subtitle mb-2 text-muted">
								{{ $nilaix->total() }} Raport ({{ $nilaix->lastItem() }} dari {{ $nilaix->total() }})
							</h6>
						</div>

						<div class="col-sm-offset-6 col-md-2">
							<!--  -->
						</div>
					</div>

					<p class="card-text">
						<div class="table-responsive">
							<table class="table table-striped table-hover table-bordered mb-0 mt-0 pb-0 pt-0">
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
													'route' => ['guruuser.indexdetail', $nilai->kodenilai],
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

				<div class="card-footer border-dark bg-transparent mb-0 mt-0 pb-0 pt-0">
					{!! $nilaix->links(); !!}
				</div>
			</div>
		</div>
	</div>
	<hr class="border-dark" />
</div>

@endsection