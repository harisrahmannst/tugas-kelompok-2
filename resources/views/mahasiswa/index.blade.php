@extends('layouts/app')

@section('style')
    <link href="{{ asset('css/list.css') }}" rel="stylesheet" />
@endsection
@section('title', 'ONEPLAY - Students Management') @section('content')
<div class="container">
    @if (session('success'))
        <div class="row justify-center">
            <div class="col-xs-12 col-md-8">
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="myAlert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                        onclick="closeAlert()">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
    @endif
    <h1>List of Students</h1>
    <div class="row mb-5">
        <div class="col-xs-12 col-md-8">

        </div>
        <div class="col-xs-12 col-md-4">
            <canvas id="grades-chart"></canvas>
        </div>
    </div>
    <div class="row justify-center">
        <div class="col-xs-12 col-md-12 text-center">
            <table class="table table-striped" style="margin-bottom: 60px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>Name</th>
                        <th>Quiz Score</th>
                        <th>Assignment Score</th>
                        <th>Attendance Score</th>
                        <th>Practice Score</th>
                        <th>Exam Score</th>
                        <th>Total Score</th>
                        <th>Average Score</th>
                        <th>Grade</th>
                        <th colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($mahasiswa) < 1)
                        <tr>
                            <td colspan="12" class="text-center">
                                Data not found.
                            </td>
                        </tr>
                    @else
                        @foreach ($mahasiswa as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $data->nisn }}</td>
                                <td align="left">{{ $data->nama }}</td>
                                <td>{{ $data->quiz }}</td>
                                <td>{{ $data->tugas }}</td>
                                <td>{{ $data->absen }}</td>
                                <td>{{ $data->praktek }}</td>
                                <td>{{ $data->uas }}</td>
                                <td>{{ $data->getTotalScore() }}</td>
                                <td>{{ $data->getAverageScore() }}</td>
                                <td><b>{{ $data->getGrade() }}</b></td>
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
                    @endif
                </tbody>
            </table>
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">+ Add New Data</a>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var grades = {!! json_encode($chart_data) !!};
    var ctx = document.getElementById('grades-chart').getContext('2d');
    var gradesChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['A', 'B', 'C', 'D'],
            datasets: [{
                label: 'Number of Students',
                data: [grades.A, grades.B, grades.C, grades.D],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            // ...
        }
    });
</script>
@endsection
