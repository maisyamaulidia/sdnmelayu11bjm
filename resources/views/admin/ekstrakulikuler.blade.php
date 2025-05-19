@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Ekstrakurikuler</h2>

    <!-- Button Tambah -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahEkskulModal">
        Tambah Ekstrakurikuler
    </button>

    <!-- Tabel Ekstrakurikuler -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Ekstrakurikuler</th>
                <th>Pembina</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ekskul as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->pembina }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Tambah Ekskul -->
<div class="modal fade" id="tambahEkskulModal" tabindex="-1" aria-labelledby="tambahEkskulModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('admin.ekskul.store') }}" enctype="multipart/form-data" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="tambahEkskulModalLabel">Tambah Ekstrakurikuler</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="mb-3">
              <label>Nama Ekstrakurikuler</label>
              <input type="text" name="nama" class="form-control" required>
          </div>
          <div class="mb-3">
              <label>Hari Kegiatan</label>
              <input type="text" name="hari" class="form-control" required>
          </div>
          <div class="mb-3">
              <label>Jam Kegiatan</label>
              <input type="text" name="jam" class="form-control" required>
          </div>
          <div class="mb-3">
              <label>Waktu Kegiatan</label>
              <input type="text" name="waktu_kegiatan" class="form-control" required>
          </div>
          <div class="mb-3">
              <label>Nama Pembina</label>
              <input type="text" name="pembina" class="form-control" required>
          </div>
          <div class="mb-3">
              <label>Deskripsi</label>
              <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
          </div>
          <div class="mb-3">
              <label>Foto</label>
              <input type="file" name="foto" class="form-control" accept="image/*">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
      </div>
    </form>
  </div>
</div>
@endsection
