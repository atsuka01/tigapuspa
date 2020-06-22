@extends('layouts.dashboard')
<script src="http://code.jquery.com/jquery-2.1.4.js"></script> 
@section('utama')
    <div class="col-md-12">
        <div class="panel panel-primary">
           <div class="panel-heading">
                <h3 class="panel-title">Edit Transaksi RS</h3>
            </div> 
            <div class="panel-body">
            {!! Form::model($rs,array('url'=>'reseler/'.$rs->id, 'method'=>'put')) !!}
                <table class="table table-bordered">
                <tr>
                        <td>Nomor Invoice</td>
                        <td><input type="text" class="form-control" name="nomor_invoice" value="{{$rs->nomor_invoice}}"></td>
                    </tr>
                    <tr>
                        <td>Kode CS</td>
                        <td><input type="text" class="form-control" name="kode_cs" value="{{$rs->kode_cs}}"></td>
                    </tr>
                    <tr>
                        <td>Kode MD</td>
                    <td><input type="text" class="form-control" name="kode_md" value="{{$rs->kode_md}}"></td>
                    </tr>
                    <tr>
                        <td>Kode RS</td>
                    <td><input type="text" class="form-control" name="kode_rs" value="{{$rs->kode_rs}}"></td>
                    </tr>
                <tr>
                        <td>Tanggal</td>
                        <td><input type="text" class="form-control" name="tanggal" value="{{$rs->tanggal}}"></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td><input type="text" class="form-control" name="nama_customer" value="{{$rs->nama_customer}}"></td>
                    </tr>
                    <tr>
                        <td>No Handpone</td>
                        <td><input type="text" class="form-control" name="notlp_customer" value="{{$rs->notlp_customer}}"></td>
                    </tr>
                    <tr>
                        <td>Kota</td>
                        <td><input type="text" class="form-control" name="kota_customer" value="{{$rs->kota_customer}}"></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><input type="textarea" class="form-control" name="alamat_customer" value="{{$rs->alamat_customer}}"></td>
                    </tr>
                    
                </table>
                <p>Edit Pesanan</p>
                <table class="table table-bordered">
                        <thead>
                            <tr align="center">
                                
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Dis</th>
                                <th>ED</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($penjualanrs as $v)
                              <tr>
                                  <td><input type="text" name="kodeproduk[]" value="{{$v->kodeproduk}}" class="form-control"></td>
                                  <td><input type="text" name="qty[]" value="{{$v->qty}}" class="form-control"></td>
                                  <td><input type="text" name="dis" value="{{$v->dis}}" class="form-control"></td>
                                  <td><input type="text" name="ed" value="{{$v->batch}}" class="form-control"></td>
                              </tr>
                          @endforeach

                        </tbody>
                    </table>   
                    <tr>
                        <td>{!! Form::submit('Edit', ['class'=>'btn btn-info']) !!}</td>
                        <td>{!! link_to('home_admin', 'Kembali', ['class'=>'btn btn-danger']) !!}</td>
                    </tr>
            {!! Form::close() !!}
            </div>
        </div>    
    </div>
   
    </div> 
    {{-- <table border="0" cellpadding="5" align="center">
            <form action="" method="post">
               <tr>
                  <td>Harga :</td> 
                  <td><input type="text" name="harga" id="harga" ></td>
               </tr> 
               <tr>
                  <td>Diskon :</td> 
                  <td><input type="text" name="diskon" id="diskon" ></td>
               </tr>
               <tr>
                  <td>Yang Harus Dibayar :</td> 
                  <td><input type="text" name="totBayar" id="totBayar" disabled /></td>
               </tr>  </form>
          </table> 
    <script type="text/javascript">
        $(document).ready(function(){
            $("#qty").keyup(function(){
              var harga  = parseInt($("#harga").val());
              var qty  = parseInt($("#qty").val());
              var total = harga * qty;
              $("#totBayar").val(total);
            });
        }); --}}
      </script> 
   
@endsection