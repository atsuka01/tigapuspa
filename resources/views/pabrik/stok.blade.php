@extends('layouts.dashboard')
@section('utama')
<div class="col-md-12">
        @if ($errors->any())
        <div class="alert alert-google-plus">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        
        @endif
</div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Detail Produk</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                           <th><b>Nama Produk</b>:</th>
                            <td>{{$produksi->nama_produk}}</td>
                        </tr>
                        <tr>
                            <th><b>Jenis Produk</b>:</th>
                             <td>{{$produksi->jenis_produk}}</td>
                         </tr>
                         <tr>
                             <th><b>Kode Produk</b></th>
                             <td>{{$produksi->kode_produk}}</td>
                         </tr>
                         <tr>
                             <td><b>ID Produksi</b></td>
                             <td>{{$produksi->id_produk}}</td>
                         </tr>
                         <tr>
                             <td>UserId</td>
                             <td>{{$produksi->id}}</td>
                         </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Produksi</h3>
                </div>
                <div class="panel-body">
                {!! Form::open(array('url'=>'jumlahproduksi')) !!}
                {!! Form::hidden('user_id', $produksi->id) !!}
                {!! Form::hidden('id_produk', $produksi->id_produk) !!}
                {!! Form::hidden('kode_produk', $produksi->kode_produk) !!}
                {!! Form::hidden('jenis_produk', $produksi->jenis_produk) !!}
                    <table class="table">
                        <tr>
                            <td>
                                Nomer NB:
                                <input type="text" name="kode_nb" class="form-control">
                            </td>
                            <td>
                                Nomer ED:
                                <input type="text" name="kode_ed" class="form-control">
                            </td>
                            <td>Jumlah Produksi:
                                <input type="text" name="jumlah_produksi" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="btn btn-success">Tambah</button>
                                {!! link_to('pabrik', 'Kembali', ['class'=>'btn btn-danger']) !!}
                            </td>
                        </tr>
                    </table>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-dark">
                <div class="panel-heading">
                    <h3 class="panel-title">Penyimpanan</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-borderless">
                        <thead align="center">
                            <th>Tanggal</th>
                            <th>Jumlah Produksi</th>
                            <th>Kode ED</th>
                            <th>Kode NB</th>
                            
                            
                        </thead>
                        <tbody align="center">
                         @foreach ($jumlah_produksi as $v)
                             <tr>
                                 <td>{{$v->created_at}}</td>
                                 <td>{{$v->jumlah_produksi}}</td>
                                 <td>{{$v->kode_ed}}</td>
                                 <td>{{$v->kode_nb}}</td>
                             </tr>
                         @endforeach
                        </tbody>
                        <tr>
                            <td>{{$jumlah_produksi->links()}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
@endsection