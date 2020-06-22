@extends('layouts.dashboard')
@section('utama')

 
        <div class="col-md-12">
            <div class="panel panel-primary">
                    
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Produk</h3>
                </div>
                <div class="panel-body">
                    {!! Form::model($kantor, array('url'=>'kantor/'.$kantor->id,  'method'=>'put')) !!}
                    <table class="table">
                        <tr>
                            <td>Nama Produk</td>
                            <td>
                                {!! Form::text('nama_produk', null, ['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                                <td>Jenis Produk</td>
                                <td>
                                    {!! Form::text('jenis_produk', null, ['class'=>'form-control']) !!}
                                </td>
                            </tr>
                        <tr>
                            <td>Harga Produk</td>
                            <td>
                                {!! Form::text('harga_produk', null, ['class'=>'form-control']) !!}
                            </td>
                         </tr>
                         <tr>
                                <td>Kode ED</td>
                                <td>
                                    {!! Form::text('kode_ed', null, ['class'=>'form-control']) !!}
                                </td>
                             </tr>
                         <tr>
                                <tr>
                                        <td>Jumlah Stok</td>
                                        <td>
                                            {!! Form::text('jumlah_stok', null, ['class'=>'form-control']) !!}
                                        </td>
                                     </tr>
                                <tr>
                                    <td>kode MB</td>
                                     <td>
                                         {!! Form::text('kode_mb', null, ['class'=>'form-control']) !!}
                                     </td>
                                     </tr>
                             <td colspan="2">
                                 <button type="submit" class="btn btn-success">Edit</button>
                                 {!! link_to('kantor', 'Kembali', ['class'=>'btn btn-info']) !!}
                             </td>
                         </tr>
                    </table>
                    {!! Form::close() !!}
                    @if ($errors->any())
                    <div class="alert alert-danger">
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
     
    
@endsection