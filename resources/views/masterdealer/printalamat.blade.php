
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Print Label</title>
    <meta name="author" content="Shopee">
      <link rel="shortcut icon" href="{{url('assets/images/Logo_kecil.png')}}">
  
    <style>
      * {box-sizing: border-box; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; line-height: 1.3em;}
      body {width: 100%; display: block; margin: 0 auto; font-size: 9pt; font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; color: #000; word-wrap: break-word; word-break: break-word;}
      table {width: 100%; max-width: 100%; border-spacing: 0; font-size: 1em;}
      td, th {vertical-align: top; text-align: left; padding: 0; margin: 0;}
      hr {margin: 0; border-top: 2px dashed #bababa; border-bottom: 0;}
      h3 {margin: 27px 0 5px;}
      .container {width: 11.12in; margin: 0.4in auto;}
      .page {float: left; width: 50%; min-width: 5in; position: relative;}
          .page.left {padding: 0 2% 0 0.23in; border-right: 2px dashed #bababa; margin-right: -1px;}
          .page.right {padding: 0 0.23in 0 2%;}
  
      /* Page Breaker */
      .page-breaker {position: relative; text-align: center; page-break-before: always; margin-bottom: 20px;}
  
      @media print {
              .no-print, .no-print * { display: none !important; }
              .container { width: 100%; }
          }
          @page { size: landscape; margin: 0.1in 0.2in;}
  
          /* Cut line */
          .cut-line {display: none;}
      .shipping-label.cut-line {position: relative; display: block; margin-top: 15px; left: 0; border-bottom: 2px dashed #bababa; width: 104%; height: 0;}
      .shipping-label.desc.cut-line:after {content: 'Potong atau lipat pada garis ini'; font-size: 0.8em; margin-left: 1em;}
          .scissors_icon {transform: rotate(-90deg); bottom: -14px; vertical-align: middle; position: absolute}
      .scissors_icon.vertical {transform: none; display: block; position: absolute; top: 0; right: -12px;}
  
      /* Instruction */
      .instruction {color: #757575; font-size: 14px; line-height: 20px; background: #f6f6f6; width: 600px; display: block; margin: 40px auto; outline: 2px solid #ccc; outline-offset: 4px;}
        .instruction .desc strong {color: #ff5722;}
        .instruction td {padding: 10px 20px;}
        .instruction td {padding: 10px 20px;}
    </style>
      
  <style>
      .address-label-batch-v2-component {
          border: 2px solid #bababa;
          position: relative;
      }
      .address-label-batch-v2-component__header,
      .address-label-batch-v2-component__footer,
      .address-label-batch-v2-component__body {
          padding: 0.05in 0.1in;
          table-layout: fixed;
      }
      .address-label-batch-v2-component__body {
          height: 2in;
          overflow: hidden;
      }
      .address-label-batch-v2-component__title {
          color: black;
          font-size: 1.9em;
          text-align: 
          text-transform: uppercase;
      }
      .address-label-batch-v2-component__address-from address-label-batch-v2-component__title,
      .address-label-batch-v2-component__address-to .address-label-batch-v2-component_title {
          margin-bottom: 0.5em;
      }
      .address-label-batch-v2-component__address-from {
          vertical-align: top;
          font-size: 0.9em;
      }
      .address-label-batch-v2-component__address-from .address-label-batch-v2-component__title {
          font-size: 1.11em;
      }
      .address-label-batch-v2-component__address-to {
          
          font-size: 1.3em;
          font-weight: bold;
          position: relative;
      }
      .address-label-batch-v2-component__address-to .address-label-batch-v2-component__shipping {
          position: absolute;
          top: 0;
          right: 0;
          font-size: 0.8em;
          font-weight: normal;
          text-align: right;
      }
      .address-label-batch-v2-component__address-to .address-label-batch-v2-component__shipping-fee span,
      .address-label-batch-v2-component__address-to .address-label-batch-v2-component__shipping-weight span {
          font-weight: bold;
      }
      .address-label-batch-v2-component__address-to .address-label-batch-v2-component__title {
          font-size: 0.9em;
          font-weight: normal;
      }
      .address-label-batch-v2-component__username {
          font-weight: bold;
      }
      .address-label-batch-v2-component__mobile {
          margin-top: 0.5em;
      }
      .address-label-batch-v2-component__product-list {
          font-size: 0.9em;
          color:#666;
      }
      .address-label-batch-v2-component__product-list td,
      .address-label-batch-v2-component__product-list th {
          padding: 2px 1px;
      }
      .address-label-batch-v2-component__product-list thead th,
      .address-label-batch-v2-component__product-list thead td {
          color: #000;
          border-bottom: 2px solid #bababa;
          word-break: normal;
      }
      .address-label-batch-v2-component__product-list tbody tr + tr td {
          border-top: 2px dashed #bababa;
      }
      .address-label-batch-v2-component__product-list tbody tr:last-child td {
          border-bottom: 1px dashed #bababa;
      }
      .address-label-batch-v2-component__product-list tbody tr + .address-label-batch-v2-component__product-list__itemmodel td,
      .address-label-batch-v2-component__product-list tbody .address-label-batch-v2-component__product-list__itemmodel + .address-label-batch-v2-component__product-list__itemmodel td {
          border-top: none;
      }
      .address-label-batch-v2-component__product-list__ordersn {
          float: right;
          margin-top: 2.2em;
      }
  
      .address-label-batch-v2-component__comment-header {
          color: #000;
          font-weight: bold;
          margin-right: 1em;
      }
      .address-label-batch-v2-component__comment,
      .address-label-batch-v2-component__footer-content {
          color: #8c8c8c;
      }
      .address-label-batch-v2-component__shopee-logo img {
          float: left;
          margin-right: 10px;
          width: 88pt;
      }
      .address-label-batch-v2-component__footer-title,
      .address-label-batch-v2-component__footer-content {
          padding-left: 125px;
          font-size: 0.9em;
      }
  </style>
  
      <style>
      .packlist-component__title {color: #8c8c8c; text-transform: uppercase;}
      .packlist-component__address-from .packlist-component__title {margin-bottom: 0.5em;}
      .packlist-component__address-from .packlist-component__title {font-size: 1.11em;}
      .packlist-component__address-to .packlist-component__title {font-size: 0.9em; font-weight: normal;}
  
      .packlist-component__product-list {font-size: 0.9em; color:#666; table-layout: fixed; word-wrap: break-word; word-break: break-word;}
      .packlist-component__product-list td, .packlist-component__product-list th {padding: 2px 1px; vertical-align: middle;}
      .packlist-component__product-list thead th, .packlist-component__product-list thead td {font-weight: bolder;color: #000; border-bottom: 2px solid #bababa; word-break: normal;}
      .packlist-component__product-list tbody tr + tr td {border-top: 2px dashed #bababa;}
      .packlist-component__product-list tbody tr:last-child td {border-bottom: 1px dashed #bababa;}
      .packlist-component__product-list tbody tr + .packlist-component__product-list__itemmodel td,
      .packlist-component__product-list tbody .packlist-component__product-list__itemmodel + .packlist-component__product-list__itemmodel td {border-top: none;}
      .packlist-component__product-list__ordersn {float: right; margin-top: 2.2em;}
  
      .packlist-component__comment-header {color: #000; font-weight: bold; margin-right: 1em;}
      .packlist-component__comment {color: #8c8c8c;}
      .packlist-component__shopee-logo img {float: left; margin-right: 10px; width: 88pt;}
      .packlist-component table {
          text-align: left;
      }
  </style>
  
  
  
  </head>
  <body class="container">
    <table class="instruction no-print default">
        <tr>
          <td class="desc"><p><b>Pringatan:</b></p><p>Pilih kertas Dengan ukuran <em>A4</em> dan atur layout sebagai <em>Landscape</em> ketika akan mencetak label ini</p></td>
          <td>
              <img class="" src="{{url('assets/images/Logo_kecil.png')}}" width="120">
  
          </td>
        </tr>
      </table>
  
      
          <!-- without pack list -->
          
              <div class="page with-packlist left">
                  <!-- shipping label  -->
                  <div class="address-label-batch-v2-component">
      <table class="address-label-batch-v2-component__header">
          <colgroup>
              <col style="width: 40%;">
              <col style="width: 60%;">
          </colgroup>
          <tr>
              <td>
                  <!-- GO-SEND INSTANT (80012), GO-SEND SAME DAY (80013)  -->
                  
                      <div class="address-label-batch-v2-component__title"><b>{{$datatransaksimd->nama_toko}}</b></div>
                      .ONLINE
                  
              </td>
              <td rowspan="2">
                  <center>
                      <img src="{{url('assets/images/index.jpg')}}" alt="" width="100%" height="60" class="barcode__image">
                      <div class="barcode__text">
                          
                              {{$datatransaksimd->nomor_invoice}}
                          
                      </div>
                  </center>
              </td>
          </tr>
         
      </table>
      <hr/>
      <table class="address-label-batch-v2-component__body">
          <colgroup>
              <col style="width: 100%;">
              
          </colgroup>
          <tr>
              
              <td class="address-label-batch-v2-component__address-to">
                  
                  
                  
                  <div class="address-label-batch-v2-component__title">Yth</div>
                  
                      <div class="address-label-batch-v2-component__username">{{$datatransaksimd->nama_customer}}</div>
                  
                  <div class="address-label-batch-v2-component__mobile">{{$datatransaksimd->notlp_customer}}</div>
                  <div class="address-label-batch-v2-component__address">{{$datatransaksimd->alamat_customer}}</div>
              </td>
          </tr>
      </table>
      
          <hr/>
          <div class="address-label-batch-v2-component__footer ">
                  <div class="address-label-batch-v2-component__footer-title">Hubungi Kami : {{$datatransaksimd->tlp_cs}} </div>
              <!-- GO-SEND INSTANT (80012), GO-SEND SAME DAY (80013)  -->
              
                  <div class="address-label-batch-v2-component__footer-title">Terima Kasih Atas "<strong>kepercayaannya</strong>" Berbelanja <strong>Di Toko Kami</strong>  </div>
                  <div class="address-label-batch-v2-component__footer-title">Semoga  Lekas Cepat Sembuh!</div>
              
          </div>
      
      <div class="cut-line"><img src="{{url('assets/images/index.jpg')}}" width="20" height="27" alt="" class="scissor"></div>
  </div>
  
  
                  <!-- shipping cut line and icon -->
                  
                      <div class="cut-line shipping-label desc" style="width: 208%; margin-bottom: 16px;">
                          <div class="scissors_icon">
                              <img class="" width="20" height="27" src="data:image/png;base64,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">
  
                          </div>
                      </div>
                  
  
                  
                  <div class="scissors_icon vertical">
                      <img class="" width="20" height="27" src="data:image/png;base64,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">
  
                  </div>
                  
              </div>
  
              
  
               
          
      
  
  
  
  
  </body>
  </html>
  