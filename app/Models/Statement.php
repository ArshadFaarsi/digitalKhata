<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    use HasFactory;

    protected $fillable = ['account_id','paid','paid_by','description'];
    /**
     * The roles that belong to the Statement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function paidBy()
    {
        return $this->belongsTo(User::class,'paid_by');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'statement_users', 'statement_id','user_id');
    }
}
