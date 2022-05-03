<?php

namespace App\Models;

use App\Models\Cicle;
use App\Models\Modul;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curs extends Model
{
    use HasFactory;

    // protected $primaryKey = "id";
    // public $incrementing = "false";
    // protected $keyType = 'int'

    protected $table = "cursos";
    public $timestamps = false;

    public function cicle() {
        return $this->belongsTo(Cicle::class,"cicles_id");
    }

    public function moduls() {
        return $this->belongsToMany(Modul::class,"moduls_has_cursos","cursos_id","moduls_id")->withPivot("curs_academic_id");
    }
}
