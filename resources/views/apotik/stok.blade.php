@extends('layouts.dashboard')
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script type="text/javascript">

    function totalAmount(){
        var t = 0;
            
        $('.amount').each(function(i,e){
          var amt = $(this).val()-0; 
          t += amt;
        });
        $('.total').val(t);
           
      }
        
       
      $(function () {
        $('.getmoney').change(function(){
          var total = $('.total').html();
          var getmoney = $(this).val();
          var t = getmoney - total;
          $('.backmoney').val(t).toFixed(2);
        });
        
        $('.add').click(function () {
          
          var product = $('.product_id').html();
          var n = ($('.neworderbody tr').length - 0) + 1;
          var tr = '<tr>' + n + 
          '<td><select class="form-control product_id" name="kode_produk[]">' + product + '</select></td>' +
            '<td><input type="text" class="produk form-control" name="produk[]" value="{{ old('email ') }}"></td>' +
          
          '<td><input type="text" class="price form-control" id="harga" name="harga[]"></td>' +
          '<td><input type="text" class=" form-control" id="chDiscount" name="diskon[]"></td>' +
          '<td><input type="text" class=" form-control" id="cBalance" name="qtyin[]"></td>' +
          '<td><input type="text" class="id_produk form-control" name="idp[]"></td>' +
          '<td><input type="text" class="stok2 form-control" name="stok[]"></td>' +
          '<td><input type="text" class="total form-control" id="result" name="jumlah[]"></td>' +
                   
            '<td><p class="btn btn-danger delete"><i class="icon wb-trash"></i></p></tr>';
          $('.neworderbody').append(tr);
        });
        // jualputus
        $('.add_jualputus').click(function () {
          
          var jaualputus1 = $('.jualputus_id').html();
          var n = ($('.jualputus tr').length - 0) + 1;
          var tr = '<tr>' + n + 
            '<td><select class="form-control jualputus_id" name="kode_produk[]">' + jaualputus1 + '</select></td>' +
            '<td><input type="text" class="produk form-control" name="produk[]" value="{{ old('email ') }}"></td>' +
          
            '<td><input type="text" class="price form-control" id="harga" name="harga[]"></td>' +
            '<td><input type="text" class=" form-control" id="chDiscount" name="diskon[]"></td>' +
            '<td><input type="text" class=" form-control" id="cBalance" name="qtyin[]"></td>' +
            '<td><input type="text" class="id_produk form-control" name="idp[]"></td>' +
            '<td><input type="text" class="stok2 form-control" name="stok[]"></td>' +
            '<td><input type="text" class="total form-control" id="result" name="jumlah[]"></td>' +
                   
            '<td><p class="btn btn-danger hapus"><i class="icon wb-trash"></i></p></tr>';
          $('.jualputus').append(tr);
        });
      
        $('.neworderbody').delegate('.delete', 'click', function () {
          $(this).parent().parent().remove();
          totalAmount();
        });
        $('.jualputus').delegate('.hapus', 'click', function () {
          $(this).parent().parent().remove();
          totalAmount();
        });
    
        $('.neworderbody').delegate('.product_id', 'change', function () {
          var tr = $(this).parent().parent();
          var price = tr.find('.product_id option:selected').attr('data-price');
          tr.find('.price').val(price);
    
          var tr = $(this).parent().parent();
          var jenis = tr.find('.product_id option:selected').attr('data-jenis');
          tr.find('.jenis').val(jenis);
    
               
    
          var tr = $(this).parent().parent();
          var kode = tr.find('.product_id option:selected').attr('data-kode');
          tr.find('.kode').val(kode);
    
          var tr = $(this).parent().parent();
          var kategori = tr.find('.product_id option:selected').attr('data-kategori');
          tr.find('.kategori').val(kategori);
    
          var tr = $(this).parent().parent();
          var id_produk = tr.find('.product_id option:selected').attr('data-id_produk');
          tr.find('.id_produk').val(id_produk);
          
          var tr = $(this).parent().parent();
          var stok = tr.find('.product_id option:selected').attr('data-stok');
          tr.find('.stok').val(stok);
    
          var tr = $(this).parent().parent();
          var stok2 = tr.find('.product_id option:selected').attr('data-stok2');
          tr.find('.stok2').val(stok2)
    
          var tr = $(this).parent().parent();
          var id_produk2 = tr.find('.product_id option:selected').attr('data-id_produk2');
          tr.find('.id_produk2').val(id_produk2);
    
          var tr = $(this).parent().parent();
          var harga = tr.find('.product_id option:selected').attr('data-harga');
          tr.find('.harga').val(harga);
    
          var tr = $(this).parent().parent();
          var produk = tr.find('.product_id option:selected').attr('data-produk');
          tr.find('.produk').val(produk);
    
          var produk = tr.find('.produk').val() - 0; 
          var harga = tr.find('.harga').val() - 0; 
          var id_produk2 = tr.find('.id_produk2').val() - 0; 
          var stok2 = tr.find('.stok2').val() - 0;  
          var stok = tr.find('.stok').val() - 0;         
          var id_produk = tr.find('.id_produk').val() - 0;      
          var kategori = tr.find('.kategori').val() - 0;
          var kode = tr.find('.kode').val() - 0;
          var jenis = tr.find('.jenis').val() - 0;
          var qty = tr.find('.qty').val() - 0;
          var dis = tr.find('.dis').val() - 0;
          var price = tr.find('.price').val() - 0;
    
          var total = (qty * price) - ((qty * price * dis)/100);
          tr.find('.amount').val(total);
          totalAmount();
        });
        // jualputus
        $('.jualputus').delegate('.jualputus_id', 'change', function () {
          var tr = $(this).parent().parent();
          var price = tr.find('.jualputus_id option:selected').attr('data-price');
          tr.find('.price').val(price);
    
          var tr = $(this).parent().parent();
          var jenis = tr.find('.jualputus_id option:selected').attr('data-jenis');
          tr.find('.jenis').val(jenis);
    
               
    
          var tr = $(this).parent().parent();
          var kode = tr.find('.jualputus_id option:selected').attr('data-kode');
          tr.find('.kode').val(kode);
    
          var tr = $(this).parent().parent();
          var kategori = tr.find('.jualputus_id option:selected').attr('data-kategori');
          tr.find('.kategori').val(kategori);
    
          var tr = $(this).parent().parent();
          var id_produk = tr.find('.jualputus_id option:selected').attr('data-id_produk');
          tr.find('.id_produk').val(id_produk);
          
          var tr = $(this).parent().parent();
          var stok = tr.find('.jualputus_id option:selected').attr('data-stok');
          tr.find('.stok').val(stok);
    
          var tr = $(this).parent().parent();
          var stok2 = tr.find('.jualputus_id option:selected').attr('data-stok2');
          tr.find('.stok2').val(stok2)
    
          var tr = $(this).parent().parent();
          var id_produk2 = tr.find('.jualputus_id option:selected').attr('data-id_produk2');
          tr.find('.id_produk2').val(id_produk2);
    
          var tr = $(this).parent().parent();
          var harga = tr.find('.jualputus_id option:selected').attr('data-harga');
          tr.find('.harga').val(harga);
    
          var tr = $(this).parent().parent();
          var produk = tr.find('.jualputus_id option:selected').attr('data-produk');
          tr.find('.produk').val(produk);
    
          var produk = tr.find('.produk').val() - 0; 
          var harga = tr.find('.harga').val() - 0; 
          var id_produk2 = tr.find('.id_produk2').val() - 0; 
          var stok2 = tr.find('.stok2').val() - 0;  
          var stok = tr.find('.stok').val() - 0;         
          var id_produk = tr.find('.id_produk').val() - 0;      
          var kategori = tr.find('.kategori').val() - 0;
          var kode = tr.find('.kode').val() - 0;
          var jenis = tr.find('.jenis').val() - 0;
          var qty = tr.find('.qty').val() - 0;
          var dis = tr.find('.dis').val() - 0;
          var price = tr.find('.price').val() - 0;
    
          var total = (qty * price) - ((qty * price * dis)/100);
          tr.find('.amount').val(total);
          totalAmount();
        });
        $('.neworderbody').delegate('.qty , .dis', 'keyup', function () {
          var tr = $(this).parent().parent();
          var qty = tr.find('.qty').val() - 0;
          var dis = tr.find('.dis').val() - 0;
          var price = tr.find('.price').val() - 0;
    
          var total = (qty * price) - ((qty * price * dis)/100);
          tr.find('.amount').val(total);
          totalAmount();
        });
            $('.neworderbody').delegate('.qty , .dis', 'keyup', function () {
          var tr = $(this).parent().parent();
          var qty = tr.find('.qty').val() - 0;
          var dis = tr.find('.dis').val() - 0;
          var price = tr.find('.price').val() - 0;
    
          var total = (qty * price) - ((qty * price * dis)/100);
          tr.find('.amount').val(total);
          totalAmount();
        });
    
            $('#hideshow').on('click', function(event) {
           $('#content').removeClass('hidden');
          $('#content').addClass('show');
                 $('#content').toggle('show');
            });
           
           
      });
    
