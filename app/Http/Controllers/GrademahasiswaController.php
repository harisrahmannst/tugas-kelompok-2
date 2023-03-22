<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\grademahasiswa;
use Illuminate\Support\Facades\Validator;


class GrademahasiswaController extends Controller
{


        // Store Function
        public function store(Request $request, grademahasiswa $mahasiswa)
        {
            //define validation rules
            $request->validate([
                'nisn'      =>  'required|numeric|digits_between:5,10',
                'nama'      =>  'required|max:255',
                'quiz'      =>  'required|numeric|digits_between:2,2',
                'tugas'     =>  'required|numeric|digits_between:2,2',
                'absen'     =>  'required|numeric|digits_between:2,2',
                'praktek'   =>  'required|numeric|digits_between:2,2',
                'uas'       =>  'required|numeric|digits_between:2,2',
                'grade'     =>  'required'
            ]);

            //Create data
            $mahasiswa->create($request->all());
            
            // $request->session()->flash('success', 'Data Berhasil Disimpan');
            return redirect()->route('mahasiswa.index')
                        ->with('success','Data Berhasil Disimpan');
        }
        // end

        public function create()
        {
            return view('mahasiswa.create');
        }

        public function index()
        {
            $mahasiswa = grademahasiswa::latest()->paginate();
            return view('mahasiswa.index',compact('mahasiswa'));
            
        }

        public function edit(grademahasiswa $mahasiswa)
        {
            return view('mahasiswa.edit',compact('mahasiswa'));

        }

        public function update(Request $request, grademahasiswa $mahasiswa)
        {
            $request->validate([
                'nisn'      =>  'required|numeric|digits_between:5,10',
                'nama'      =>  'required|max:255',
                'quiz'      =>  'required|numeric|digits_between:2,2',
                'tugas'     =>  'required|numeric|digits_between:2,2',
                'absen'     =>  'required|numeric|digits_between:2,2',
                'praktek'   =>  'required|numeric|digits_between:2,2',
                'uas'       =>  'required|numeric|digits_between:2,2',
                'grade'     =>  'required'
            ]);
          
            $mahasiswa->update($request->all());

            return redirect()->route('mahasiswa.index')
            ->with('success','Data Berhasil Diubah');
        }

        public function destroy(grademahasiswa $mahasiswa)
        {
            $mahasiswa->delete();

            return redirect()->route('mahasiswa.index')
            ->with('success','Data Berhasil Dihapus');
        }
}
