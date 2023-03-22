<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Dashboard Penilain Mahasiswa</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
</head>

<body style="height: 100vh; overflow-y: auto; padding: 0; margin: 0;">
    <div class="container-fluid" style="padding: 0;">
        <div class="row">

            <main class="px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                    </div>
                </div>

                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

                <h2>Data Mahasiswa</h2>
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <nav class="navbar bg-body-tertiary">
                    <form class="container-fluid justify-content-start">
                        <a href="{{ route('mahasiswa.create') }}">
                            <button class="btn btn-outline-success me-2" type="button">Input Data</button>
                        </a>
                    </form>
                </nav>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NISN</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Quiz</th>
                                <th scope="col">Tugas</th>
                                <th scope="col">Absensi</th>
                                <th scope="col">Praktek</th>
                                <th scope="col">UAS</th>
                                <th scope="col">Grade</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nisn }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->quiz }}</td>
                                    <td>{{ $data->tugas }}</td>
                                    <td>{{ $data->absen }}</td>
                                    <td>{{ $data->praktek }}</td>
                                    <td>{{ $data->uas }}</td>
                                    <td>{{ $data->grade }}</td>
                                    <td>
                                        <form action="{{ route('mahasiswa.destroy', $data->id) }}" method="POST">

                                            <a class="btn btn-primary"
                                                href="{{ route('mahasiswa.edit', $data->id) }}">Edit</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>


    <script src="/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>

    <script src="/js/dashboard.js"></script>
</body>

</html>
