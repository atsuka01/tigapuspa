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
				'<td><input type="text" class="qty form-control" name="qty[]" value="{{ old('
			email ') }}"></td>' +
                '<td><input type="text" class="price form-control" name="price[]"></td>' +
                '<td><input type="text" class="jenis form-control" name="jenis_produk[]"></td>'+
                '<td> <input type="text" class="batch form-control" name="batch[]"></td>'+
				'<td><input type="text" class="dis form-control" name="dis[]"></td>' +
				'<td><input type="text" class="amount form-control" name="amount[]"></td>' +
                '<td><input type="text" class="idp form-control" name="idp[]"></td>' +
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
			var idp = tr.find('.product_id option:selected').attr('data-idp');
			tr.find('.idp').val(idp);

            
            var tr = $(this).parent().parent();
			var stok = tr.find('.product_id option:selected').attr('data-stok');
			tr.find('.stok').val(stok);

            var stok = tr.find('.stok').val() - 0;
            var idp = tr.find('.idp').val() - 0;
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

@section('utama')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Retail</h3>
            </div>
            <div class="panel-body">
            {!! Form::open(array('url'=>'retail/cari')) !!}
                <tr>
                    <td>
                        <input type="text" class="form-control" name="nama_retail">
                        
                    </td>
                    <td><button type="submit" class="btn btn-primary"><i class="icon wb-search"></i></button></td>
                </tr>
            {!! Form::close() !!}
                <table class="table table-bordered">
                    <thead>
                        <th>Nama</th>
                        <th>No Handpone</th>
                        <th>Nomor Invois</th>
                    </thead>
                    <tbody>
                        @foreach ($retail as $v)
                            <tr>
                                <td>{{$v->nama_retail}}</td>
                                <td>{{$v->notlp}}</td>
                                <td>{{$v->nomor_invoice}}</td>
                                <td align="center">
                                    <a href="{{route('retail.invois', $v->id)}}" class="btn btn-primary"><i class="icon wb-print"></i></a>
                                    <a href="" class="btn btn-danger"><i class="icon wb-trash"></i></a>
                                </td>
                             
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">Input Data Retail</h3>
            </div>
            <div class="panel-body">
                
                <div class="panel-body">
                  {!! Form::open(array('url'=>'retail/store')) !!} 
                        <table class="table table-bordered">
                            <tr>
                                <td>Nama</td>
                                <td><input type="text" class="form-control" name="nama_retail"></td>
                            </tr>
                            <tr>
                                <td>Nomor Handpone</td>
                                <td><input type="text" class="form-control" name="notlp"></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><textarea name="alamat" class="form-control" id="" cols="30" rows="5"></textarea></td>
                            </tr>
                        </table>
                    
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
                                            <option  data-stok="{{$product->jumlah_stok}}" data-idp="{{$product->id}}" data-kode="{{$product->kode_produk}}" data-jenis="{{$product->jenis_produk}}" data-price="{!! $product->harga_produk !!}" value="{!! $product->nama_produk !!}">{!! $product->nama_produk!!}</option>
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
                                        <input type="text" class="idp form-control" name="idp[]">
                                    </td>
                                    <td>
                                        <input type="text" class="stok form-control" name="stok[]">
                                    </td>
                                         <input type="hidden" class="kode form-control" name="kode_produk">
                                   
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
                {!! Form::close() !!}
            </div>
            </div>
        </div>
    </div>
@endsection