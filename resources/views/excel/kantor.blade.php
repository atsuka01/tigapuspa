<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Produk</th>
            <th>Jenis Produk</th>
            <th>Jumlah Stok</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($kantor as $v)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $v->kode_produk }}</td>
            <td>{{ $v->jenis_produk }}</td>
            <td>{{ $v->jumlah_stok }}</td>
        </tr>
    @endforeach
    </tbody>
</table>