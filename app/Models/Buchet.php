<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buchet extends Model
{
    use HasFactory;

    //speciicam tabelul
    protected $table = 'buchete';

    //punem coloanele pe care avem voie sa le scriem
    protected $fillable = [
        'nume',
        'pret',
        'tip_floare',
        'descriere',
        'imagine_url',
        'status'
    ];

    //relatia cu recenziile
    public function recenzii() {
        return $this->hasMany(Recenzie::class, 'buchet_id');
    }
}
