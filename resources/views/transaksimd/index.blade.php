@extends('layouts.dashboard')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="numeral.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
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
			var tr = '<tr><td class="no">' + n + '</td>' + '<td><select class="form-control product_id" name="product_name[]">' + product + '</select></td>' +
                '<td> <input type="text" class="kode form-control" name="kodeproduk[]"></td>' +
                '<td><input type="text" id="y" onchange="hitung1();" class="qty form-control" name="qty[]" value="{{ old('email') }}"></td>' +
                '<td><input type="text" id="u" readonly class="price form-control" name="price[]"></td>' +
                '<td><input type="text" class="jenis form-control" name="jenis_produk[]"></td>'+
                '<td> <input type="text" class="batch form-control" name="batch[]"></td>'+
				'<td><input type="text" class="dis form-control" name="dis[]"></td>' +
                '<td><input type="text" id="l"  onchange="hitung1();" class=" form-control" name="diskonmd[]"></td>' +
				'<td><input type="text" class="amount form-control" name="amount[]"></td>' +
                '<td><input type="text" id="k" class=" form-control" name="dismd[]"></td>' +
                '<td><input type="text"  class="idp form-control" name="idp[]"></td>' +
                '<td><input type="text"  class="stok form-control" name="stok[]"></td>' +
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
			var kategori = tr.find('.product_id option:selected').attr('data-kategori');
			tr.find('.kategori').val(kategori);
           
           

            var tr = $(this).parent().parent();
			var kode = tr.find('.product_id option:selected').attr('data-kode');
			tr.find('.kode').val(kode);

            var tr = $(this).parent().parent();
			var idp = tr.find('.product_id option:selected').attr('data-idp');
			tr.find('.idp').val(idp);

            var tr = $(this).parent().parent();
			var stok = tr.find('.product_id option:selected').attr('data-stok');
			tr.find('.stok').val(stok);

            var stok = tr.find('.stok').val() - 0;
            var idp = tr.find('.idp').val() - 0;
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
        $(document).ready(function(){

            $('.cs').change(function(event){
            var tr = $(this).parent().parent();
            var tampung = tr.find('.select option:selected').attr("data-tampung");
            var tlp_cs  = tr.find('.select option:selected').attr("data-tlpcs");

            $('.tlp_cs').val(tlp_cs);
            $('.tampung').val(tampung); 
            });
        });
       
	});
    

</script>
@section('utama')

<div class="col-md-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">cs</h3>
        </div>
        <div class="panel-body cs">
            
           <table class="table ">
               <tr>
                   <td>
                       <b>Pilih Cs:</b>
                       <select name="tlp_cs" id="" class="select form-control">
                            <option value="">Pilih</option>
                           @foreach ($cs as $v)
                               <option data-tlpcs="{{$v->tlp_cs}}" data-tampung="{{$v->kode_cs}}" value="">{{$v->nama_cs}}</option>
                           @endforeach
                       </select>
                   </td>
               </tr>
              
           </table>
           
            
        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-google-plus">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>

