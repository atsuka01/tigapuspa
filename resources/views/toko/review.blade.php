<html><head>
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript" src="jquery-calx-1.1.8.min.js"></script>
        <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
        <script src="jquery.mask.min.js"></script>
        <script src="numeral.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
        <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
        <script type="text/javascript">
        $(function(){
            function tally (selector) {
                $(selector).each(function () {
                    var total = 0,
                        column = $(this).siblings(selector).andSelf().index(this);
                    $(this).parents().prevUntil(':has(' + selector + ')').each(function () {
                        total += parseFloat($('p.sum:eq(' + column + ')', this).html()) || 0;
                    })
                    $(this).html(total);
                });
            }
            
            tally('td.subtotal');
            tally('b.total');
        });
        var config = qz.configs.create("Printer Name");
var data = [{
   type: 'html',
   format: 'file', // or 'plain' if the data is raw HTML
   data: 'assets/html_sample.html'
}];
qz.print(config, data).catch(function(e) { console.error(e); });
        </script>
        </head>
        <body>
          <div class="container">
              <table class="table">
                  <br>
                  <b>Detail Customer :</b>
                  <tr>
                      <td>Nomor Invoice</td>
                      <td>: {{$order->nomor_invoice}}</td>
                  </tr>
                  <tr>
                      <td>Nama </td>
                      <td>: {{$order->nama_customer}}</td>
                  </tr>
                  <tr>
                      <td>Nomer Handpone</td>
                      <td>: {{$order->notlp_customer}}</td>
                  </tr>
                  <tr>
                      <td>Kota</td>
                      <td>: {{$order->kota_customer}}</td>
                  </tr>
                  <tr>
                      <td>Alamat</td>
                      <td>: {{$order->alamat_customer}}</td>
                  </tr>
                  <tr>
                      <td>Pembayaran</td>
                      <td>{{$order->Pembayaran}}</td>
                  </tr>
              </table>
              <br>
              <b>Detail Pesanan :</b>
              <table class="table" id="data">
                <thead>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Deskirpsi</th>
                    <th>Batch</th>
                    <th>Diskon</th>
                    <th>Jumlah</th>
                </thead>
                <tbody>
                    @foreach ($transaksi as $v)
                        <tr>
                            <td>{{$v->product_name}}</td>
                            <td>{{$v->qty}}</td>
                            <td>Rp. {{number_format($v->price)}}</td>
                            <td>{{$v->jenis_produk}}</td>
                            <td>{{$v->batch}}</td>
                            <td>{{$v->dis}}</td>
                            <td>Rp. {{number_format($v->amount)}} <p hidden class="sum">{{$v->amount}}</p></td>
                            
                        </tr>
                    @endforeach
                    
                        
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">Total</td>
                        <td>Rp. {{number_format($order->subtotal)}}</td>
                    </tr>
                </tfoot>
              </table>
          </div>
          <div class="col-md-4">
                <button type="button" class="btn btn-danger" onclick="printBase64();"><i class="icon wb-print">Print</i></button>
          </div>
        </body>
        
        </html>