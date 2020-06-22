@extends('layouts.dashboard')
@section('utama')
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Toko</h3> 
            </div>
            <div class="panel-body">
                {!! Form::model($toko, array('url'=>'toko/'.$toko->id, 'method'=>'put')) !!}
                    <table class="table">
                        <tr>
                            <td>
                                Kode Cs :
                                {!! Form::text('kode_cs', null, ['class'=>'form-control']) !!}
                            </td>
                            <td>
                                Nama Toko :
                                {!! Form::text('nama_toko', null, ['class'=>'form-control']) !!}
                            </td>
                            <td>
                                Jenis Toko :
                                {!! Form::text('jenis_toko', null, ['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                {!! link_to('toko', 'Kembali', ['class'=>'btn btn-danger']) !!}
                            </td>
                        </tr>
                    </table>
                {!! Form::close() !!}
                </div>
        </div>
       
    </div>
@endsection