</script>

  <script type="text/javascript">
    $(document).ready(function(){
      $("#qtyin").keyup(function(){
        var harga  = parseInt($("#harga").val());
        var qtyin  = parseInt($("#qtyin").val());
        var diskon  = parseInt($("#diskon").val());
        var total = harga * qtyin - (harga * qtyin * diskon /100);
        $("#totBayar").val(total);
      });
      $("#qtyin1").keyup(function(){
        var harga1  = parseInt($("#harga1").val());
        var qtyin1  = parseInt($("#qtyin1").val());
        var diskon1  = parseInt($("#diskon1").val());
        var total1 = harga1 * qtyin1 - (harga1 * qtyin1 * diskon1 /100);
        
        $("#totBayar1").val(total1);
      
      });
      $("#qtyin2").keyup(function(){
        var harga2  = parseInt($("#harga2").val());
        var qtyin2  = parseInt($("#qtyin2").val());
        var diskon2  = parseInt($("#diskon2").val());
        var total2 = harga2 * qtyin2 - (harga2 * qtyin2 * diskon2 /100);
        
        $("#totBayar2").val(total2);
      
      });
    });
  </script> 
<script>
    $(document).ready(function(){

    $('.cs').change(function(event){
    var tr = $(this).parent().parent();
    var tampung = tr.find('.select option:selected').attr("data-tampung");
    var tlp_cs  = tr.find('.select option:selected').attr("data-tlpcs");

    $('.tlp_cs').val(tlp_cs);
    $('.tampung').val(tampung); 
    });

    $('.rs').change(function(event){
    var tr = $(this).parent().parent();
    var kode_md = tr.find('.rss option:selected').attr("data-kode_md");
  

    $('.kode_md').val(kode_md);
  
    });
});
</script>
<script>
  $('#btnAddRow').on('click', function(){

  });
