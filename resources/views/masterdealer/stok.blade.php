@extends('layouts.dashboard')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="numeral.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-2.1.4.js"></script> 
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
  var harga  = tr.find('.select option:selected').attr("data-harga");
  var stok  = tr.find('.select option:selected').attr("data-stok");

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
var idp = tr.find('.select option:selected').attr("data-idp");
var jenis  = tr.find('.select option:selected').attr("data-jenis");
var harga  = tr.find('.select option:selected').attr("data-harga");
var stok  = tr.find('.select option:selected').attr("data-stok");
var kategori  = tr.find('.select option:selected').attr("data-kategori");

$('.idp').val(idp);
$('.jenis').val(jenis);
$('.harga').val(harga);
$('.tampung').val(tampung); 
$('.stok').val(stok); 
$('.kategori').val(kategori); 
});
});
</script>
@section('utama')
<div class="col-md-12">
    @if ($errors->any())
    <div class="alert alert-google-plus">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    
    @endif
</div>
<div class="col-md-6">
  
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Stok MasterDeler</h3>
    </div>
    <div class="panel-body">
      <table class="table">
        <thead align="center" >
         
          <th>Kode Produk</th>
         <th>Jumlah Stok</th>
          <th colspan="2">Menu</th>
        </thead>
        <tbody align="center">
          @foreach ($tampung as $v)
              <tr>
              
                <td>{{$v->kodeproduk}}</td>
                <td>{{$v->jumlah_stok}}</td>
                <td>
                  <a href="{{route('md.deleteproduk', $v->id)}}"  onclick=”return confirm(‘Yakin Hapus?’)” ><i class="icon wb-trash"></i></a>

                </td>
              </tr>
          @endforeach
        </tbody>
        <tr align="center">
          <td colspan="1">Total</td>
          <td>{{$tampung->sum('jumlah_stok')}}</td>
        </tr>
      </table>
    </div>
  </div>
</div>


    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Masterdealer</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>Kode MD</td>
                        <td>: {{$md->kode_md}}</td>
                    </tr>
                    <tr>
                        <td>Nama </td>
                        <td>: {{$md->nama_md}}</td>
                    </tr>
                    <tr>
                        <td>Nomor Telepon</td>
                        <td>: {{$md->no_md}}</td>
                    </tr>
                </table>
                <table class="table table-bordered">
                  <tr>
                 
                  </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Surat jalan</h3>
          
        </div>
        <div class="panel-body">
          <table class="table">
            <tr>
              <td>
                <button type="submit" class="btn btn-success" data-target="#exampleFillIn" data-toggle="modal"><i class="icon wb-plus"></i></button>
              </td>
              <td>
                <div class="form-group">
                  <div class="input-search">
                    <button type="submit" class="input-search-btn"><i class="icon wb-search" aria-hidden="true"></i></button>
                    <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                  </div>
                </div>
              </td>
            </tr>
          </table>
          
          <table id="myTable" class="table ">
            <tr>
              <th>Nomor SJ</th>
              <th>ED</th>
              <th>Tanggal</th>
              <th><i class="icon wb-print"></i></th>
            </tr>
            @foreach ($stokmd as $v)
                <tr>
                <td>{{$v->nomor_suratjalan}}</td>
                <td>{{$v->batch}}</td>
                <td>{{$v->created_at}}</td>
                <td>
                  <a href="{{route('md.suratjalan', $v->id)}}" >
                    <i class="icon wb-print"></i>
                  </a>
                </td>
                </tr>
            @endforeach
          </table>
          {{$stokmd->links() }}
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-dark">
        <div class="panel-heading">
          <h3 class="panel-title">Invois</h3>
        </div>
        <div class="panel-body">
          <table class="table">
            <tr>
              <td>
                <button type="submit" class="btn btn-success"  data-target="#invois" data-toggle="modal"><i class="icon wb-plus"></i></button>
                 <button type="submit" class="btn btn-warning"  data-target="#jualputus" data-toggle="modal"><i class="icon wb-payment"></i></button>
              </td>
              <td>
                <div class="form-group">
                  <div class="input-search">
                    <button type="submit" class="input-search-btn"><i class="icon wb-search" aria-hidden="true"></i></button>
                    <input type="text" class="form-control" id="input" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                  </div>
                </div>
              </td>
            </tr>
          </table>
          <table id="table" class="table table-borderless">
            <tr>
              <th>Nomor Invoice</th>
              <th>Diskon</th>
              
              <th>Tanggal</th>
              <th><i class="icon wb-print"></i></th>
            </tr>
            <tr>
              @foreach ($invoismd as $v)
                <tr>
                  <td>{{$v->nomorinvois }}</td>
                  <td>%{{number_format($v->diskon)}}</td>
                  
                 
                <td>Rp.{{$v->created_at}}</td>
                <td>
                  <a href="{{route('md.printinvois', $v->id)}}">
                    <i class="icon wb-print"></i>
                  </a>
                </td>
                </tr>
              @endforeach
            </tr>
          </table>
          {{$invoismd->links() }}
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <!-- Example Justified Button Group -->
      <div class="example-wrap">
       
        <div class="example example-buttons">
          <div class="btn-group btn-group-justified">
          

          
          </div>
        </div>
      </div>
      <!-- End Example Justified Button Group -->
    <div class="col-xl-4 col-lg-6">
        <!-- Example Fill In -->
        <div class="example-wrap">
          
          <div class="example">
            
           
