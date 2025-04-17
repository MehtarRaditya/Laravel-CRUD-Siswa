<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="mx-5 my-2">
  <header>
    <div class="d-flex justify-content-between">
      <div class="p-2"><h1>Edit Data Siswa</h1></div>
      <div class="p-2"><h3><a href="/" type="button" class="btn-close" aria-label="Close"></h3></a></div>
    </div>
    <hr>
  </header>
  
  <section>
    <form action="/save/{{ $edit->id }}" method="post">
      @csrf
        <div class="mb-3">
          <label for="Nama" class="form-label">Nama Siswa</label>
          <input type="text" name="Nama" class="form-control" id="Nama" value="{{ $edit->Nama }}" autofocus required>
        </div>
        <div class="mb-3">
          <label for="NISN" class="form-label">NISN</label>
          <input name="NISN" type="number" class="form-control" id="NISN" value="{{ $edit->NISN }}">
        </div>
        <div class="mb-3">
          <label for="Kelas" class="form-label">Kelas</label>
          <input name="Kelas" type="text" class="form-control" id="Kelas" value="{{ $edit->Kelas }}">
        </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </section>
</body>
</html>