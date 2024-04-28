<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CenterManagers extends Model
{
    use HasFactory;


    protected $table = 'center_managers';

    protected $fillable = [
        'centers_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function centers()
    {
        return $this->belongsTo(Centers::class);
    }
}
