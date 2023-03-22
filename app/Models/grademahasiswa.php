<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grademahasiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'nisn',
        'nama',
        'quiz',
        'tugas',
        'absen',
        'praktek',
        'uas',
    ];
    public function getGrade()
    {
        $average_score = $this->getAverageScore();

        if ($average_score <= 65) {
            return 'D';
        } elseif ($average_score <= 75) {
            return 'C';
        } elseif ($average_score <= 85) {
            return 'B';
        } else {
            return 'A';
        }
    }

    public function getTotalScore()
    {
        return $this->quiz + $this->tugas + $this->absen + $this->praktek + $this->uas;
    }

    public function getAverageScore()
    {
        return $this->getTotalScore() / 5;
    }
}