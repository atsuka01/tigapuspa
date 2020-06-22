@extends('layouts.dashboard')
@section('utama')
<div class="col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Data Costumer Service</h3>
        </div>
        <div class="panel-body">
            <table class="table table-light">
                <thead>
                    <th>id</th>
                    <th>Nama</th>
                    <th>Kode CS</th>
                    <th>Nomer Cs</th>
                    <td ><b>Delete</b></td>
                </thead>
                <tbody>
                    @foreach ($cs as $v)
                       <tr>
                            <td>{{$v->id}}</td>
                            <td>{{$v->nama_cs}}</td>   
                            <td>{{$v->kode_cs}}</td>
                            <td>{{$v->tlp_cs}}</td>
                            <td >
                                
                                {!! Form::open(array('method'=>'delete', 'url'=>'cs/'.$v->id)) !!}
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
<div class="col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Create Costumer Service</h3>
        </div>
        <div class="panel-body">
        {!! Form::open(array('url'=>'cs')) !!}
            <table class="table">
                <tr>
                    <td>
                        <p>Nama:</p>
                        <input type="text" name="nama_cs" class="form-control" placeholder="masukan nama costumer">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Kode cs:</p>
                        <input type="text" name="kode_cs" class="form-control" placeholder="buat kode costumer service">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Nomer Handpone</p>
                        <input type="text" name="tlp_cs" class="form-control" >
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        {!! Form::submit('proses', ['class'=>'btn btn-success']) !!}
                        {!! link_to('home_admin', 'kembali', ['class'=>'btn btn-danger']) !!}
                    </td>
                </tr>
            </table>
    {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection