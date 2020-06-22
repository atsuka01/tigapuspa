@extends('layouts.dashboard')
@section('utama')
 <div class="col-md-8">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">Retur</h3>    
        </div>
        <div class="panel-body">
        {!! Form::open(array('url'=>'reseler/updateretur')) !!}
            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td>{{$rs->nama_customer}}</td>    
                </tr>
                <tr>
                    <td>No Tlp</td>
                    <td>{{$rs->notlp_customer}}</td>    
                </tr>
                <tr>
                    <td>
                        Keterangan
                        <textarea name="" id="" cols="30" rows="10" class="form-control" name="keterangan">
                                    
                        </textarea>    
                    </td>    
                </tr>    
            </table>
            <table class="table table-bordered">
                <tr>
                    <th>ID Produk</th>
                    <th>Jumlah stok</th>
                    <th>Kode Produk</th>
                    <th>Produk</th>
                    <th>Batch</th>
                    <th>QTY</th>    
                </tr>
                
                @foreach ($penjualanrs as $v)
                    <tr>
                
                        <td><input type="text" name="idproduk[]" id="" class="form-control" value="{{$v->id_produk}}"></td>
                        <td><input type="text" name="stok[]" id="" class="form-control" value="{{$v->jumlah_stok}}"></td>
                         <td><input type="text" name="kodeproduk[]" id="" class="form-control" value="{{$v->kodeproduk}}"></td>
                         <td><input type="text" name="produk[]" id="" class="form-control" value="{{$v->produk}}"></td>
                         <td><input type="text" name="batch[]" id="" class="form-control" value="{{$v->batch}}"></td>
                         <td><input type="text" name="qty[]" class="form-control" value="{{$v->qty}}"></td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4">
                        <button type="submit" class="btn btn-warning">Reset</button>
                        {!! link_to('home_admin', 'Kembali', ['class'=>'btn btn-dark']) !!}
                    </td>
                </tr>
            </table>
        {!! Form::close() !!}    
        </div>    
    </div>     
</div>   
@endsection