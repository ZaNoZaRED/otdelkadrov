<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['name', 'surname', 'patronymic', 'phone', 'email', 'specialization', 'quantity', 'user_id'];

    public function user() {
        return $this -> belongsTo(User::class);
    }
}
