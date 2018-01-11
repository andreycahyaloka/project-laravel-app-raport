@extends('layouts.master')

@section('title', '| Proses Data Detail Nilai')

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
						Apa anda ingin menghapus data siswa ini?<br />
						" {{ $detailnilaix->siswax->nama_lengkap }} "
					</strong>
				</p>
				{!! Form::open([
						'route' => ['detailnilai.destroy', $detailnilaix->id],
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
		<div class="col-md-offset-1 col-lg-6">
			<div class="card border-dark">
				<div class="card-header border-dark text-center">
					{{ $detailnilaix->nilaix->kodenilai }}
				</div>

				<div class="card-body">
					<div class="form-group">
						<div>
							<h4 class="card-title">Kode Nilai {{ $detailnilaix->nilaix->kodenilai }}</h4>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								{{ Form::label('mapel_kodemapel_id', 'Nama Mata Pelajaran:') }}
								<h6 class="card-subtitle mb-2 text-muted">{{ $detailnilaix->nilaix->mapelx->nama_mapel }}</h6>
							</div>

							<div class="form-group col-sm-offset-4 col-md-4">
								{{ Form::label('kelas_kodekelas_id', 'Nama Kelas:') }}
								<h6 class="card-subtitle mb-2 text-muted">{{ $detailnilaix->nilaix->kelasx->nama_kelas }}</h6>
							</div>
						</div>
						<div class="form-group form-row">
							<div>
								{{ Form::label('guru_nip_id', 'Nama Guru:') }}
								<h6 class="card-subtitle mb-2 text-muted">{{ $detailnilaix->nilaix->gurux->nama_lengkap }}</h6>
							</div>
						</div>
					</div>

					<p class="card-text">
						<form>
							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('siswa_nis_id', 'Nama Siswa:') }}
								</div>
								<div class="col-md-8">
									{{ $detailnilaix->siswax->nama_lengkap }}
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('nilai_tugas', 'Nilai Tugas:') }}
								</div>
								<div class="col-md-8">
									<td>{{ $detailnilaix->nilai_tugas }}</td>
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('nilai_ulangan', 'Nilai Ulangan:') }}
								</div>
								<div class="col-md-8">
									<td>{{ $detailnilaix->nilai_ulangan }}</td>
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('nilai_uts', 'Nilai UTS:') }}
								</div>
								<div class="col-md-8">
									<td>{{ $detailnilaix->nilai_uts }}</td>
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('nilai_uas', 'Nilai UAS:') }}
								</div>
								<div class="col-md-8">
									<td>{{ $detailnilaix->nilai_uas }}</td>
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-4">
									{{ Form::label('nilai_akhir', 'Nilai Akhir:') }}
								</div>
								<div class="col-md-8">
									<td>{{ $detailnilaix->nilai_akhir }}</td>
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
							{{ date('j M, Y', strtotime($detailnilaix->updated_at)) }}
							{{ date('H:i', strtotime($detailnilaix->updated_at)) }}
						</div>
					</div>
				</div>
				<div class="card-footer border-dark bg-transparent">
				<div class="form-row">
						<div class="form-group col-lg-4 col-md-6">
							{!! Form::open([
									'route' => ['detailnilai.index'],
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
									'route' => ['detailnilai.edit', $detailnilaix->id],
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