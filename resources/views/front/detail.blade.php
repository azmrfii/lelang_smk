@extends('front.style')
@section('content')
<section class="padding-large" style="background-color: white">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
				  <h3 class="card-title">Riwayat Penawaran : {{ Auth::user()->username }}</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
					  <th>NIK</th>
					  <th>Username</th>
					  <th>Barang Lelang</th>
					  <th>Harga Awal</th>
					  <th>Harga Penawaran</th>
					</tr>
					</thead>
					<tbody>
					  @foreach ($penawarans as $p)
					  <tr>
						  <td>{{ @$p->masyarakat->nik }}</td>
						  <td>{{ @$p->masyarakat->username }}</td>
                          {{-- @foreach ($lelang as $l)       --}}
						  <td>{{ @$p->lelang->barang->nama_barang }}</td>
						  <td>{{ @$p->lelang->barang->harga_awal }}</td>
                          {{-- @endforeach --}}
						  <td>{{ @$p->harga_penawaran }}</td>
					  </tr>
					  @endforeach
					</tbody>
					<tfoot>
					<tr>
					  <th>NIK</th>
					  <th>Username</th>
					  <th>Barang Lelang</th>
					  <th>Harga Awal</th>
					  <th>Harga Penawaran</th>
					</tr>
					</tfoot>
				  </table>
				</div>
				<!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</section>
@endsection