<div class="col-md-12">
        @if ($errors->any())
        <div class="alert alert-google-plus">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        
        @endif
</div>
            <!-- Modal -->
            <div class="modal fade example-modal-lg" id="exampleFillIn" aria-hidden="false" aria-labelledby="exampleFillIn"
              role="dialog" tabindex="-1">
              <div class="modal-dialog modal-simple modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="exampleFillInModalTitle">Tambah Stok</h4>
                    
                  </div>
                  <div class="modal-body">
                  {!! Form::open(array('url'=>'stok')) !!}
                  
                  <div class="panel ">
                    <div class="panel-body">
                      <table class="cs table ">
                        <tr>
                          <td>Kode MD</td>
                          <td><input type="text" class="form-control" value="{{$md->kode_md}}" name="kodemd"></td>
                        </tr>
                        <tr>
                          <td>Nama</td>
                          <td><input type="text" class="form-control" value="{{$md->nama_md}}" name="nama"></td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td><input type="text" value="{{$md->alamat_md}}" class="form-control" name="alamat"></td>
                        </tr>
                        <tr>
                          <td>Tanggal</td>
                          <td><input type="text" class="form-control" name="tanggal" value="{{date('d-m-y')}}"></td>
                        </tr>
                      </table>
                    </div>
                   
                    <input type="hidden" name="kode_md" value="{{$md->kode_md}}">
                    <input type="hidden" name="idmd" value="{{$md->id}}">
                    <table class="table cs">
                      <thead>
                        
                        <th>Nama Produk</th>
                        <th>Kode Produk </th>
                        <th>Qty</th>
                       
                        <th>ED</th>
                        
                        <th>Stok</th>
                      </thead>
                      <tbody class="kode">
                        <tr>
                        
                          
                            <td>
                                <select class="form-control select" name="product_name">
                                    <option value="">Pilih</option>
                                    @foreach($kantor as $product)
                                <option data-kategori="{{$product->kategori}}" data-stok="{{$product->jumlah_stok}}" data-harga="{{$product->harga_produk}}" data-idp="{{$product->id}}" data-tampung="{{$product->kode_produk}}" value="{{$product->nama_produk}}">{{$product->nama_produk}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="text" class="tampung form-control" name="kode_produk"></td>
                            <td>
                              <input type="text" class="form-control" name="qty">
                            </td>
                           
                            <td>
                              <input type="text" class=" form-control" name="batch">
                            </td>
                           
                              <input type="hidden" class="harga form-control" name="price">
                            
                           
                             
                          
                            <td>
                              <input type="text" class="stok form-control" name="stok">
                            </td>
                             
                                <input type="hidden" class="kategori form-control" name="kategori">
                             
                           
                           
                           
                        </tr>
                   
                           
                    
                    </tbody>
                      </tbody>
                      
                    </table>
                    {!! form::submit('Proses', ['class'=>'btn btn-primary']) !!}
                  </div>
                  
                       
                  
                      
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
            <!-- End Modal -->

            <!-- Modal -->
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
                  {!! Form::open(array('url'=>'mdinvois')) !!}
                  
                  <div class="panel ">
                    <div class="panel-body">
                      <table class="cs table ">
                        <tr>
                          <td>Kode MD</td>
                          <td><input type="text" class="form-control" value="{{$md->kode_md}}" name="kodemd"></td>
                        </tr>
                        <tr>
                          <td>Nama</td>
                          <td><input type="text" class="form-control" value="{{$md->nama_md}}" name="nama"></td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td><input type="text" value="{{$md->alamat_md}}" class="form-control" name="alamat"></td>
                        </tr>
                      </table>
                    </div>
                    <input type="hidden" name="nama" value="{{$md->nama_md}}"> 
                    <input type="hidden" name="kode_md" value="{{$md->kode_md}}">
                    <input type="hidden" name="idmd" value="{{$md->idmd}}">
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
                                  @foreach ($stok as $v)
                            <option data-id_produk="{{$v->id_produk}}" data-stok2="{{$v->jumlah_stok}}" data-price="{{$v->price}}" data-produk="{{$v->product_name}}" value="{{$v->kodeproduk}}">{{$v->kodeproduk}}</option>  
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
                         
                         <input type="hidden" name="idmd" value="{{$md->id}}">
                         
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
            <div class="modal fade example-modal-lg" id="jualputus" aria-hidden="false" aria-labelledby="exampleFillIn"
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
                {!! Form::open(array('url'=>'masterdealer/jualputus')) !!}
                
                <div class="panel ">
                  <div class="panel-body">
                    <table class="cs table ">
                      <tr>
                        <td>Kode MD</td>
                        <td><input type="text" class="form-control" value="{{$md->kode_md}}" name="kodemd"></td>
                      </tr>
                      <tr>
                        <td>Nama</td>
                        <td><input type="text" class="form-control" value="{{$md->nama_md}}" name="nama"></td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td><input type="text" value="{{$md->alamat_md}}" class="form-control" name="alamat"></td>
                      </tr>
                    </table>
                  </div>
                  <input type="hidden" name="nama" value="{{$md->nama_md}}"> 
                  <input type="hidden" name="kode_md" value="{{$md->kode_md}}">
                  <input type="hidden" name="idmd" value="{{$md->idmd}}">
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
                       
                       <input type="hidden" name="idmd" value="{{$md->id}}">
                       
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
            <!-- End Modal -->
          </div>
        </div>
        <!-- End Example Fill In -->
        Price <input type="number" id="cBalance" class="jumlah" value="">
    <br><br> %      <input class="jumlah" id="harga" type="number" >
    <br><br> Result <input class="total" id="result" type="number" >
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

    <script>
      $(document).on("change keyup blur", "#cBalance1", function() {
          var main = $('#cBalqance1').val();
          var disc = $('#chDiscount1').val();
          var hrga = $('#harga1').val();
         
          var mult = main * hrga ; // gives the value for subtract from main value
          var dec = mult - (main * hrga * disc /100); //its convert 10 into 0.10
          
         
          $('#total1').val(mult);
      });
  </script>

    
        <script>
          function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("mInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("Table");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
              td = tr[i].getElementsByTagName("td")[0];
              if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = "";
                } else {
                  tr[i].style.display = "none";
                }
              }       
            }
          }
          </script>
          <script>
            function myFunction() {
              var input, filter, table, tr, td, i, txtValue;
              input = document.getElementById("myInput");
              filter = input.value.toUpperCase();
              table = document.getElementById("myTable");
              tr = table.getElementsByTagName("tr");
              for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                  txtValue = td.textContent || td.innerText;
                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                  } else {
                    tr[i].style.display = "none";
                  }
                }       
              }
            }
            </script>
          
          
  
@endsection