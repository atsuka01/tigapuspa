@extends('layouts.dashboard')
@section('utama')
    <div class="col-md-12">
        <div class="panel panel-dark">
            <div class="panel-heading">
                <h3 class="panel-title">Tambah toko</h3>
            </div>
            <div class="panel-body">
            {!! Form::open(array('url'=>'toko')) !!}
                <table class="table">
                    <tr>
                        <td>
                            <b>Kode Cs :</b>
                            <select name="kode_cs" class="form-control" id="">
                                @foreach ($cs as $v)
                                    <option value="{{$v->kode_cs}}">{{$v->kode_cs}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <b>Nama Toko :</b>
                            <input type="text" name="nama_toko" class="form-control">
                        </td>
                        <td>
                            <b>Jenis Toko :</b>
                            <select name="jenis_toko" class="form-control" id="">
                                <option value="Shopee">Shopee</option>
                                <option value="Whatsapp">Whatsapp</option>
                                <option value=".Com">.Com</option>
                                <option value="Lsy.id">Lsy.id</option>
                                <option value="Tokopedia">Tokopedia</option>
                                <option value="Bukalapak">Bukalapak</option>
                                <option value="Blanja.com">Blanja.com</option>
                                <option value="Lazada Indonesia">Lazada Indonesia</option>
                                <option value="FJB Kaskus">FJB Kaskus</option>
                               
                                <option value="OLX Indonesia">OLX Indonesia</option>
                                <option value="Bhinneka">Bhinneka</option>
                                <option value="Blibli">Blibli</option>
                                <option value="Elevenia">Elevenia</option>
                                <option value="Jualo">Jualo</option>
                                
                                <option value="Website">Website</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <button type="submit" class="btn btn-success">Tambah</button>
                        {!! link_to('toko', 'Kembali', ['class'=>'btn btn-danger']) !!}
                        </td>
                    </tr>
                </table>
            {!! Form::close() !!}
            @if ($errors->any())
            <div class="alert alert-google-plus">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        
        @endif
            </div>
        </div>
    </div>
@endsection