@extends('layouts.dashboard')
@section('utama')
    <div class="col-md-4 ">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Detail Master Dealer</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>Nama</td>
                        <td align="left">: {{$md->nama_md}}</td>
                    </tr>
                    <tr>
                        <td>Kode MD</td>
                        <td align="left">: {{$md->kode_md}}</td>
                    </tr>
                    <tr>
                        <td>No Handpone</td>
                        <td align="left">: {{$md->no_md}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-8">
            @if ($errors->any())
            <div class="alert alert-google-plus">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        
        @endif
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Create Reseler</h3>
            </div>
            <div class="panel-body">
            {!! Form::open(array('url'=>'md/rs')) !!}
            {!! Form::hidden('id_md', $md->id) !!}
                <table class="table">
                    <tr>
                        <td>
                            <p>Nama:</p>
                            <input type="text" name="nama_rs" class="form-control">
                        </td>
                        <td>
                            <p>Kode Rs:</p>
                            <input type="text" class="form-control" name="kode_rs">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Alamat:</p>
                            {!! Form::textarea('alamat_rs', '', ['class'=>'form-control', 'cols'=>20, 'rows'=>2]) !!}
                        </td>
                        <td>
                            <p>No Handpone</p>
                            <input type="text" class="form-control" name="no_rs">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {!! Form::submit('Proses', ['class'=>'btn btn-primary']) !!}
                            {!! link_to('md', 'Kembali', ['class'=>'btn btn-danger']) !!}
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
                <h3 class="panel-title">Data Reseler</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <th>Kode Reseler</th>
                        <th>Nama</th>
                        <th>No Handpone</th>
                        
                    </thead>
                    <tbody>
                    @foreach ($reseler as $v)
                        <tr>
                            <td>{{$v->kode_rs}}</td>
                            <td>{{$v->nama_rs}}</td>
                            <td>{{$v->no_rs}}</td>
                        </tr>
                     @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection