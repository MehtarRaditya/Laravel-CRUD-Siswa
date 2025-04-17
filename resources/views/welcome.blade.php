<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="mx-5 my-2">
  <div align="center" class="m-2">
    <h1>List Siswa</h1>
  </div>
  <hr>
  <div>
    <table class="table">
      <thead>
        <tr class="table-primary">
          <th scope="col">#</th>
          <th scope="col">Nama Siswa</th>
          <th scope="col">Nomor Induk Siswa Nasional</th>
          <th scope="col">Kelas</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($siswa as $s)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $s->Nama }}</td>
            <td>{{ $s->NISN }}</td>
            <td>{{ $s->Kelas }}</td>
            <td>
              <div class="d-flex bd-highlight">
                <div class="p-2 bd-highlight">
                  <a href="edit/{{ $s->id }}" class="btn btn-info btn-sm"><i class="bi bi-clipboard"></i></a>
                </div>
                <div class="p-2 bd-highlight">
                  <form onsubmit="if(!confirm('Ingin Menghapus Menu?')){return false;}" action="delete/{{ $s->id }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                  </form>
                </div>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div>
    <div align="left">
      <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Siswa
      </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="/create" method="post">
            @csrf
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Siswa</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="Nama" class="form-label">Nama Siswa</label>
                <input name="Nama" type="text" class="form-control" id="Nama" required>
              </div>
              <div class="mb-3">
                <label for="NISN" class="form-label">NISN</label>
                <input name="NISN" type="Number" class="form-control" id="NISN" required>
              </div>
              <div class="mb-3">
                <label for="Kelas" class="form-label">Kelas</label>
                <input name="Kelas" type="text" class="form-control" id="Kelas" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <div>

  <!--Input Error-->
  @error('Nama')
    <script>alert("{{ $message }}");</script>
  @enderror
  @error('NISN')
    <script>alert("{{ $message }}");</script>
  @enderror
  @error('Kelas')
    <script>alert("{{ $message }}");</script>
  @enderror

 <!--berhasil edit-->
  @if (session('berhasil'))
    <script>alert("{{ session('berhasil') }}");</script>
  @endif
</body>
</html>