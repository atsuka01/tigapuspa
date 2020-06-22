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
        <h3>Preview</h3>
        <div class="container">
           <table class="table">
               <tr>
                   <td>Kode cs</td>
                   <td align="left">{{$datatransaksimd->kode_cs}}</td>
               </tr>
               <tr>
                   <td>Kode MD</td>
                   <td>: {{$datatransaksimd->kodem_md}}</td>
               </tr>
               <tr>
                   <td>Nama</td>
                   <td>: {{$datatransaksimd->nama_customer}}</td>
               </tr>
               <tr>
                   <td>No Handpone</td>
                   <td>: {{$datatransaksimd->notlp_customer}}</td>
               </tr>
               <tr>
                   <td>Alamat</td>
                   <td>: {{$datatransaksimd->alamat_customer}}</td>
               </tr>
               <tr>
                   <td>Kota</td>
                   <td>: {{$datatransaksimd->kota_customer}}</td>
               </tr>
               <tr>
                   <td>Bukti Pembayaran</td>
                   <td>:.....</td>
               </tr>
           </table>
           
        </div>
        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <th>Qty</th>
                    <th>Produk</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Batch</th>
                    <th>Diskon</th>
                    <th>Jumlah</th>
                </thead>
                <tbody>
                   @foreach ($datapenjualanmd as $v)
                    <tr>
                        <td>{{$v->qty}}</td>
                        <td>{{$v->product_name}}</td>
                        <td>{{$v->jenis_produk}}</td>
                        <td>Rp,{{number_format($v->price)}}</td>
                        <td>{{$v->batch}}</td>
                        <td>{{$v->dis}}</td>
                        <td>Rp,{{number_format($v->amount)}}</td>
                    </tr>
                   @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">Total</td>
                        <td>Rp,{{number_format($datatransaksimd->subtotal)}}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    
    </body>
    
       
    </html>