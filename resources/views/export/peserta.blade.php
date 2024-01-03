<table>
    <thead>
        <tr>
            <th style="width: 200px; font-weight: bold">Nama Pemilih</th>
            <th style="width: 200px; font-weight: bold">Tempat Lahir</th>
            <th style="width: 200px; font-weight: bold">Tanggal Lahir</th>
            <th style="width: 200px; font-weight: bold">Jenis Kelamin</th>
            <th style="width: 200px; font-weight: bold">Kabupaten</th>
            <th style="width: 200px; font-weight: bold">Kecamatan</th>
            <th style="width: 200px; font-weight: bold">Desa</th>
            <th style="width: 200px; font-weight: bold">Domisili</th>
            <th style="width: 200px; font-weight: bold">Pekerjaan</th>
            <th style="width: 200px; font-weight: bold">Pendidikan</th>
            <th style="width: 200px; font-weight: bold">Nomor Handphone</th>
            <th style="width: 200px; font-weight: bold">Nomor KTP</th>
            <th style="width: 200px; font-weight: bold">TPS</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($peserta as $key => $value)
            <tr>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->tempat_ttl }}</td>
                <td>{{ $value->tanggal_lahir }}</td>
                <td>{{ $value->kelamin }}</td>
                <td>{{ $value->kabupaten }}</td>
                <td>{{ $value->kecamatan }}</td>
                <td>{{ $value->desa }}</td>
                <td>{{ $value->domisili }}</td>
                <td>{{ $value->pekerjaan }}</td>
                <td>{{ $value->pendidikan }}</td>
                <td>{{ $value->no_hp }}</td>
                <td>{{ $value->ktp }}</td>
                <td>{{ $value->tps }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
