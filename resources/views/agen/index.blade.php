@extends('layouts.dashboard')
@section('utama')
    <div class="col-md-7">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Data Agen</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <th>Kode Agen</th>
                        <th>Nama</th>
                        <th>No Handpone</th>
                    </thead>
                    <tbody>
                        @foreach ($agen as $v)
                            <tr>
                                <td>{{$v->kode_agen}}</td>
                                <td>{{$v->nama_agen}}</td>
                                <td>{{$v->notlp_agen}}</td>
                                <td>
                                    <a href="{{route('agen.stok', $v->id)}}"> <i class="icon wb-folder"></i> </a>
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
                <h3 class="panel-title">Tamba Agen</h3>
            </div>
            <div class="panel-body">
            {!! Form::open(array('url'=>'agen/store')) !!}
                <table class="table">
                     <tr>
                         <td><b>kode Agen</b>
                            <input type="text" name="kode_agen" id="" class="form-control">
                        </td>
                     </tr>
                     <tr>
                            <td><b>Nama</b>
                               <input type="text" name="nama_agen" id="" class="form-control">
                           </td>
                        </tr>
                        <tr>
                                <td><b>Nohandpone</b>
                                   <input type="text" name="notlp_agen" id="" class="form-control">
                               </td>
                            </tr>
                            <tr>
                                    <td><b>Alamat</b>
                                       <textarea name="alamat_agen" id="" cols="30" class="form-control" rows="5"></textarea>
                                   </td>
                                </tr>
                    <tr>
                        <td>{!! Form::submit('Tambah', ['class'=>'btn btn-success']) !!}</td>
                    </tr>
                </table>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection