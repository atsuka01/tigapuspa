@extends('layouts.dashboard')

@section('utama')
    <div class="col-md-7">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Apotik</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <th>Kode</th>
                        <th>Nama</th>
                    </thead>
                    <tbody>
                        @foreach ($apotik as $v)
                            <tr>
                                <td>{{$v->kode_apotik}}</td>
                                <td>{{$v->nama_apotik}}</td>
                                <td>
                                    <a href="{{route('aptoik.stok', $v->id)}}"><i class="icon wb-add-file"></i></a>
                                    
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">Tambah Apotik</h3>
            </div>
            <div class="panel-body">
            {!! Form::open(array('url'=>'apotik')) !!}
                <table class="table">
                    <tr>
                        <td><b>Nama Apotik</b>
                        <input type="text" class="form-control" name="nama_apotik">
                        </td>
                    </tr>
                    <tr>
                        <td><b>Kode Apotik</b>
                            <input type="text" class="form-control" name="kode_apotik">
                        </td>
                        
                    </tr>
                    <tr>
                            <td><b>Tlp Apotik</b>
                                <input type="text" class="form-control" name="tlp_apotik">
                            </td>
                    </tr>
                    <tr>
                       
                        <td>
                                <b>Alamat</b>
                                <textarea  id="" cols="5" rows="5" class="form-control" name="alamat_apotik">
                                    
                                </textarea>
                            </td>
                    </tr>
                    <tr>
                        <td>
                            {!! Form::submit('Tambah', ['class'=>'btn btn-info']) !!}
                        </td>
                    </tr>
                </table>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection