@extends('layouts.dashboard')
@section('utama')
    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Toko</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <th>Kode Cs</th>
                        <th>Nama Toko</th>
                        <th>Jenis Toko</th>
                    </thead>
                    <tbody>
                        @foreach ($toko as $v)
                            <tr>
                                <td>{{$v->kode_cs}}</td>
                                <td>{{$v->nama_toko}}</td>
                                <td>{{$v->jenis_toko}}</td>
                                <td>
                                    <a href="{{route('toko.edit', $v->id)}}" class="btn btn-success">
                                        <i class="icon wb-edit"></i>
                                    </a>
                                    <a href="{{route('toko.show', $v->id)}}" class="btn btn-primary">
                                        <i class="icon wb-shopping-cart"></i>
                                    </a>
                                    {!! Form::open(array('method'=>'delete', 'url'=>'toko/'.$v->id)) !!}
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
    <div class="col-xl-6">
          <!-- Panel Filtering rows -->
          <div class="panel">
            <header class="panel-heading">
              <h3 class="panel-title">Repeat</h3>
            </header>
            <div class="panel-body">
              <table class="table table-bordered table-hover toggle-circle" id="exampleFootableFiltering"
                data-paging="true" data-filtering="true" data-sorting="true">
                <thead>
                  <tr>
                   
                    <th>nama</th>
                    <th>Telepon</th>
                    <th>CS</th>
                    <th><i class="icon wb-reply"></i></th>
                  </tr>
                </thead>
                <tbody>
                   @foreach ($repeat as $r)
                       <tr>
                           
                           <td>{{$r->nama_customer}}</td>
                           <td>{{$r->notlp_customer}}</td>
                           <td>{{$r->kode_cs}}</td>
                           <td>
                               <a href="{{route('toko.repeat', $r->id)}}">
                                   <i class="icon wb-reply"></i>
                               </a>
                           </td>
                       </tr>
                   @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- End Panel Filtering -->
        </div>
@endsection