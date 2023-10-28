@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')


<div class="content-wrapper mr-2">
    <div class="row justify-content-between px-2 pt-4">
        <p class="headcont col-4" style="font-size: 25px">Data Rumah Sakit</p>
        <button type="button" class="btn btn-primary">
            <a href="{{ route('tambahRumahSakit') }}" class="text-decoration-none text-white">Tambah Data</a>
        </button>
    </div>
    <hr>
    <table id="table" class="table table-striped table-bordered ml-2" style="width:100%">
        <thead>
            <tr align="center">
                <th>Nama Rumah Sakit</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Telepon</th>
                <th width="100px">Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rumahSakit as $r)
                <tr style="font-size: 14px">
                    <td>{{ $r->nama_rumahSakit }}</td>
                    <td>{{ $r->alamat }}</td>
                    <td>{{ $r->email }}</td>
                    <td>{{ $r->telepon }}</td>
                    <td class="d-flex justify-content-space-between">
                        <a href="/editRumahSakit/{{ $r->id }}"><span class="btn btn-primary mr-1">Edit</span></a>
                        <a class="btn btn-danger" onclick="return confirm('Yakin Hapus Data Ini?')"
                            href="/hapusRumahSakit/{{ $r->id }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    function deletePasien(id) {
        if (confirm('Yakin Hapus Data Ini?')) {
            $.ajax({
                url: '/hapusRumahsakit/' + id,
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
