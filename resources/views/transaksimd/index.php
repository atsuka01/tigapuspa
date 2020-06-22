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
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Delegate</h3>
        </div>
        <div class="panel-body cs">
           <table class="table ">
               <tr>
                   <td>
                       <b>Pilih Cs:</b>
                       <select name="tlp_cs" id="" class="select form-control">
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
<form action="{{route('transaksimd.store')}}">
  
        {{ csrf_field() }}
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Master Dealer</h3>
            </div>
            <div class="panel-body">
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
                            <p>Kota:</p>
                            <input type="text" name="kota_customer" class="form-control">
                        </td>
                        <td>
                            <p>Alamat:</p>
                            {!! Form::textarea('alamat_customer', '', ['class'=>'form-control', 'cols'=>10, 'rows'=>5]) !!}
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
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Jenis</th>
                                <th>ED</th>
                                <th>Diskon</th>
                                <th>Jumlah</th>
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
                                            <option data-kode="{{$product->kode_produk}}" data-jenis="{{$product->jenis_produk}}" data-price="{!! $product->harga_produk !!}" value="{!! $product->nama_produk !!}">{!! $product->nama_produk!!}</option>
                                            @endforeach
                                        </select>
                                    </td>
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
</form>
@endsection