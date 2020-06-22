@extends('layouts.dashboard')
@section('utama')
    
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Peking/Espedisi</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>nama</th>
                            <th>Menu</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Paking/Espedisi</h3>
                </div>
                <div class="panel-body">
                <form action="{{route('ap.store')}}" method="post">
                    <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td><input type="text" class="form-control" name="nama"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                {!! Form::submit('proses',['class'=>'btn btn-primary']) !!}
                                {!! link_to('home_admin', 'Kembali', ['class'=>'btn btn-success']) !!}
                            </td>
                        </tr>
                    </table>
                </form>
                    
                </div>
            </div>
        </div>
    
@endsection