@endif
<form action="{{route('transaksimd.store')}}">
  
        {{ csrf_field() }}
       
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Master Dealer</h3>
            </div>
            <div class="panel-body">
                <div class="radio-custom radio-primary">
                    <input type="radio" id="inputRadiosChecked" value="reset" name="reset" checked />
                    <label for="inputRadiosChecked">Reset</label>
                </div>
                <div class="radio-custom radio-primary">
                    <input type="radio" id="inputRadiosChecked"  name="reset" checked />
                    <label for="inputRadiosChecked">Pilih</label>
                </div>
                <table class="table">
                    <tr>
                        <td>
                            <p>Nama Toko</p>
                            <input type="text" class="form-control" name="nama_toko">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Pilih Master Dealer</p>
                            <select name="kodem_md" id="" class="form-control " >
                                <option value="">Pilih</option>
                               @foreach ($md as $v)
                                   <option value="{{$v->kode_md}}">{{$v->kode_md}}</option>
                                   
                               @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><b>No CS</b>
                            <input type="text" class="tlp_cs form-control" name="tlp_cs" ></td>
                    </tr>
                    <tr>
                        <td><b>Kode CS</b>
                            <input type="text" class="tampung form-control" name="kode_cs" ></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Pelanggan</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <p>Tanggal</p>
                            <input type="text" name="tanggal" class="form-control" value="{{date('d-m-y')}}">
                        </td>
                    </tr>
                    <tr>
                        <td><p>Nama:</p>
                            <input type="text" name="nama_customer" class="form-control">
                        </td>
                        <td>
                            <p>No Handpone:</p>
                            <input type="text" name="notlp_customer" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Alamat</p>
                            <input type="text" class="form-control" name="alamat_customer" >
                        </td>
                        <td>
                            <p>Desa Kelurahan</p>
                            <input type="text" name="desa_kelurahan" class="form-control">
                            <p>Kecamatan</p>
                            <input type="text" name="kecamatan" class="form-control">
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                       
                        <td>
                            <p>Kota/Kabupaten</p>
                            <input type="text" name="kota_kabupaten" class="form-control">
                        </td>
                        <td>
                            <p>Provinsi</p>
                            <input type="text" name="provinsi" class="form-control">
                        </td>
                    </tr>
                
                 
                    <tr>
                        <td>
                            <p>Kode POS</p>
                            <input type="text" class="form-control" name="kodepos">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Pesanan</h3>
            </div>
            <div class="panel-body">
                   
                        
                       
                        <table class="table">
                            <thead>
                                <th>#</th>
                                <th>Produk</th>
                           
                                <th>Kode</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Jenis</th>
                                <th>ED</th>
                                <th>Diskon</th>
                                <th>Dis MD</th>
                                <th>Jumlah</th>
                                <th>Jumlah dis</th>
                                <th>id</th>
                                <th>Stok</th>
                                <th>
                                    <i class="add icon wb-plus"></i>
                                </th>
                            </thead>
                            <tbody class="neworderbody">
                                <tr>
                                    <td class="no">1</td>
                                    <td>
                                        <select class="form-control product_id" name="product_name[]">
                                            <option value="">Pilih</option>
                                            @foreach($kantor as $product)
                                            <option data-stok="{{$product->jumlah_stok}}" data-idp="{{$product->id}}" data-kategori="{{$product->kategori}}" data-kode="{{$product->kode_produk}}" data-jenis="{{$product->jenis_produk}}" data-price="{!! $product->harga_produk !!}" value="{!! $product->nama_produk !!}">{!! $product->nama_produk!!}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    
                                        <input type="hidden" class="kategori form-control" name="kategori">
                                
                                    <td>
                                        <input type="text" class="kode form-control" name="kodeproduk[]">
                                    </td>
                                    <td>
                                        <input type="text" id="a" onchange="hitung();"  class="qty form-control" name="qty[]" value="{{ old('email') }}">
                                    </td>
                                    <td>
                                        <input type="text" id="b" readonly class="price form-control" name="price[]" >
                                    </td>
                                    <td>
                                        <input type="text" class="jenis form-control" name="jenis_produk[]">
                                    </td>
                                    <td>
                                        <input type="text" class="batch form-control" name="batch[]">
                                    </td>
                                   
                                    <td>
                                        <input type="text" class="dis form-control" name="dis[]">
                                    </td>
                                    <td>
                                        <input type="text" id="x"  onchange="hitung();" class="dis form-control" name="diskonmd[]">
                                    </td>
                                    <td>
                                        <input type="text"  class="amount form-control" name="amount[]"> 
                                    </td>
                                    <td>
                                        <input type="text" id="c" class=" form-control" name="dismd[]"> 
                                    </td>
                                    <td>
                                        <input type="text"  class="idp form-control" name="idp[]"> 
                                    </td>
                                    <td>
                                        <input type="text"  class="stok form-control" name="stok[]"> 
                                    </td>
                                    <td>
                                        <p class="btn btn-danger delete">
                                            <i class="icon wb-trash"></i>
                                        </p>
                                    </td>
                                    <td>
                                        <input type="hidden" class="kode form-control" name="kode_produk">
                                       
                                    </td>
                                </tr>
                                
                            </tbody>
                            <tfoot>
                                <td colspan="9"><b>Total</b></td>
                                <td>
                                   <input type="text" class="total form-control" name="subtotal">
                                   
                                </td>
                            </tfoot>
                            <tr>
                                <td>
                                    <p class="total"></p>
                                    <button type="submit" class="btn btn-primary">Proses</button>
                                </td>
                            </tr>
                        </table>
                        <p>
  
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
function hitung() {
    var a = $("#a").val();
    var b = $("#b").val();
    var x = $("#x").val();
    c = a * b * x /100 //a kali b
    $("#c").val(c);
}
function hitung1() {
    var y = $("#y").val();
    var u = $("#u").val();
    var l = $("#l").val();
    k = y * u * l /100 //a kali b
    $("#k").val(k);
}
</script>
@endsection