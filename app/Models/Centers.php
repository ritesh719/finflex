<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centers extends Model
{
    use HasFactory;

    protected $table = 'centers';

    public function branch()
    {
        return $this->belongsTo(Branches::class);
    }

    public function centerManager()
    {
        return $this->hasOne(CenterManagers::class);
    }

    public function client()
    {
        return $this->hasMany(Client::class, 'center_id');
    }

    public function loan()
    {
        return $this->hasMany(Loan::class, 'center_id');
    }

    public function fd()
    {
        return $this->hasMany(FD::class, 'center_id');
    }

    public function closing()
    {
        return $this->hasMany(Closing::class, 'center_id');
    }
}
