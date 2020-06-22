@extends('layouts.dashboard')
@section('utama')
    <div class="col-md-7">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Master Dealer</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <th><b>ID</b></th>
                        <th><b>Nama</b></th>
                        <th><b>Kode MD</b></th>
                        <td colspan="3" align="center"><b>Menu</b></td>
                    </thead>
                    <tbody>
                        @foreach ($md as $v)
                            <tr>
                                <td>{{$v->id}}</td>
                                <td>{{$v->nama_md}}</td>
                                <td>{{$v->kode_md}}</td>
                               
                                <td>
                                    <a href="{{route('md.edit', $v->id)}}" class="btn btn-light">
                                        <i class="icon wb-desktop"></i>
                                    </a>
                                </td>
                                <td>
                                    {!! Form::open(array('method'=>'delete', 'url'=>'md/'.$v->id)) !!}
                                        <button type="submit" class="btn btn-light"> <i class="icon wb-trash"></i> </button>
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    <a href="{{route('md.show', $v->id)}}" class="btn btn-light">
                                        <i class="icon wb-user"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('md.stok', $v->id)}}" class="btn btn-light">
                                        <i class="icon wb-folder"></i> 
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="panel panel-danger">
            <div class="panel-heading">
                    @if ($errors->any())
                    <div class="alert alert-google-plus">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                
                @endif
                <h3 class="panel-title">Tambah Data Master Dealer</h3>
            </div>
            <div class="panel-body">
           {!! Form::open(array('route'=>'md.store')) !!}
                <table class="table">
                    <tr>
                        <td>
                            <p>Kode MD:</p>
                            <input type="text" name="kode_md" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Nama:</p>
                            <input type="text" name="nama_md" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>No Handpone:</p>
                            <input type="text" name="no_md" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Alamat:</p>
                            {!! Form::textarea('alamat_md', '', ['class'=>'form-control', 'cols'=>5, 'rows'=>3]) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {!! Form::submit('Tamabah', ['class'=>'btn btn-info']) !!}
                            {!! link_to('home_admin', 'Kembali', ['class'=>'btn btn-danger']) !!}
                        </td>
                    </tr>
                </table>
               {!! Form::close() !!}
               
            </div>
        </div>
    </div>
    <div class="col-md0"></div>
@endsection