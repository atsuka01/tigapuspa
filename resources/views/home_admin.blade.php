@extends('layouts.dashboard')
@section('utama')
<div class="row">
  <!-- First Row -->
  <div class="col-xl-4 col-md-6 info-panel">
    <div class="card card-shadow">
      <div class="card-block bg-white p-20">
        <button type="button" class="btn btn-floating btn-sm btn-warning">
          <i class="icon wb-payment"></i>
        </button>
        <span class="ml-15 font-weight-400">Kantor</span>
        <div class="content-text text-center mb-0">
         
        </i>
          <span class="font-size-40 font-weight-100">Rp.{{number_format($total)}}</span>
          
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-md-6 info-panel">
    <div class="card card-shadow">
      <div class="card-block bg-white p-20">
        <button type="button" class="btn btn-floating btn-sm btn-danger">
          <i class="icon wb-payment"></i>
        </button>
        <span class="ml-15 font-weight-400">Master Dealer</span>
        <div class="content-text text-center mb-0">
          
        </i>
        
            
        
          <span class="font-size-40 font-weight-100">Rp.{{number_format($totalmd)}}</span>
      
          
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-md-6 info-panel">
    <div class="card card-shadow">
      <div class="card-block bg-white p-20">
        <button type="button" class="btn btn-floating btn-sm btn-success">
          <i class="icon wb-payment"></i>
        </button>
        <span class="ml-15 font-weight-400">Reseler</span>
        <div class="content-text text-center mb-0">
         
        </i>
          <span class="font-size-40 font-weight-100">Rp.{{number_format($totalrs)}}</span>
         
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-6 col-md-6 info-panel">
    <div class="card card-shadow">
      <div class="card-block bg-white p-20">
        <button type="button" class="btn btn-floating btn-sm btn-primary">
          <i class="icon wb-payment"></i>
        </button>
        <span class="ml-15 font-weight-400">Apotik</span>
        <div class="content-text text-center mb-0">
          <i class="text-danger icon wb-triangle-up font-size-20">
        </i>
          <span class="font-size-40 font-weight-100">Rp.{{number_format($invoisapotik)}}</span>
         
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-6 col-md-6 info-panel">
    <div class="card card-shadow">
      <div class="card-block bg-white p-20">
        <button type="button" class="btn btn-floating btn-sm btn-primary">
          <i class="icon wb-payment"></i>
        </button>
        <span class="ml-15 font-weight-400">Retail</span>
        <div class="content-text text-center mb-0">
          <i class="text-danger icon wb-triangle-up font-size-20">
        </i>
          <span class="font-size-40 font-weight-100">Rp.{{number_format($dataretail)}}</span>
         
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-12 col-md-6 info-panel">
    <div class="card card-shadow">
      <div class="card-block bg-white p-20">
        <button type="button" class="btn btn-floating btn-sm btn-danger">
          <i class="icon wb-home"></i>
        </button>
        <span class="ml-15 font-weight-400">Total</span>
        <div class="content-text text-center mb-0">
          <i class="text-danger icon wb-triangle-up font-size-20">
        </i>
          <span class="font-size-40 font-weight-100">Rp.{{number_format($total)}}</span>
         
        </div>
      </div>
    </div>
  </div>

