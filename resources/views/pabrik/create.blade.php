@extends('layouts.dashboard')
@section('utama')
    
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Produk</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('url'=>'produksi')) !!}
                    <table class="table">
                        <tr>
                            <td>Nama Produk</td>
                            <td><input type="text" name="nama_produk" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Jenis Produk</td>
                            <td>
                                    <select name="jenis_produk" class="form-control" id="">
                                            <option value="serbuk">Serbuk</option>
                                            <option value="kapsul">Kapsul</option>
                                            <option value="tablet">Tablet</option>
                                    </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Kode Produk</td>
                            <td><input type="text" name="kode_produk" class="form-control"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="btn btn-success">Tambah</button>
                                {!! link_to('pabrik', 'Kembali', ['class'=> ' btn btn-danger']) !!}
                            </td>
                        </tr>
                    </table>
                    {!! Form::close() !!}
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
            </div>
        </div>
        <div class="col-md-3"></div>
    
@endsection