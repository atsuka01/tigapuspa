@extends('layouts.dashboard')
<link rel="stylesheet" href="../../../global/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="{{ url('global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{ url('global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{ url('global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{ url('global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{ url('global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{ url('global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{ url('global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{ url('assets/examples/css/tables/datatable.css')}}">

@section('utama')
<div class="col-md-6">
    <div class="panel ">
        <div class="panel-heading">
            <h3 class="panel-title">Laporan stok Kantor <i class="icon wb-file"></i></h3>
        </div>
        <div class="panel-body">
           <table class="table table-bordered" id="table-datatables">
                <thead>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Jumlah Stok</th>
                </thead>
                <tbody>
                    @foreach ($kantor as $v)
                        <tr>
                            <td>{{$v->kode_produk}}</td>
                            <td>{{$v->nama_produk}}</td>
                            <td>{{$v->jumlah_stok}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tr>
                 
                        <td colspan="3"><a href="{{route('laporan.kantor')}}" class="btn btn-primary">Download <i class="icon wb-download"></i></a></td>
                   
                </tr>
           </table>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Laporan Stok Pabrik <i class="icoun wb-file"></i></h3>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Jumlah Stok</th>
                </thead>
                <tbody>
                    @foreach ($produksi as $v)
                        <tr>
                            <td>{{$v->kode_produk}}</td>
                            <td>{{$v->nama_produk}}</td>
                            <td>{{$v->jumlah_stok}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3"><a href="{{route('laporan.pabrik')}}" class="btn btn-primary">Download <i class="icon wb-download"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">Laporan Transaksi Kantor </h3>
        </div>
        <div class="panel-body">
        {!! Form::open(array('url'=>'laporan/online')) !!}
            <div class="example-wrap">
               
                <div class="example">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="icon wb-calendar" aria-hidden="true"></i>
                    </span>
                    <input type="text" name="date1" class="form-control" data-plugin="datepicker">
                  </div>
                </div>
                <div class="example">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="icon wb-calendar" aria-hidden="true"></i>
                      </span>
                      <input type="text" name="date2" class="form-control" data-plugin="datepicker">
                    </div>
                  </div>
                <div class="example">
                    <button type="submit" class="btn btn-primary">Download <i class="icon wb-download"></i></button>
                </div>
              </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Laporan Transaksi MD </h3>
        </div>
        <div class="panel-body">
        {!! Form::open(array('url'=>'laporan/md')) !!}
            <div class="example-wrap">
               
                <div class="example">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="icon wb-calendar" aria-hidden="true"></i>
                    </span>
                    <input type="text" name="date1" class="form-control" data-plugin="datepicker">
                  </div>
                </div>
                <div class="example">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="icon wb-calendar" aria-hidden="true"></i>
                      </span>
                      <input type="text" name="date2" class="form-control" data-plugin="datepicker">
                    </div>
                  </div>
                <div class="example">
                    <button type="submit" class="btn btn-primary">Download <i class="icon wb-download"></i></button>
                </div>
              </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Laporan Transaksi RS </h3>
        </div>
        <div class="panel-body">
        {!! Form::open(array('url'=>'laporan/rs')) !!}
            <div class="example-wrap">
               
                <div class="example">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="icon wb-calendar" aria-hidden="true"></i>
                    </span>
                    <input type="text" name="date1" class="form-control" data-plugin="datepicker">
                  </div>
                </div>
                <div class="example">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="icon wb-calendar" aria-hidden="true"></i>
                      </span>
                      <input type="text" name="date2" class="form-control" data-plugin="datepicker">
                    </div>
                  </div>
                <div class="example">
                    <button type="submit" class="btn btn-primary">Download <i class="icon wb-download"></i></button>
                </div>
              </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


<script src="{{ url('global/js/Component.js')}}"></script>
    <script src="{{ url('global/js/Plugin.js')}}"></script>
    <script src="{{ url('global/js/Base.js')}}"></script>
    <script src="{{ url('global/js/Config.js')}}"></script>
    
    <script src="{{ url('assets/js/Section/Menubar.js')}}"></script>
    <script src="{{ url('assets/js/Section/Sidebar.js')}}"></script>
    <script src="{{ url('assets/js/Section/PageAside.js')}}"></script>
    <script src="{{ url('assets/js/Plugin/menu.js')}}"></script>
    
    <!-- Config -->
    <script src="{{ url('global/js/config/colors.js')}}"></script>
    <script src="{{ url('assets/js/config/tour.js')}}"></script>
    <script>Config.set('assets', '../../assets');</script>
    
    <!-- Page -->
    <script src="{{ url('assets/js/Site.js')}}"></script>
    <script src="{{ url('global/js/Plugin/asscrollable.js')}}"></script>
    <script src="{{ url('global/js/Plugin/slidepanel.js')}}"></script>
    <script src="{{ url('global/js/Plugin/switchery.js')}}"></script>
        <script src="{{ url('global/js/Plugin/datatables.js')}}"></script>
    
        <script src="{{ url('assets/examples/js/tables/datatable.js')}}"></script>
@endsection
