<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';

    // protected $casts = [
    //     'id' => 'integer',
    // ];

    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'no_ktp',
        'no_hp',
        'no_rm'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