$(document).ready(function(){

  $('.cs').change(function(event){
  var tr = $(this).parent().parent();
  var tampung = tr.find('.select option:selected').attr("data-tampung");
  var jenis  = tr.find('.select option:selected').attr("data-jenis");
  var idp  = tr.find('.select option:selected').attr("data-idp");
  var stok  = tr.find('.select option:selected').attr("data-stok");
  var harga  = tr.find('.select option:selected').attr("data-harga");
  
  $('.idp').val(idp);
  $('.stok').val(stok);
  $('.jenis').val(jenis);
  $('.harga').val(harga);
  $('.tampung').val(tampung); 
  });
});
$(document).ready(function(){

$('.kode').change(function(event){
var tr = $(this).parent().parent();
var tampung = tr.find('.select option:selected').attr("data-tampung");
var jenis  = tr.find('.select option:selected').attr("data-jenis");
var harga  = tr.find('.select option:selected').attr("data-harga");

$('.jenis').val(jenis);
$('.harga').val(harga);
$('.tampung').val(tampung); 
});
});
</script>
@section('utama')
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Data Apotik {{$apotik->nama_apotik}}</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>Apotik</td>
                        <td>: {{$apotik->nama_apotik}}</td>
                    </tr>
                    <tr>
                        <td>Kode Apotik</td>
                        <td>: {{$apotik->kode_apotik}}</td>
                    </tr>
                    <tr>
                        <td>No Tlp</td>
                        <td>: {{$apotik->tlp_apotik}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: {{$apotik->alamat_apotik}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Stok Apotik {{$apotik->nama_apotik}}</h3>
            </div>
            <div class="panel-body">
              <table class="table">
                <thead>
                  <th>Kode Produk</th>
                  <th>Produk</th>
                  <th>Jenis Produk</th>
                  <th>Jumlah Stok</th>
                </thead>
                <tbody>
                  @foreach ($tampungstok as $v)
                      <tr>
                        <td>{{$v->kodeproduk}}</td>
                        <td>{{$v->product_name}}</td>
                        <td>{{$v->jenis_produk}}</td>
                        <td>{{$v->jumlah_stok}}</td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Record Stok</h3>
            </div>
            <div class="panel-body">
              <table class="table">
                <thead>
                  <th>Apotik</th>
                  <th>Sj</th>
                  <th>Produk</th>
                  <th>
                    <i class="icon wb-print"></i>
                  </th>
                </thead>
                <tbody>
                  @foreach ($stokapotik as $v)
                      <tr>
                        <td>{{$v->nama_ap}}</td>
                        <td>{{$v->nomor_suratjalan}}</td>
                        <td>{{$v->product_name}}</td>
                        <td>
                          <a href="{{Route('ap.print', $v->id)}}">
                            <i class="icon wb-print"></i>
                          </a>
                        </td>
                      </tr>
                     
                  @endforeach
                  <tr>
                    <td>{{$stokapotik->links()}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-dark">
            <div class="panel-heading">
                <h3 class="panel-title">Record Invois</h3>
            </div>
            <div class="panel-body">
              <table class="table">
                <thead>
                  <th>Kode Apotik</th>
                  <th>Apotik</th>
                  <th>Diskon</th>
                  <th>Nomro Invoice</th>
                  <th>
                    <i class="icon wb-print"></i>
                  </th>
                </thead>
                <tbody>
                  @foreach ($invoisapotik as $v)
                      <tr>
                      <td>{{$v->kode_ap}}</td>
                      <td>{{$v->nama}}</td>
                      <td>{{$v->diskon}} %</td>
                      <td>{{$v->nomorinvois}}</td>
                      <td>
                        <a href="{{route('ap.invois', $v->id)}}">
                          <i class="icon wb-print"></i>
                        </a>
                      </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
    <div class=" col-md-6">
            <!-- Example Center -->
           
                

            <button type="button"  data-target="#examplePositionCenter" data-toggle="modal"
            type="button"  class="btn btn-animate btn-animate-vertical btn-success">
              <span><i class="icon wb-download" aria-hidden="true"></i>Tambah Stok</span>
            </button>
            <button type="button"data-target=".example-modal-lg" data-toggle="modal"
            type="button"  class="btn btn-animate btn-animate-vertical btn-info">
              <span><i class="icon wb-download" aria-hidden="true"></i>Invois Apotik</span>
            </button>
            <button type="button"data-target=".example-modal-as" data-toggle="modal"
            type="button"  class="btn btn-animate btn-animate-vertical btn-dark">
              <span><i class="icon wb-download" aria-hidden="true"></i>Jual Putus</span>
            </button>
            
                <!-- Modal -->
                {{-- modal tamabah stok --}}
                <div class="modal fade" id="examplePositionCenter" aria-hidden="true" aria-labelledby="examplePositionCenter"
                  role="dialog" tabindex="-1">
                  <div class="modal-dialog modal-simple modal-center">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title">Tambah Stok {{$apotik->nama_apotik}}</h4>
                      </div>
                      <div class="modal-body">
                     {!! Form::open(array('url'=>'apotik/tambahstok')) !!}
                        
                       <table class="table cs">
                        <thead>
                           <th>Kode Produk</th>
                           <th>Produk</th>
                           <th>Jenis Produk</th>
                           <th>QTY</th>
                           <th>ED</th>
                           <th>Id</th>
                           <th>Stok</th>
                         
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <select name="kode_produk" id="" class="select form-control">
                                  <option value="">Pilih</option>
                                @foreach ($kantor as $v)
                                   
                              <option data-harga="{{$v->harga_produk}}" data-stok="{{$v->jumlah_stok}}" data-idp="{{$v->id}}" data-stok="{{$v->jumlah_stok}}" data-idp="{{$v->id}}" data-jenis="{{$v->jenis_produk}}" data-tampung="{{$v->nama_produk}}" value="{{$v->kode_produk}}">{{$v->kode_produk}}</option>
                                @endforeach
                              </select>
                            </td>
                            <td><input type="text" class="tampung form-control" name="product_name"></td>
                            <td><input type="text" class="jenis form-control" name="jenis_produk"></td>
                            
                            <td><input type="text" class="form-control" name="qty"></td>
                            <td><input type="text" class="form-control" name="ed"></td>
                            <td><input type="text" class="idp form-control" name="idp"></td>
                            <td><input type="text" class="stok form-control" name="stok"></td>
                            <input type="hidden" class="harga form-control" name="harga">
                            
                            {!! Form::hidden('idap', $apotik->id) !!}
                            {!! Form::hidden('nama_ap', $apotik->nama_apotik) !!}
                            {!! Form::hidden('tlp_ap', $apotik->tlp_apotik) !!}
                            {!! Form::hidden('alamat_ap', $apotik->alamat_apotik) !!}
                            {!! Form::hidden('kode_ap', $apotik->kode_apotik) !!}
                          </tr>
                        </tbody>
                       </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {!! Form::submit('Proses', ['class'=>'btn btn-primary']) !!}
                      </div>
                      {!! Form::close() !!}
                    </div>
                    
                  </div>
                </div>
                <!-- End Modal -->
              </div>
            </div>
            <!-- End Example Center -->
          </div>

          {{-- model tambah invois --}}
          <div class="modal fade example-modal-lg" id="invois" aria-hidden="false" aria-labelledby="exampleFillIn"
          role="dialog" tabindex="-1">
          <div class="modal-dialog modal-simple modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                
                <h4 class="modal-title" id="exampleFillInModalTitle">Invois</h4>
              </div>
              
              
              <div class="modal-body">
              {!! Form::open(array('url'=>'apotik/invois')) !!}
              
              <div class="panel ">
                <div class="panel-body">
                  <table class="cs table ">
                    <tr>
                      <td>Kode MD</td>
                      <td><input type="text" class="form-control" value="{{$apotik->kode_apotik}}" name="kodeap"></td>
                    </tr>
                    <tr>
                      <td>Nama</td>
                      <td><input type="text" class="form-control" value="{{$apotik->nama_apotik}}" name="nama"></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td><input type="text" value="{{$apotik->alamat_apotik}}" class="form-control" name="alamat"></td>
                    </tr>
                  </table>
                </div>
                <input type="hidden" name="nama" value="{{$apotik->nama_apotik}}"> 
                <input type="hidden" name="kode_ap" value="{{$apotik->kode_apotik}}">
                <input type="hidden" name="idap" value="{{$apotik->id}}">
                <table class="table cs">
                  <thead>
                    
                    <th>Kode Produk</th>
                    <th>Produk</th>
                    <th>Harga</th>
                 
                    <th>Diskon</th>
                    <th>Qty</th>
                    <th>ID</th>
                    <th>Stok</th>
                    <th>Jumlah</th>
                    <th>
                      <i class="add icon wb-plus"></i>
                  </th>
                  </thead>
                  <tbody class="neworderbody">
                    <tr>
                     <td>
                        <select name="kode_produk[]" id="" class="product_id form-control">
                            <option value="">Pilih</option>
                              @foreach ($tampungstok as $v)
                        <option data-id_produk="{{$v->id}}" data-stok2="{{$v->jumlah_stok}}" data-price="{{$v->harga}}" data-produk="{{$v->product_name}}" value="{{$v->kodeproduk}}">{{$v->kodeproduk}}</option>  
                              @endforeach
                        </select>
                     </td>
                 
                     <td><input type="text" class="produk form-control" name="produk[]"></td>
                     <td><input type="text" class="price form-control" id="harga1" name="harga[]"></td>
                     <td><input type="text" class="form-control" id="diskon1" name="diskon[]"></td>
                   
                     <td><input type="text" class="form-control" id="qtyin1" name="qtyin[]"></td>
                     <td><input type="text" class="id_produk form-control" name="idp[]"></td>
                     <td><input type="text" class="stok2 form-control" name="stok[]"></td>
                     <td><input type="text" class="form-control" id="totBayar1" name="jumlah[]"></td>
                     
                   
                     
                    </tr>
                  </tbody>
                  
                </table>
                <br>
                <tr>
                  <td>{!! form::submit('Proses', ['class'=>'btn btn-primary']) !!}</td>
                </tr>
              </div>
              
                   
              
                  
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
        {{-- jual putus --}}
        <div class="modal fade example-modal-as" id="jualputus" aria-hidden="false" aria-labelledby="exampleFillIn"
          role="dialog" tabindex="-1">
          <div class="modal-dialog modal-simple modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                
                <h4 class="modal-title" id="exampleFillInModalTitle">Jual Putus</h4>
              </div>
              
              
              <div class="modal-body">
              {!! Form::open(array('url'=>'apotik/jualputus')) !!}
              
              <div class="panel ">
                <div class="panel-body">
                  <table class="cs table ">
                    <tr>
                      <td>Kode MD</td>
                      <td><input type="text" class="form-control" value="{{$apotik->kode_apotik}}" name="kodeap"></td>
                    </tr>
                    <tr>
                      <td>Nama</td>
                      <td><input type="text" class="form-control" value="{{$apotik->nama_apotik}}" name="nama"></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td><input type="text" value="{{$apotik->alamat_apotik}}" class="form-control" name="alamat"></td>
                    </tr>
                  </table>
                </div>
                <input type="hidden" name="nama" value="{{$apotik->nama_apotik}}"> 
                <input type="hidden" name="kode_ap" value="{{$apotik->kode_apotik}}">
                <input type="hidden" name="idap" value="{{$apotik->id}}">
                <table class="table cs">
                  <thead>
                    
                    <th>Kode Produk</th>
                    <th>Produk</th>
                    <th>Harga</th>
                 
                    <th>Diskon</th>
                    <th>Qty</th>
                    <th>ID</th>
                    <th>Stok</th>
                    <th>Jumlah</th>
                    <th>
                      <i class="add_jualputus icon wb-plus"></i>
                  </th>
                  </thead>
                  <tbody class="jualputus">
                    <tr>
                     <td>
                        <select name="kode_produk[]" id="" class="jualputus_id form-control">
                            <option value="">Pilih</option>
                              @foreach ($kantor as $v)
                        <option data-id_produk="{{$v->id}}" data-stok2="{{$v->jumlah_stok}}" data-price="{{$v->harga_produk}}" data-produk="{{$v->nama_produk}}" value="{{$v->kode_produk}}">{{$v->kode_produk}}</option>  
                              @endforeach
                        </select>
                     </td>
                 
                     <td><input type="text" class="produk form-control" name="produk[]"></td>
                     <td><input type="text" class="price form-control" id="harga2" name="harga[]"></td>
                     <td><input type="text" class="form-control" id="diskon2" name="diskon[]"></td>
                   
                     <td><input type="text" class="form-control" id="qtyin2" name="qtyin[]"></td>
                     <td><input type="text" class="id_produk form-control" name="idp[]"></td>
                     <td><input type="text" class="stok2 form-control" name="stok[]"></td>
                     <td><input type="text" class="form-control" id="totBayar2" name="jumlah[]"></td>
                     
                   
                     
                    </tr>
                  </tbody>
                  
                </table>
                <br>
                <tr>
                  <td>{!! form::submit('Proses', ['class'=>'btn btn-primary']) !!}</td>
                </tr>
              </div>
              
                   
              
                  
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
        <script>
          $(document).on("change keyup blur", "#cBalance", function() {
              var main = $('#cBalance').val();
              var disc = $('#chDiscount').val();
              var hrga = $('#harga').val();
             
              var mult = main * hrga ; // gives the value for subtract from main value
              var dec = mult - (main * hrga * disc /100); //its convert 10 into 0.10
              
             
              $('#result').val(dec);
          });
      </script>
      
@endsection