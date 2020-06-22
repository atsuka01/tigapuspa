@extends('layouts.dashboard')
@section('utama')
    <div class="col-md-12">
        {!! link_to('kantor/create', 'Tambah', ['class'=>'btn btn-primary']) !!}
        <hr>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Kantor</h3>
            </div>
            <div class="panel-body">
                <table class="table tab-content">
                    <thead>
                        <th>ID</th>
                        <th>Produk</th>
                        <th>Jenis</th>
                        <th>harga</th>
                        <th>Kode Produk</th>
                        <th>Kategori</th>
                        <th>stok</th>
                    </thead>
                    <tbody>
                        @foreach ($kantor as $v)
                            <tr>
                                <td>{{$v->id}}</td>
                                <td>{{$v->nama_produk}}</td>
                                <td>{{$v->jenis_produk}}</td>
                                <td>Rp. {{number_format($v->harga_produk)}}</td>
                                <td>{{$v->kode_produk}}</td>
                                <td>{{$v->kategori}}</td>
                                <td>{{$v->jumlah_stok}}</td>
                                <td>
                                    <a href="{{route('kantor.edit',$v->id)}}" class="btn btn-success">
                                        <i class="icon wb-edit"></i>
                                    </a>
                                    {!! Form::open(array('method'=>'delete', 'url'=>'kantor/'.$v->id)) !!}
                                    <button type="submit" class="btn btn-danger"> <i class="icon wb-trash"></i> </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection