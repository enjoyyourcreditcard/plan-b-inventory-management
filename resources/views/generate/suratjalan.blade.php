<!DOCTYPE html>
<html>

<head>
	<title>{{$grf->surat_jalan}}</title>
</head>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
{{--
<link rel="preconnect" href="https://fonts.googleapis.com"> --}}
{{--
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
{{--
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> --}}

<style>
	.tabel_data,
	.tabel_data th,
	.tabel_data td {
		font-size: 12px;
		border: 1px solid black;
		border-collapse: collapse;
	}

	.tabel_data {
		width: 100%;

	}
</style>

<body style="font-family: 'Roboto', sans-serif;">
	<h4 style="text-align: center;padding-bottom:0px;margin-bottom:0px;
	">SURAT JALAN</h4>
	<p style="text-align: center; margin-top:0px;padding-top:1px;font-size:12px;padding-bottom:15px">No: {{$grf->surat_jalan}}</p>
	<table style="text-align: left;">
		<tr>
			<th style="text-align: left; font-size:13px">No Grf:</th>
			<td> : <span style="font-size:13px">{{$grf->grf_code}}</span></td>
		</tr>
		<tr>
			<th style="text-align: left; font-size:13px">Tgl Diterbitkan</th>
			<td> : <span style="font-size:13px">{{$grf->delivery_approved_date}}</span></td>

		</tr>
		<tr>
			<th style="text-align: left; font-size:13px">Gudang Asal</th>
			<td> : <span style="font-size:13px">{{$grf->warehouse->name}}</span></td>
		</tr>
		<tr>
			<th style="text-align: left; font-size:13px">Tujuan / Alamat</th>
			<td> : <span style="font-size:13px">Instalasi baru</span></td>

		</tr>
		<br />
		<tr>
			<th style="text-align: left; font-size:13px">PIC / Team Leader</th>
			<td> : <span style="font-size:13px">{{$grf->user->name}}</span></td>

		</tr>
		<tr>
			<th style="text-align: left; font-size:13px">Tim</th>
			<td> : <span style="font-size:13px">-</span></td>

		</tr>
	</table>

	<table class="tabel_data" style="margin-top: 20px">
		<tr>
			<th>No</th>
			{{-- <th>WH CODE</th> --}}
			<th>SEGMENT</th>
			<th>DESKRIPSI</th>
			<th>JUMLAH</th>
			<th>SATUAN</th>
			<th>REMARKS</th>
		</tr>

		@foreach ($request_form as $item)
		<tr>
			<th>{{$loop->iteration}}</th>
			<th>{{$item->segment->name}}</th>
			<th>{{$item->part->name}}</th>
			<th>{{$item->quantity}}</th>
			<th>{{$item->part->uom}}</th>
			<th>Good</th>
		</tr>
		@endforeach
		{{-- <tr>
			<th colspan="2">S</th>
			<th colspan="2">SATUAN</th>
			<th colspan="2">REMARKS</th>
		</tr> --}}
	</table>
</body>

</html>