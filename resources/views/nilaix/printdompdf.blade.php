<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Raport {{ $nilaix->kodenilai }}</title>

	<style>
		html {
			font-size: 100%;
			margin-top: 1cm;
			margin-bottom: 1cm;
			margin-left: 1cm;
			margin-right: 1cm;
		}

		table {
			border-collapse: collapse;
			width: 100%;
		}

		.bordered table, .bordered th, .bordered td {
			border: 1px solid black;
		}

		.bordernone table, .bordernone th, .bordernone td {
			border: 0px;
		}

		th {
			height: 30px;
			padding: 5px;
			background-color: #e0e0e0;
		}

		td {
			padding: 5px;
		}
	</style>
</head>

<body>
	<div>
		<p align="center">
			<font size="5"><b>Dinas Pendidikan Kabupaten Malang</b></font> <br />
			<font size="5"><b>SMK NH Multimedia Poncokusumo</b></font> <br />
			<font size="3"><b>Jl. Gajahmada No.02 Kec. Poncokusumo</b></font> <br />
		</p>

		<hr />

		<table class="bordernone">
			<tr>
				<td>{{ Form::label('kodenilai', 'Kode Nilai') }}</td>
				<td>: {{ $nilaix->kodenilai }}</td>
				<td></td>
				<td></td>
				<td></td>
				<td>{{ Form::label('nama_kelas', 'Kelas') }}</td>
				<td>: {{ $nilaix->kelasx->nama_kelas }}</td>
			</tr>
			<tr>
				<td>{{ Form::label('nama_lengkap', 'Pengajar') }}</td>
				<td>: {{ $nilaix->gurux->nama_lengkap }}</td>
				<td></td>
				<td></td>
				<td></td>
				<td>{{ Form::label('semester', 'Semester') }}</td>
				<td>: {{ $nilaix->mapelx->semester }}</td>
			</tr>
			<tr>
				<td>{{ Form::label('nama_mapel', 'Mata Pelajaran') }}</td>
				<td>: {{ $nilaix->mapelx->nama_mapel }}</td>
				<td></td>
				<td></td>
				<td></td>
				<td>{{ Form::label('tahun_ajaran', 'Tahun Ajaran') }}</td>
				<td>: {{ $nilaix->mapelx->tahun_ajaran }}</td>
			</tr>
		</table>

		<br />

		<table class="bordered">
			<thead align="center">
				<tr>
					<th width="50px">#</th>
					<th width="150px">NIS</th>
					<th>Nama</th>
					<th width="100px">Tugas</th>
					<th width="100px">Ulangan</th>
					<th width="100px">UTS</th>
					<th width="100px">UAS</th>
					<th width="100px">Hasil Akhir</th>
				</tr>
			</thead>

			<tbody>
				<?php
					$no = 1;
				?>
				@foreach($detailnilaix as $detailnilai)
				<tr>
					<td align="center">{{ $no }}</td>
					<td>{{ $detailnilai->siswax->nis }}</td>
					<td>{{ $detailnilai->siswax->nama_lengkap }}</td>
					<td align="center">{{ $detailnilai->nilai_tugas }}</td>
					<td align="center">{{ $detailnilai->nilai_ulangan }}</td>
					<td align="center">{{ $detailnilai->nilai_uts }}</td>
					<td align="center">{{ $detailnilai->nilai_uas }}</td>
					<td align="center">{{ $detailnilai->nilai_akhir }}</td>
				</tr>
				<?php
					$no++;
				?>
				@endforeach
			</tbody>
		</table>
	</div>

	@include('layouts._scripts')
</body>

</html>