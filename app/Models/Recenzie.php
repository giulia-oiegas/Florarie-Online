<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recenzie extends Model
{
    use HasFactory;

    protected $table = 'recenzii';

    protected $fillable = [
        'nume_client',
        'text_recenzie',
        'nota',
        'buchet_id'
    ];

    //relatia inversa
    public function buchet() {
        return $this->belongsTo(Buchet::class, 'buchet_id');
    }
}
