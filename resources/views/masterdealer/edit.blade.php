@extends('layouts.dashboard')
@section('utama')
    <div class="col-md-3"></div>
    <div class="col-md-6">
            @if ($errors->any())
            <div class="alert alert-google-plus">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        
        @endif
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Master Dealer</h3>
            </div>
            
            <div class="panel-body">
                {!! Form::model($md, array('url'=>'md/'. $md->id, 'method'=>'put')) !!}
                    <table class="table">
                        <tr>
                            <td>Kode MD: {!! Form::text('kode_md', null, ['class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <td>
                                Nama : {!! Form::text('nama_md', null, ['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                No Handpone : {!! Form::text('no_md', null, ['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Alamat: {!! Form::textarea('alamat_md', null, ['class'=>'form-control', 'cols'=>5, 'rows'=>2]) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::submit('Update', ['class'=>'btn btn-info']) !!}
                                {!! link_to('md', 'Kembali', ['class'=>'btn btn-danger']) !!}
                            </td>
                        </tr>
                    </table>
                {!! Form::close() !!}
                
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
@endsection