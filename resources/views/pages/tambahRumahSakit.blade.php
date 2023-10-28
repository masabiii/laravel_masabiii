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
<<div class="content-wrapper mr-2">
    <div class="row justify-content-between px-4 pt-4">
        <h5 class="text-center">Tambah Rumah Sakit</h5>
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

    <form action="{{ route('simpanRumahSakit') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 ml-3">
            <label for="nama_rumahSakit" class="form-label">Nama Rumah Sakit</label>
            <input type="text" name="nama_rumahSakit" id="nama_rumahSakit" class="form-control">
            @error('nama_rumahSakit')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 ml-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control">
            @error('alamat')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 ml-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 ml-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="number" name="telepon" id="telepon" class="form-control">
            @error('telepon')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="ml-3"><img src="" id="output" width="250" alt=""></div>
        <button class="btn btn-primary mt-3 ml-3" type="submit"><span><i class="fa fa-save fa-sm mr-1"></i></span>
            Simpan</button>
    </form>
    </div>
