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
                <br>
                    {!! link_to('home_admin', 'kembali', ['class'=>'btn btn-info']) !!}
                
               <table class="table">
                   <tr>
                    <td>Nomor Invoice</td>
                   <td><input type="text" class="form-control" name="nomor_invoice" value="{{$transaksirs->nomor_invoice}}"></td>
                   </tr>
                   <tr>
                       <td>Kode cs</td>
                   <td><input type="t5ext" name="kode_cs" class="form-control" value="{{$transaksirs->kode_cs}}"></td>
                   </tr>
                   <tr>
                       <td>Kode MD</td>
                       <td><input type="text" name="k9ode_md" class="form-control" value="{{$transaksirs->kode_md}}"></td>
                   </tr>
                   <tr>
                       <td>Kode CS</td>
                   <td><input type="text" class="form-control" name="kode_cs" value="{{$transaksirs->kode_rs}}"></td>
                   </tr>
                   <tr>
                       <td>Nama</td>
                       <td>: <input type="text" class="form-control" name="nama_customer" value="{{$transaksirs->nama_customer}} "></td>
                   </tr>
                   <tr>
                       <td>No Handpone</td>
                       <td><input type="text" class="form-control" name="notlp_customer" value="{{$transaksirs->notlp_customer}}"></td>
                   </tr>
                   <tr>
                       <td>Alamat</td>
                       <td><input type="text" class="form-control" name="alamat_customer" value="{{$transaksirs->alamat_customer}}"></td>
                   </tr>
                   <tr>
                       <td>Kota</td>
                       <td><input type="text" class="form-control" name="kota_customer" value=" {{$transaksirs->kota_customer}}"></td>
                   </tr>
                   <tr>
                       <td>Bukti Pembayaran</td>
                       <td>:.....</td>
                   </tr>
               </table>
               
            </div>
           
        
        </body>
        
           
        </html>