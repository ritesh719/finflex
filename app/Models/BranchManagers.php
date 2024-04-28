<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchManagers extends Model
{
    use HasFactory;

    protected $table = 'branch_managers';

    protected $fillable = [
        'branches_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function branches()
    {
        return $this->belongsTo(Branches::class);
    }
}
