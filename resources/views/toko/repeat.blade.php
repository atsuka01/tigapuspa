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
				
                '<td><input type="text" class="qty form-control" name="qty[]" value="{{ old('
			email ') }}"></td>' +
                '<td><input type="text" class="price form-control" name="price[]"></td>' +
                '<td><input type="text" class="jenis form-control" name="jenis_produk[]"></td>'+
                '<td> <input type="text" class="batch form-control" name="batch[]"></td>'+
				'<td><input type="text" class="dis form-control" name="dis[]"></td>' +
                '<td><input type="text" class="amount form-control" name="amount[]"></td>' +
                '<td><input type="text" class="stok form-control" name="stok[]"></td>' +
                '<td><input type="text" class="id form-control" name="ids[]"></td>' +
                '<input type="hidden" class="kode form-control" name="kode_produk[]">' +
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
			var stok = tr.find('.product_id option:selected').attr('data-stok');
			tr.find('.stok').val(stok);

            var tr = $(this).parent().parent();
			var id = tr.find('.product_id option:selected').attr('data-id');
			tr.find('.id').val(id);

            var id = tr.find('.id').val() - 0;
            var stok = tr.find('.stok').val() - 0;
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
@section('utama')
<style>
.co {
  width: 100%;
  height: 45%;
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
     <div class="panel panel-primary">
         <div class="panel-heading">
             <h3 class="panel-title">Transaksi</h3>
         </div>
         <div class="panel-body">
             
            
            
             <form action="{{route('toko.repeatstore')}}" method="post">
                
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
                <div class="col-md-9">
                    <li class="nav-item hidden-float">
                        <a class="nav-link icon md-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
                          role="button">
                          <span class="sr-only">Toggle Search</span>
                        </a>
                      </li>
                </div>
                  
                  
             <table class="table">
                
                
            
                 <tr>
                    <th>Kode Cs</th>
                    <td align="left">: <input type="text" name="kode_cs" class="form-control" value=" {{$repeat->kode_cs}}" id=""> </td>
                </tr>
                <tr>
                    <th>Jenis Toko</th>
                    <td align="left">: <input type="text" name="jenis_toko" class="form-control" value=" {{$repeat->jenis_toko}}" id=""> </td>
                </tr>

             </table>
                
                {{ csrf_field() }}
                <div class="co">
                    <div class="inner">
                        <table class="table container" style="">
                            <tr>
                                <td>Tanggal
                                <input type="text" class="form-control w-100" name="tanggal" value="{{date('d-m-y')}}">
                                </td>
                           
                            </tr>
                            <tr>
                                <td>
                                    <b>Nama :</b>
                                    <input type="text" name="nama_customer" class="form-control" value="{{$repeat->nama_customer}}">
                                </td>
                                <td>
                                    <b>No Handpone :</b>
                                    <input type="text" class="form-control" name="notlp_customer" value="{{$repeat->notlp_customer}}">
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat
                                   <input type="text" name="alamat_customer" class="form-control" value="{{$repeat->alamat_customer}}" >
                                </td>
                                <td>
                                    <b>Desa/Kelurahan</b>
                                    <input type="text" class="form-control" name="desa_kelurahan" value="{{$repeat->desa_kelurahan}}">
                                    <b>Kecamtan</b>
                                    <input type="text" class="form-control" name="kecamtan" value="{{$repeat->kecamatan}}">
                                </td>
                            </tr>
                            <tr>
                             
                                <td>
                                    <b>Kota/Kabupaten</b>
                                    <input type="text" class="form-control" name="kota_kabupaten"  value="{{$repeat->kota_kabupaten}}">
                                </td>
                                <td>
                                    <b>Provinsi</b>
                                    <input type="text" class="col-xs-2 form-control" name="provinsi"  value="{{$repeat->provinsi}}"><br>
                                    <b>Kode POS:</b>
                                    <input type="text" name="kode_pos" class="form-control" value="{{$repeat->kode_pos}}" >
                                </td>
                            </tr>
                           
                           
                         
                        </table>

                    </div>
                </div>
               
                
                <b>Pesanan :</b>
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Produk</th>
                       
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Jenis</th>
                        <th>ED</th>
                        <th>Diskon</th>
                        <th>Jumlah</th>
                        <th>Stok</th>
                        <th>ID</th>
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
                                <option data-id="{{$product->id}}" data-stok="{{$product->jumlah_stok}}" data-kategori="{{$product->kategori}}" data-kode="{{$product->kode_produk}}" data-jenis="{{$product->jenis_produk}}" data-price="{!! $product->harga_produk !!}" value="{!! $product->nama_produk !!}">{!! $product->nama_produk!!}</option>
                                    @endforeach
                                </select>
                            </td>
                            
                                <input type="hidden" class="kategori form-control" name="kategori" value="{{ old('email') }}">
                           
                            <td>
                                <input type="text" class="qty form-control" name="qty[]" value="{{ old('email') }}">
                            </td>
                            <td>
                                <input type="text" class="price form-control" name="price[]" >
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
                                <input type="text" class="amount form-control" name="amount[]"> 
                            </td>
                            <td>
                                <input type="text" class="stok form-control" name="stok[]"> 
                            </td>
                            <td>
                                <input type="text" class="id form-control" name="ids[]"> 
                            </td>
                            <td>
                                <p class="btn btn-danger delete">
                                    <i class="icon wb-trash"></i>
                                </p>
                            </td>
                            <td>
                                <input type="hidden" class="kode form-control" name="kode_produk[]">
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
            </form>
         </div>
     </div>
     
 </div>

 <script type="text/javascript">
 data-plugin="datepicker"
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>
@endsection