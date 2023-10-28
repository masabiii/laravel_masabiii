@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<style>
    .custom-input-container {
        display: flex;
        flex-direction: column;
    }

    .custom-input-container label {
        font-weight: bold;
    }

    .custom-input-container .custom-input {
        resize: vertical;
        min-height: 100px;
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-family: inherit;
    }
</style>
<div class="content-wrapper mr-2">
    <div class="row justify-content-between px-4 pt-4">
        <h5 class="text-center">Edit Pasien</h5>
    </div>
    <hr>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    @if (session()->has('danger'))
        <div class="alert alert-danger">
            {{ session()->get('danger') }}
        </div>
    @endif

    <form action="{{ route('updatePasien', $pasien->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 ml-3">
            <label for="nama_pasien" class="form-label">Nama Pasien</label>
            <input type="text" name="nama_pasien" id="nama_pasien" class="form-control"
                value="{{ $pasien->nama_pasien }}">
            @error('nama_pasien')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 ml-3">
            <label for "alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $pasien->alamat }}">
            @error('alamat')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 ml-3">
            <label for="no_telepon" class="form-label">No Telepon</label>
            <input type="number" name="no_telepon" id="no_telepon" class="form-control"
                value="{{ $pasien->no_telepon }}">
            @error('no_telepon')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 ml-3">
            <label for="id_rumahSakit" class="form-label">Rumah Sakit</label>
            <select name="id_rumahSakit" id="id_rumahSakit" class="form-control">
                <option value="">Pilih Rumah Sakit</option>
                @foreach ($rumahSakit as $r)
                    <option value="{{ $r->id }}" @if ($r->id == $pasien->id_rumahSakit) selected @endif>
                        {{ $r->nama_rumahSakit }}</option>
                @endforeach
            </select>
        </div>

        <div class="ml-3"><img src="" id="output" width="250" alt=""></div>
        <button class="btn btn-primary mt-3 ml-3" type="submit"><span><i class="fa fa-save fa-sm mr-1"></i></span>
            Simpan</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $.get('/api/rumah-sakit', function(data) {
            var dropdown = $('#rumah_sakit_id');
            dropdown.empty();
            dropdown.append($('<option>').val('').text('Pilih Rumah Sakit'));
            $.each(data, function(key, value) {
                dropdown.append($('<option>').val(value.id).text(value.nama_rumahsakit));
            });
        });
    });
</script>
