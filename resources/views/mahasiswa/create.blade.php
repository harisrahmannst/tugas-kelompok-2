@extends('mahasiswa.layout')

@section('content')

    <div class="container" style="margin-top: 80px" id="tableinput">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        TAMBAH SISWA
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        <form action="{{ route('mahasiswa.store') }}" method="POST">
                            @csrf

                            <div class="form-group mb-2">
                                <label>NISN</label>
                                <input type="text" name="nisn" placeholder="Masukkan NISN Siswa" class="form-control"
                                    required="required" value="{{ old('nisn') }}"
                                    class="@error('nisn') is-invalid @enderror">
                            </div>

                            <div class="form-group mb-2">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" placeholder="Masukkan Nama Siswa" class="form-control"
                                    required="required" value="{{ old('nama') }}"
                                    class="@error('nama') is-invalid @enderror">
                            </div>

                            <div class="form-group mb-2">
                                <label>Nilai Quiz</label>
                                <input type="text" name="quiz" id="quiz" placeholder="Masukkan Nilai"
                                    class="form-control" required="required" value="{{ old('quiz') }}"
                                    class="@error('quiz') is-invalid @enderror">
                            </div>

                            <div class="form-group mb-2">
                                <label>Nilai Tugas</label>
                                <input type="text" name="tugas" id="tugas" placeholder="Masukkan Nilai"
                                    class="form-control" required="required" value="{{ old('tugas') }}"
                                    class="@error('tugas') is-invalid @enderror">
                            </div>

                            <div class="form-group mb-2">
                                <label>Nilai Absensi</label>
                                <input type="text" name="absen" id="absen" placeholder="Masukkan Nilai"
                                    class="form-control" required="required" value="{{ old('absen') }}"
                                    class="@error('absen') is-invalid @enderror">
                            </div>

                            <div class="form-group mb-2">
                                <label>Nilai Praktek</label>
                                <input type="text" name="praktek" id="praktek" placeholder="Masukkan Nilai""
                                    class="form-control" required="required" value="{{ old('praktek') }}"
                                    class="@error('praktek') is-invalid @enderror">
                            </div>

                            <div class="form-group mb-2">
                                <label>Nilai UAS</label>
                                <input type="text" name="uas" id="uas" placeholder="Masukkan Nilai"
                                    class="form-control" required="required" value="{{ old('uas') }}"
                                    class="@error('uas') is-invalid @enderror">
                            </div>

                            <div class="form-group mb-0">
                                <label>Nilai Grade</label>
                                <input type="text" name="grade" id="grade" placeholder="Grade" class="form-control"
                                    required="required" value="{{ old('grade') }}" readonly=""
                                    class="@error('grade') is-invalid @enderror">
                            </div>

                            <button type="submit" class="btn btn-success">SIMPAN</button>
                            <button type="reset" class="btn btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#quiz, #tugas, #absen, #praktek, #uas").keyup(function() {
                var quiz = $("#quiz").val();
                var tugas = $("#tugas").val();
                var absen = $("#absen").val();
                var praktek = $("#praktek").val();
                var uas = $("#uas").val();

                var total = parseInt(quiz) * parseInt(tugas) * parseInt(absen) * parseInt(praktek) *
                    parseInt(uas) / 5;
                $("#grade").val(total);
            });
        });
    </script>
@endsection
