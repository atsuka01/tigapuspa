@extends('layouts.dashboard')
@section('utama')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Laporan </h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <th rowspan="2">Tanggal</th>
                        <th rowspan="2">Nama</th>
                        <th rowspan="2">Alamat</th>
                        <th rowspan="2"></th>
                        <th rowspan="2">Telepon</th>
                        <th rowspan="2">Kode MD/RS</th>
                        <th colspan="3">Produk</th>
                    </tr>
                    <tr>
                        @foreach ($laporan as $v)
                            <td>{{$v->produk}}</td>
                        @endforeach
                    </tr>
                    {{-- <thead align="center">
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th></th>
                        <th>Telepon</th>
                        <th>Kode MD/RS</th>
                        <th colspan="6">Produk/QTY/Diesc</th>
                        
                        <th>Jumlah</th>
                        <th>Cs</th>
                        <th>Packing/Ekspedisi</th>
                        <th>Keterangan</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody align="center" >
                      @foreach ($costumer as $v)
                          <tr>
                              <td>{{$v->tanggal}}</td>
                              <td>{{$v->nama}}</td>
                              <td>{{$v->alamat}}</td>
                              <td>{{$v->kota}}</td>
                              <td>{{$v->telepon}}</td>
                              <td>{{$v->kode_md_rs}}</td>
                              @foreach ($laporan as $item)
                                <td>{{$item->produk}}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{$item->diskon}}%</td>
                              @endforeach
                              <td>Rp.{{number_format($v->jumlah)}}</td>
                              <td>{{$v->cs}}</td>
                              <td>{{$v->paking_ekpedisi }}</td>
                          </tr>
                      @endforeach
                      </tbody> --}}
                </table>
            </div>
        </div>
    </div>
@endsection