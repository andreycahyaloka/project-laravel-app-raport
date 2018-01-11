@extends('layouts.master')

@section('title', '| Data Detail Nilai')

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
							<h4 class="card-title">Data Detail Nilai</h4>
							<h6 class="card-subtitle mb-2 text-muted">
								{{ $detailnilaix->total() }} detail nilai ({{ $detailnilaix->lastItem() }} dari {{ $detailnilaix->total() }})
							</h6>
						</div>
						<div class="col-sm-offset-6 col-md-2">
							{!! Form::open([
									'route' => ['detailnilai.create'],
									'method' => 'GET',
								])
							!!}
								{{ Form::submit('Tambah Siswa', [
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
										<th>Nama Siswa</th>
										<th>Nilai Tugas</th>
										<th>Nilai Ulangan</th>
										<th>Nilai UTS</th>
										<th>Nilai UAS</th>
										<th>Nilai Akhir</th>
										<th class="text-center">Opsi</th>
									</tr>
								</thead>

								<tbody>
									<?php
										$no = 1;
									?>
									@foreach($detailnilaix as $detailnilai)
									<tr>
										<th scope="row">{{ $no }}</th>
										<td style="min-width:100px;">{{ $detailnilai->nilaix->kodenilai }}</td>
										<td style="min-width:200px;">{{ $detailnilai->siswax->nama_lengkap }}</td>
										<td>{{ $detailnilai->nilai_tugas }}</td>
										<td>{{ $detailnilai->nilai_ulangan }}</td>
										<td>{{ $detailnilai->nilai_uts }}</td>
										<td>{{ $detailnilai->nilai_uas }}</td>
										<td>{{ $detailnilai->nilai_akhir }}</td>
										<td class="text-center" style="min-width:100px;">
											{!! Form::open([
													'route' => ['detailnilai.show', $detailnilai->id],
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