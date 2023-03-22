@extends('mahasiswa.layout')

@section('content')

    <div class="container" style="margin-top: 80px" id="tableinput">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        EDIT SISWA
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
                        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-2">
                                <label>NISN</label>
                                <input type="text" name="nisn" placeholder="Masukkan NISN Siswa" class="form-control"
                                    required="required" value="{{ $mahasiswa->nisn }}"
                                    class="@error('nisn') is-invalid @enderror">
                            </div>

                            <div class="form-group mb-2">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" placeholder="Masukkan Nama Siswa" class="form-control"
                                    required="required" value="{{ $mahasiswa->nama }}"
                                    class="@error('nama') is-invalid @enderror">
                            </div>

                            <div class="form-group mb-2">
                                <label>Nilai Quiz</label>
                                <input type="text" name="quiz" placeholder="Masukkan Nilai" class="form-control"
                                    required="required" value="{{ $mahasiswa->quiz }}"
                                    class="@error('quiz') is-invalid @enderror">
                            </div>

                            <div class="form-group mb-2">
                                <label>Nilai Tugas</label>
                                <input type="text" name="tugas" placeholder="Masukkan Nilai" class="form-control"
                                    required="required" value="{{ $mahasiswa->tugas }}"
                                    class="@error('tugas') is-invalid @enderror">
                            </div>

                            <div class="form-group mb-2">
                                <label>Nilai Absensi</label>
                                <input type="text" name="absen" placeholder="Masukkan Nilai" class="form-control"
                                    required="required" value="{{ $mahasiswa->absen }}"
                                    class="@error('absen') is-invalid @enderror">
                            </div>

                            <div class="form-group mb-2">
                                <label>Nilai Praktek</label>
                                <input type="text" name="praktek" placeholder="Masukkan Nilai"" class="form-control"
                                    required="required" value="{{ $mahasiswa->praktek }}"
                                    class="@error('praktek') is-invalid @enderror">
                            </div>

                            <div class="form-group mb-2">
                                <label>Nilai UAS</label>
                                <input type="text" name="uas" placeholder="Masukkan Nilai" class="form-control"
                                    required="required" value="{{ $mahasiswa->uas }}"
                                    class="@error('uas') is-invalid @enderror">
                            </div>

                            <div class="form-group mb-2">
                                <label>Nilai Grade</label>
                                <input type="text" name="grade" placeholder="Masukkan Nilai" class="form-control"
                                    required="required" value="{{ old('grade') }}"
                                    class="@error('uas') is-invalid @enderror">
                            </div>

                            <button type="submit" class="btn btn-success">SIMPAN</button>
                            <button type="reset" class="btn btn-warning">RESET</button>

                            <script src="/js/perhitungangrade.js"></script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
