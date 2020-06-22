@extends('layouts.dashboard')
@section('utama')

    <div class="col-md-12">
            {!! link_to('pabrik/create', 'Tambah Produk', ['class'=>'btn btn-success']) !!}
            <hr>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Produksi</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                      
                        <th>Nama Produk</th>
                        <th>Jenis Produk</th>
                        <th>jumlah Stok</th>
                        <th>Menu</th>
                    </thead>
                    <tbody>
                        @foreach ($produksi as $v)
                            <tr>
                               
                                <td>{{$v->nama_produk}}</td>
                                <td>{{$v->jenis_produk}}</td>
                                <td>{{$v->jumlah_stok}}</td>
                                <td colspan="2">
                                    <a href="{{route('pabrik.edit', $v->id)}}" class="btn btn-success">
                                        <i class="icon wb-edit"></i>
                                    </a>
                                    <a href="{{route('pabrik.show', $v->id)}}" class="btn btn-primary">
                                        <i class="icon wb-table"></i>
                                    </a>
                                    {!! Form::open(array('method'=>'delete', 'url'=>'pabrik/'.$v->id)) !!}
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