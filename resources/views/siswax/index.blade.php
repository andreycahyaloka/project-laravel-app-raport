@extends('layouts.master')

@section('title', '| Data Siswa')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-offset-1 col-lg-10">
			<div class="card border-dark">
				<div class="card-header border-dark text-center">
					Daftar
				</div>

				<div class="card-body mb-0 pb-0">
					<div class="form-row">
						<div class="col-md-4">
							<h4 class="card-title">Data Siswa</h4>
							<h6 class="card-subtitle mb-2 text-muted">
								{{ $siswax->total() }} siswa ({{ $siswax->lastItem() }} dari {{ $siswax->total() }})
							</h6>
						</div>

						<div class="col-sm-offset-6 col-md-2">
							{!! Form::open([
									'route' => ['siswa.create'],
									'method' => 'GET',
								])
							!!}
								{{ Form::submit('Tambah', [
										'class' => 'btn btn-outline-primary btn-block mb-2',
									])
								}}
							{!! Form::close() !!}
						</div>
					</div>
					<p class="card-text mb-0 pb-0">
						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th>NIS</th>
										<th>Nama Lengkap</th>
										<th>Tgl. Lahir</th>
										<th>Jenis Kelamin</th>
										<th>Jurusan</th>
										<th>Tahun Masuk</th>
										<th class="text-center">Opsi</th>
									</tr>
								</thead>

								<tbody>
									<?php
										$no = 1;
									?>
									@foreach($siswax as $siswa)
									<tr>
										<th scope="row">{{ $no }}</th>
										<td>{{ $siswa->nis }}</td>
										<td style="min-width:200px;">{{ $siswa->nama_lengkap }}</td>
										<td>{{ $siswa->tgl_lahir }}</td>
										<td>{{ $siswa->jeniskelaminx->nama }}</td>
										<td style="min-width:150px;">{{ $siswa->jurusanx->nama }}</td>
										<td>{{ $siswa->tahun_masuk }}</td>
										<td class="text-center" style="min-width:100px;">
											{!! Form::open([
													'route' => ['siswa.show', $siswa->nis],
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