</div>
<br>
<div class="col-md-12">
    <!-- Panel Projects Status -->
    <div class="panel">
      <div class="panel-heading">
        <h3 class="panel-title">
          Stok Kantor
        
        </h3>
       
      </div>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              
              <td>Produk</td>
              <td>Jumlah Stok</td>
              
            </tr>
          </thead>
          <tbody>
           @foreach ($kantor as $v)
               <tr>
                 <td> {{$v->nama_produk}}</td>
                 <td> {{$v->jumlah_stok}}</td>
               </tr>
           @endforeach
          
          </tbody>
        </table>
      </div>
    </div>
    <!-- End Panel Projects Stats -->
  </div>
  <div class="col-md-12 masonry-item">
      <!-- Panel Projects Status -->
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">
            Produksi
          
          </h3>
         
        </div>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                
                <td>Produk</td>
                <td>Jumlah Produksi</td>
                
              </tr>
            </thead>
            <tbody>
            
                @foreach ($pabrik as $v)
                    <tr>
                      <td>{{$v->Produk}}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- End Panel Projects Stats -->
    </div>
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          
          <h3 class="panel-title">Transaksi Master Dealer</h3>
        </div>
        
        <div class="panel-body">
          <table class="table mb-3 ">
            <thead>
              <th>Kode Cs</th>
              <th>Kode MD</th>
              <th>Nomor Invoice</th>
              <th>Nama</th>
              <td colspan="3"></td>
            </thead>
            <tbody>
              @foreach ($transaksimd as $v)
                  <tr>
                    <td>{{$v->kode_cs}}</td>
                    <td>{{$v->kodem_md}}</td>
                    <td>{{$v->nomor_invoice}}</td>
                    <td>{{$v->nama_customer}}</td>
                    <td colspan="3">
                      <a href="{{route('master.review', $v->id)}}" class="btn btn-success">
                        <i class="icon wb-eye"></i>
                      </a>
                      <a href="{{route('master.print', $v->id)}}" class="btn btn-dark">
                        <i class="icon wb-print"></i>
                      </a>
                      
                      <a href="{{route('master.printalamat', $v->id)}}" class="btn btn-primary">
                        <i class="icon wb-map"></i>
                      </a>
                      <a  type="submit">
                        {!! Form::open(array('method'=>'delete', 'url'=>'masterdealer/'.$v->id)) !!}
                        <button type="submit" class="btn btn-danger"><i class="icon wb-trash"></i></button>
                      {!! Form::close() !!}
                      </a>
                    </td>
                    <th>
                     
                    </th>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    {{-- transaksi teseler --}}
    
    
    <div class="col-md-12">
      <!-- Panel Watchlist -->
      <div class="card card-shadow" id="widgetTable">
        <div class="card-block p-30">
          <h3 class="card-title">
            <span class="text-truncate">Transaksi Kantor</span>
            <div class="card-header-actions">
              <span class="red-600 font-size-24">Rp.{{number_format($total)}}</span>
            </div>
          </h3>
         
        </div>
        <div class="h-350" data-plugin="scrollable">
          <div data-role="container">
            <div data-role="content">
              <table class="table mb-3">
                <thead>
                    <th>Kode Cs</th>
                    <th>Nomor Invoice</th>
                    <th>Nama</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($order as $v)
                      <tr>
                        
                        <td>{{$v->kode_cs}}</td>
                        <td>{{$v->nomor_invoice}}</td>
                        <td>{{$v->nama_customer}}</td>
                    
                          <td>
                              <a href="{{route('toko.review', $v->id)}}" class="btn btn-success">
                                  <i class="icon wb-eye"></i>
                                </a>
                                <a href="{{route('toko.print', $v->id)}}" class="btn btn-dark">
                                    <i class="icon wb-print"></i>
                                  </a>
                                  <a href="" class="btn btn-primary">
                                      <i class="icon wb-map"></i>
                                    </a>
                                    {!! Form::open(array('method'=>'delete', 'url'=>'order/'.$v->id)) !!}
                                    <button type="submit" class="btn btn-danger"> <i class="icon wb-trash"></i> </button>
                                    {!! Form::close() !!}
                          </td>
                        
                
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- End Panel Watchlist -->
      
    </div>
    <div class="col-md-12">
      <!-- Panel Accordion -->
      <div class="panel">
        <header class="panel-heading">
          <h3 class="panel-title">
            <a role="button" data-toggle="collapse" href="#exampleFooAccordionPanel" aria-expanded="true"
              aria-controls="exampleFooAccordionPanel">
          Transaksi RS
        </a>
          </h3>
        </header>
        <div class="panel-body collapse show" id="exampleFooAccordionPanel">
          <table class="table table-hover table-bordered table-striped toggle-arrow-tiny"
            id="exampleFooAccordion" data-paging="true" data-filtering="true"
            data-sorting="true" data-show-toggle="true" data-toggle-column="last">
            <thead>
              <tr>
                <th data-name="id" data-type="number" data-breakpoints="xs">Kode CS</th>
                <th data-name="firstName">Kode MD</th>
                <th data-name="lastName">Nomor Invoice</th>
                <th data-name="lastName">Nama</th>
                <th data-name="">No Handpone</th>
                <th data-name="">Status</th>
                <th>Menu</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($transaksirs  as $v)
                  <tr>
                    <td>{{$v->kode_cs}}</td>
                    <td>{{$v->kode_md}}</td>
                    <td>{{{$v->nomor_invoice}}}</td>
                    <td>{{$v->nama_customer}}</td>
                    <td>{{$v->notlp_customer}}</td>
                  <td> <span class="badge badge-info"><i>{{$v->status}}</i></span></td>
                    <td >
                      <a href="{{route('reseler.review', $v->id)}}"><i class="icon wb-eye"></i></a>
                      <a href="{{Route('reseler.edit', $v->id)}}"><i class="icon wb-edit"></i></a>
                      <a href="{{route('reseler.print', $v->id)}}"><i class="icon wb-print"></i></a>
                      <a href="{{Route('reseler.printalmat', $v->id)}}"><i class="icon wb-map"></i></a>
                      <a href="{{route('reseler.repeat', $v->id)}}"> <i class="icon wb-desktop"></i> </a>
                      <a href="{{route('reseler.retur', $v->id)}}"> <i class="icon wb-replay"></i> </a>
                      <a href="{{route('reseler.delete', $v->id)}}"> <i class="icon wb-trash"></i> </a>
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- End Panel Accordion -->
    </div>
    
@endsection 