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

      var tr = $(this).parent().parent();
			var idp = tr.find('.product_id option:selected').attr('data-idp');
			tr.find('.idp').val(idp);

            
      var kode = tr.find('.kode').val() - 0;
      var jenis = tr.find('.jenis').val() - 0;
			var qty = tr.find('.qty').val() - 0;
			var dis = tr.find('.dis').val() - 0;
			var price = tr.find('.price').val() - 0;
      var idp = tr.find('.idp').val() - 0;

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
  var idp  = tr.find('.select option:selected').attr("data-idp");
  var stok  = tr.find('.select option:selected').attr("data-stok");
  
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
var idp  = tr.find('.select option:selected').attr("data-idp");

$('.idp').val(idp);
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
                <h3 class="panel-title">Data Agen : {{$agen->nama_agen}}</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>Kode Agen</td>
                        <td>: {{$agen->kode_agen}}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>: {{$agen->nama_agen}}</td>
                    </tr>
                    <tr>
                        <td>Nohandpone</td>
                        <td>: {{$agen->notlp_agen}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Stok Agen : {{$agen->nama_agen}}</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <th>Kode produk</th>
                        <th>Produk</th>
                        <th>jumlah Stok</th>
                    </thead>
                    <tbody>
                        @foreach ($tampungstok as $v)
                            <tr>
                                <td>{{$v->kodeproduk}}</td>
                                <td>{{$v->product_name}}</td>
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
                <h3 class="panel-title">Record Stok : {{$agen->nama_agen}}</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <th>Tgl/Jam</th>
                        <th>kode Agen</th>
                        <th>Kode Produk</th>
                        <th><i class="icon wb-print"></i></th>
                    </thead>
                    <tbody>
                        @foreach ($stokagen as $v)
                            <tr>
                                <td>{{$v->created_at}}</td>
                                <td>{{$v->kode_ag}}</td>
                                <td>{{$v->kode_produk}}</td>
                                <td>
                                  <a href="{{route('agen.suratjalan', $v->id)}}">
                                    <i class="icon wb-print"></i>
                                  </a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>{{$tampungstok->links()}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Record Invois : {{$agen->nama_agen}}</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                  <thead>
                    <th>Tgl/Jam</th>
                    <th>Kode Agen</th>
                    <th>Kode Produk</th>
                  </thead>
                  <tbody>
                    @foreach ($invoisagen as $v)
                        <tr>
                          <td>{{$v->created_at}}</td>
                          <td>{{$v->kode_ag}}</td>
                          <td>{{$v->kode_produk}}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
            <!-- Example Center -->
           
                

            <button type="button"  data-target="#examplePositionCenter" data-toggle="modal"
            type="button"  class="btn btn-animate btn-animate-vertical btn-success">
              <span><i class="icon wb-download" aria-hidden="true"></i>Tambah Stok</span>
            </button>
            <button type="button"data-target=".example-modal-lg" data-toggle="modal"
            type="button"  class="btn btn-animate btn-animate-vertical btn-info">
              <span><i class="icon wb-download" aria-hidden="true"></i>Invois</span>
            </button>
            
                <!-- Modal -->
                <div class="modal fade" id="examplePositionCenter" aria-hidden="true" aria-labelledby="examplePositionCenter"
                  role="dialog" tabindex="-1">
                  <div class="modal-dialog modal-simple modal-center modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title">Tambah Stok Agen</h4>
                      </div>
                      <div class="modal-body">
                        {!! Form::open(array('url'=>'agen/tambahstok')) !!}
                       
                       <table class="kode  table">
                        
                         
                       </table>
                       <table class="table cs">
                        <thead>
                           <th>Kode Produk</th>
                           <th>Produk</th>
                           <th>Jenis Produk</th>
                           <th>QTY</th>
                           <th>Harga</th>
                           <th>ED</th>
                           <th>id</th>
                           <th>Stok</th>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <select name="kode_produk" id="" class="select form-control">
                                <option value="">Pilih</option>
                                @foreach ($kantor as $v)
                                    <option  data-stok="{{$v->jumlah_stok}}" data-idp="{{$v->id}}" data-harga="{{$v->harga_produk}}"  data-jenis="{{$v->jenis_produk}}" data-tampung="{{$v->nama_produk}}" value="{{$v->kode_produk}}">{{$v->kode_produk}}</option>
                                @endforeach
                              </select>
                            </td>
                            <td><input type="text" class="tampung form-control" name="product_name"></td>
                            <td><input type="text" class="jenis form-control" name="jenis_produk"></td>
                            <td><input type="text" class="form-control" name="qty"></td>
                            <td><input type="text" class="harga form-control" name="harga"></td>
                            <td><input type="text" class="form-control" name="ed"></td>
                            <td><input type="text" class="idp form-control" name="idp"></td>
                            <td><input type="text" class="stok form-control" name="stok"></td>
                            {!! Form::hidden('idag', $agen->id) !!}
                            {!! Form::hidden('nama_ag', $agen->nama_agen) !!}
                            {!! Form::hidden('tlp_ag', $agen->notlp_agen) !!}
                            {!! Form::hidden('alamat_ag', $agen->alamat_agen) !!}
                            {!! Form::hidden('kode_ag', $agen->kode_agen) !!}
                          </tr>
                        </tbody>
                       </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {!! Form::submit('Proses', ['class'=>'btn btn-primary']) !!}
                      </div>
                    </div>
                    {!! Form::close() !!}
                  </div>
                </div>
                <!-- End Modal -->
              </div>
            </div>
            <!-- End Example Center -->
          </div>

          <div class="modal fade example-modal-lg" aria-hidden="true" aria-labelledby="exampleOptionalLarge"
                      role="dialog" tabindex="-1">
                      <div class="modal-dialog modal-simple modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="exampleOptionalLarge">Invois</h4>
                          </div>
                          <div class="modal-body">
                            {!! Form::open(array('url'=>'agen/tambahinvois')) !!}
                              
                              
                              
                              <table class="table kode">
                                  <thead>
                                     <th>Kode Produk</th>
                                     <th>Produk</th>
                                     <th>Jenis Produk</th>
                                     <th>Harga</th>
                                     <th>Diskon</th>
                                     <th>QTY</th>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <select name="kode_produk" id="" class="select form-control">
                                          <option value="">Pilih</option>
                                          @foreach ($kantor as $v)
                                              <option data-harga="{{$v->harga_produk}}" data-jenis="{{$v->jenis_produk}}" data-tampung="{{$v->nama_produk}}" value="{{$v->kode_produk}}">{{$v->kode_produk}}</option>
                                          @endforeach
                                        </select>
                                      </td>
                                      <td><input type="text" class="tampung form-control" name="product_name"></td>
                                      <td><input type="text" class="jenis form-control" name="jenis_produk"></td>
                                      <td><input type="text" class="harga form-control" name="harga"></td>
                                      <td><input type="text" class="form-control" name="diskon"></td>
                                      <td><input type="text" class="form-control" name="qtyin"></td>
                                      {!! Form::hidden('idag', $agen->id) !!}
                                      {!! Form::hidden('nama_ag', $agen->nama_agen) !!}
                                      {!! Form::hidden('tlp_ag', $agen->notlp_agen) !!}
                                      {!! Form::hidden('alamat_ag', $agen->alamat_agen) !!}
                                      {!! Form::hidden('kode_ag', $agen->kode_agen) !!}
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
                      </div>
                    </div>
    
@endsection