@extends('layouts.dashboard')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="numeral.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
			var tr = '<tr><td class="no">' + n + '</td>' + '<td><select class="form-control product_id" name="product_name[]">' + product + '</select></td>' +
				'<td><input type="text" class="qty form-control" name="qty[]" value="{{ old('
			email ') }}"></td>' +
                '<td><input type="text" class="price form-control" name="price[]"></td>' +
                '<td><input type="text" class="jenis form-control" name="jenis_produk[]"></td>'+
                '<td> <input type="text" class="batch form-control" name="batch[]"></td>'+
				'<td><input type="text" class="dis form-control" name="dis[]"></td>' +
				'<td><input type="text" class="amount form-control" name="amount[]"></td>' +
				'<td><p class="btn btn-danger delete"><i class="icon wb-trash"></i></p></tr>';
			$('.neworderbody').append(tr);
		});
		$('.neworderbody').delegate('.delete', 'click', function () {
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
    <div class="panel ">
        <div class="panel-heading">
            <h3 class="panel-title">Tambah Produk Kantor </h3>
        </div>
        <div class="panel-body">
        {!! Form::open(array('url'=>'kantor')) !!}
            <table class="table">
                <tr>
                    <td>Kode Produk</td>
                    <td><input type="text" class="form-control" name="kode_produk"></td>
                </tr>
                <tr>
                    <td>Nama Produk</td>
                    <td><input type="text" class="form-control" name="nama_produk"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" class="form-control" name="harga_produk"></td>
                </tr>
                <tr>
                    <td>Jenis Produk</td>
                    <td><input type="text" class="form-control" name="jenis_produk"></td>
                </tr>
                <tr>
                    <td>kategori</td>
                    <td><input type="text" class="form-control" name="kategori"></td>
                </tr>
                <tr>
                    <td>{!! Form::submit('Proses', ['class'=>'btn btn-primary']) !!}</td>
                </tr>
            </table>
        {!! Form::close() !!}
        </div>
    </div>
</div>
    <div class="col-md-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Tambah Stok kantor</h3>
            </div>
            <div class="panel-body">
                {!! Form::open(array('url'=>'kantor/stok')) !!}
                <table class="table cs">
                       
                          <tr>
                           <td>Kode Produk</td>
                           <td>
                              <select name="kode_produk" id="" class="select form-control">
                                  @foreach ($produksi as $v)
                                      <option data-jenis="{{$v->jenis_produk}}" data-tampung="{{$v->nama_produk}}" value="{{$v->kode_produk}}">{{$v->kode_produk}}</option>
                                  @endforeach
                                </select>
                           </td>
                        </tr>
                        <tr>
                            <td>Produk</td>
                           <td><input type="text" class="tampung form-control" name="nama_produk"></td>
                        </tr>
                        <tr>
                            <td>Jenis</td>
                           <td><input type="text" class="jenis form-control" name="jenis_produk"></td>
                        </tr>
                        <tr>
                            <td>Tambah Stok</td>
                           <td><input type="text" class="form-control" name="jumlah_stok"></td>
                        </tr>
                        <tr>
                            <td>{!! Form::submit('Proses', ['class'=>'btn btn-primary']) !!}</td>
                        </tr>
                        
                      </table>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection