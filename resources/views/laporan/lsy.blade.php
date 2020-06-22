@extends('layouts.dashboard')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
  .dtHorizontalExampleWrapper {
max-width: 600px;
margin: 0 auto;
}
#dtHorizontalExample th, td {
white-space: nowrap;
}

table.dataTable thead .sorting:after,
table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:after,
table.dataTable thead .sorting_desc_disabled:before {
bottom: .5em;
}
</style>
@section('utama')

<div class="col-md-12">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Laporan LSY</h3>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <button class="btn btn-primary" onclick="exportTableToCSV('members.csv')">Export <i class="icon wb-download"></i> </button>
      <table class="table table-bordered">
        <tr align="center">
          <th rowspan="2">NO</th>
          <th rowspan="2">TANGGAL</th>
          <th rowspan="2">NO INVOIS</th>
          <th rowspan="2">NAMA</th>
          <th rowspan="2">ALAMAT</th>
          <th rowspan="2"></th>
          <th rowspan="2">TELEPON</th>
          <th rowspan="2">KODE MD/RS</th>
          <th colspan="2">PRODUK</th>
          <th rowspan="2">DISC%</th>
          <th rowspan="2">JUMLAH</th>
          <th rowspan="2">CS</th>
          <th rowspan="2">PACKING/EKSPEDISI</th>
          <th rowspan="2">KETERANGAN</th>
        </tr>
        <tr align="center">
          <td >LSY S</td>
          <td >LSY K</td>
        </tr>
        @foreach ($laporan as $v)
        <tr align="center">            
            <td>{{$v->no}}</td>
            <td>{{$v->tanggal}}</td>
            <td >{{$v->nomor_invois}}</td>
            <td >{{$v->nama}}</td>
            <td >{{$v->alamat}}</td>
            <td>{{$v->kota}}</td>
            <td>{{$v->telepon}}</td>
            <td>{{$v->kode_md_rs}}</td>
           <td>{{$v->laporanitemlsy->where('produk', 'LSY_S')->min('qtyin')}}</td>
           <td>{{$v->laporanitemlsy->where('produk', 'LSY_K')->min('qtyin')}}</td>
           <td>{{$v->disc}}%</td>
           <td>Rp.{{number_format($v->jumlah)}}</td>
           <td>{{$v->cs}}</td>
           <td>{{$v->paking}}</td>
           <td>{{$v->keterangan}}</td>
           </tr>
   
        @endforeach
        <tfoot>
          <tr class="hover">
            <td>PRODUK</td>
            <td>QTY</td>
            <td>JUMLAH</td>
          </tr>
           <tr>
             <td>LSY S</td>
             <td>{{$laporanitemlsy->where('produk', 'LSY_S')->sum('qtyin')}}</td>
             <td>Rp.{{number_format($laporanitemlsy->where('produk', 'LSY_S')->sum('jumlah'))}}</td>
           </tr>
           <tr>
            <td>LSY K</td>
            <td>{{$laporanitemlsy->where('produk', 'LSY_K')->sum('qtyin')}}</td>
            <td>Rp.{{number_format($laporanitemlsy->where('produk', 'LSY_K')->sum('jumlah'))}}</td>
          </tr>
          <tr>
            <td colspan="2">TOTAL</td>
            <td>Rp.{{number_format($laporan->sum('jumlah'))}}</td>
           </tr>
        </tfoot>
      </table>
     
    </div>
   
  </div>
</div>
</div>
<script>
  function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Hide download link
    downloadLink.style.display = "none";

    // Add the link to DOM
    document.body.appendChild(downloadLink);

    // Click download link
    downloadLink.click();
}

function exportTableToCSV(filename) {
    var csv = [];
	var rows = document.querySelectorAll("table tr");
	
    for (var i = 0; i < rows.length; i++) {
		var row = [], cols = rows[i].querySelectorAll("td, th");
		
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        
		csv.push(row.join(","));		
	}

    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}
</script>
@endsection