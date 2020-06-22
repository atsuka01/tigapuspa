@extends('layouts.dashboard')
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
                '<td> <input type="text" class="kode form-control" name="kodeproduk[]"></td>'+
				'<td><input type="text" class="qty form-control" name="qty[]" value="{{ old('
			email ') }}"></td>' +
             
                '<td><input type="text" class="price form-control" name="price[]" id="q2" onkeyup="hitung1();"></td>' +
                '<td> <input type="text" class="batch form-control" name="disrs[]" id="w2" onkeyup="hitung1();" ></td>'+
                '<td> <input type="text" class="batch form-control" name="dismd[]" id="t2" onkeyup="hitung4();" ></td>'+
                '<td> <input type="text" class="batch form-control" name="batch[]"></td>'+
                
				'<td><input type="text" class="dis form-control" name="dis[]"></td>' +
				'<td><input type="text" class="amount y2 form-control" name="amount[]" id="e3" onkeyup="hitung1();" ></td>' +
                '<input type="hidden" onkeyup="hitung4();" class="form-control" name="dis25[]" id="r2">'+
                '<input type="hidden"  class="form-control" name="dis15[]" id="h2">'+
                '<td><input type="text" class="idproduk form-control" name="idproduk[]"></td>' +
                '<td><input type="text" class="stok form-control" name="stok[]"></td>' +
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

            var tr = $(this).parent().parent();
			var kategori = tr.find('.product_id option:selected').attr('data-kategori');
			tr.find('.kategori').val(kategori);

            var tr = $(this).parent().parent();
			var idproduk = tr.find('.product_id option:selected').attr('data-idproduk');
			tr.find('.idproduk').val(idproduk);

            var tr = $(this).parent().parent();
			var stok = tr.find('.product_id option:selected').attr('data-stok');
			tr.find('.stok').val(stok);
            
            var stok = tr.find('.stok').val() - 0;
            var idproduk = tr.find('.idproduk').val() - 0;
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
<style>
.co {
  width: 100%;
  height: 30%;
  margin:0 auto;
  background-image: repeating-linear-gradient(135deg, #F29B91 0px, #F09290 30px,  transparent 30px, transparent 50px, #83B3DB 50px, #84ADCB 80px, transparent     80px, transparent 100px);
  padding: 12px;
}

.co .inner {
  background: white;
  width: 100%;
  height: 100%;
}
</style>
@section('utama')
@if ($errors->any())
<div class="alert alert-google-plus">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>

@endif
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
{!! Form::open(array('url'=>'reseler/transaksi')) !!}
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Input Data RS/MD</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-3">
                <div class="radio-custom radio-primary">
                    <input type="radio" id="inputRadiosChecked" value="reset" name="reset" checked />
                    <label for="inputRadiosChecked">Reset</label>
                </div>
                <div class="radio-custom radio-primary">
                    <input type="radio" id="inputRadiosChecked"  name="reset" checked />
                    <label for="inputRadiosChecked">Pilih</label>
                </div>
            </div>
            <table class="table cs">
                <tr>
                    <td>
                        <b>Nama Toko</b>
                        <input type="text" class="form-control" name="nama_toko">
                    </td>
                </tr>
                <tr>
                    <td><b>Pilih CS</b><select name="tlp_cs" id="" class=" select form-control">
                            <option value="">Pilih</option>
                            @foreach ($cs as $v)
                                <option   data-tampung="{{$v->kode_cs}}" value="{{$v->tlp_cs}}">{{$v->nama_cs}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" class="tampung form-control" name="kode_cs">
                    </td>
                </tr>
            </table>
            <table class="table rs">
                <tr>
                    <td>
                        <b>PiliH RS</b>
                        <select name="kode_rs" id="" class="form-control rss">
                            <option value="">Pilih</option>
                            @foreach ($rs as $v)
                                
                                <option data-kode_md="{{$v->kode_md}}" value="{{$v->kode_rs}}">{{$v->nama_rs}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" class="form-control kode_md" name="kode_md">
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="panel ">
        <div class="panel-heading">
            <h3 class="panel-title">input data pelanggan</h3>
        </div>
        <div class="panel-body">
            <div class="co">
                <div class="inner">
                    
                    <table class="table ">
                       
                        <tr>
                            
                            <td><b>Nama:</b>
                                <input type="text" class="form-control" name="nama_customer">
                            </td>
                            <td>
                                <b>No Handpone</b>
                                <input type="text" class="form-control" name="notlp_customer">
                                
                            </td>
                        </tr>
                       
                        <tr>
                            <td><b>Alamat</b>
                              <input type="text" class="form-control" name="alamat_customer">
                            </td>
                            <td>
                                <b>Desa/Kelurahan</b>
                                <input type="text" class="form-control" name="desa_kelurahan">
                                <b>Kecamatan</b>
                                <input type="text" class="form-control" name="kecamatan">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Kota/Kabupaten</b>
                                <input type="text" class="form-control" name="kota_kabupaten">
                            </td>
                            <td>
                                <b>Provinsi</b>
                               <input type="text" class="form-control" name="provinsi" >
                               <b>kode POS </b>
                                <input type="text" class="form-control" name="kode_pos">
                            </td>

                            
                        </tr>
                        <td>Tanggal<input type="text" class="form-control w-100" name="tanggal" value="{{date('d-m-y')}}"></td>
                      
                    </table>
                </div>
            </div>
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
                                <th>RS%</th>
                                <th>MD%</th>
                                <th>ED</th>
                                <th>Diskon</th>
                                <th>Jumlah</th>
                                
                                
                                <th>
                                    <i class="add icon wb-plus"></i>
                                </th>
                            </thead>
                            <tbody class="neworderbody txtMult">
                                <tr>
                                    <td class="no">1</td>
                                    <td>
                                        <select class="form-control product_id" name="product_name[]">
                                            <option value="">Pilih</option>
                                            @foreach($kantor as $product)
                                            <option data-stok="{{$product->jumlah_stok}}" data-idproduk="{{$product->id}}" data-kategori="{{$product->kategori}}" data-kode="{{$product->kode_produk}}" data-jenis="{{$product->jenis_produk}}" data-price="{!! $product->harga_produk !!}" value="{!! $product->nama_produk !!}">{!! $product->nama_produk!!}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="kode form-control" name="kodeproduk[]">
                                    </td>
                                    <td>
                                        <input type="text" class="qty form-control" name="qty[]" >
                                      
                                    </td>
                                    <td>
                                        <input type="text" id="b3" onkeyup="hitung2();"  class="price form-control"  name="price[]" >
                                       
                                    </td>
                                    <td>
                                        <input type="text" id="b2" onkeyup="hitung2();" class="form-control" name="disrs[]">
                                    </td>
                                    <td>
                                        <input type="text" id="x2" onkeyup="hitung3();"  class="form-control" name="dismd[]">
                                    </td>
                                    <input type="hidden" class="jenis form-control" name="jenis_produk[]">
                                    <td>
                                        <input type="text" class="batch form-control" name="batch[]">
                                    </td>
                                    <td>
                                        <input type="text"  class="dis form-control" name="dis[]">
                                    </td>
                                    <td>
                                        <input type="text" id="a2" onkeyup="hitung2();" class="amount form-control" name="amount[]"> 
                                    </td>
                                  
                                        <input type="hidden" name="dis25[]" class="form-control" id="c2" >
                                    
                                    
                                        <input type="hidden" name="dis15[]" class="form-control" id="n2">
                                   
                                    <td>
                                        <input type="text" class="idproduk form-control" name="idproduk[]">
                                    </td>
                                    <td>
                                        <input type="text" class="stok form-control" name="stok[]">
                                    </td>
                                    <td>
                                        <p class="btn btn-danger delete">
                                            <i class="icon wb-trash"></i>
                                        </p>
                                    </td>
                                    <td>
                                        <input type="hidden" class="kode form-control" name="kode_produk">
                                    
                                        <input type="hidden" class="kategori form-control" name="kategori"> 
                                    </td>
                                </tr>
                           
                                   
                            
                            </tbody>
                            <tfoot>
                                <td colspan="7"><b>Total</b></td>
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
            </div>
        </div>
        
        
    
    </div>
{!! Form::close() !!}
@endsection
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
function hitung2() {
    var a = $("#a2").val();
    var b = $("#b2").val();
    var p = $("#b3").val();
 
    c = p - (a * b / 100); //a kali b
    
    $("#c2").val(c);
}
function hitung3() {
    var a = $("#a2").val();
    var x = $("#x2").val();
    n = a * x / 100; //a kali b
    
    $("#n2").val(n);
}
function hitung1() {
    var q = $("#q2").val();
    var w = $("#w2").val();
    var e = $("#e3").val();
 
    r = e - (q * w / 100); //a kali b
    
    $("#r2").val(r);
}
function hitung1() {
    var q = $("#q2").val();
    var w = $("#w2").val();
    var e = $("#e3").val();
 
    r = e - (q * w / 100); //a kali b
    
    $("#r2").val(r);
}
function hitung4() {
    var t = $("#t2").val();
    var y = $(".y2").val();
   
 
    h =  t * y / 100 //a kali b
    
    $("#h2").val(h);
}
</script>

