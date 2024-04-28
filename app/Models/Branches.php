<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    use HasFactory;

    protected $table = 'branches';

    protected $fillable = [
        'name',
        'remark'
    ];

    public function centers()
    {
        return $this->hasMany(Centers::class, 'branch_id');
    }

    public function branchManager()
    {
        return $this->hasOne(BranchManagers::class);
    }
}
