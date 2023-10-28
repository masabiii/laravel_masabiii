@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')


<div class="content-wrapper mr-2">
    <div class="row justify-content-between px-2 pt-4">
        <p class="headcont col-4" style="font-size: 25px">Data Pasien</p>
        <button type="button" class="btn btn-primary">
            <a href="{{ route('tambahPasien') }}" class="text-decoration-none text-white">Tambah Data Pasien</a>
        </button>
    </div>
    <hr>
    <table id="table" class="table table-striped table-bordered ml-2" style="width:100%">
        <thead>
            <tr align="center">
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Rumah Sakit</th>
                <th width="100px">Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pasien as $p)
                <tr style="font-size: 14px">
                    <td>{{ $p->nama_pasien }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->no_telepon }}</td>
                    <td>{{ $p->rumahSakit->nama_rumahSakit }}</td>
                    <td class="d-flex justify-content-space-between">
                        <a href="/editPasien/{{ $p->id }}"><span class="btn btn-primary mr-1">Edit</span></a>
                        <a class="btn btn-danger" onclick="return confirm('Yakin Hapus Data Ini?')"
                            href="/hapusPasien/{{ $p->id }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function deletePasien(id) {
        if (confirm('Yakin Hapus Data Ini?')) {
            $.ajax({
                url: '/hapusPasien/' + id,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function() {
                    window.location.href = '{{ route('dataPasien') }}';
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }
    }
</script>


@include('layouts.footer')
