@extends('layouts.dashboard')
@section('utama')
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Data Reseler</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Kode MD</th>
                    <th>Nama MD</th>
                    <th>Nama RS</th>
                    <th>Kode RS</th>
                    
                    <th>No Handpone</th>
                </thead>
                <tbody>
                 @foreach ($md as $v)
                     <tr>
                         <td class="bg-primary">{{$v->kode_md}}</td>
                         <td>{{$v->nama_md}}</td>
                         <td>{{$v->nama_rs}}</td>
                         <td class="bg-dark">{{$v->kode_rs}}</td>
                        
                         <td>{{$v->no_rs}}</td>
                         <td>
                            <a href="{{route('reseler.stok', $v->id)}}"><i class="icon wb-folder"></i></a>
                        </td>
                     </tr>
                 @endforeach
                </tbody>
            </table>
        </div>
        {{$Reseler->links()}}
    </div>
    
    
</div>

@endsection