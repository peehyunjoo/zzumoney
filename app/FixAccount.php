<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FixAccount extends Model
{
    protected $fillable =['expense_type','type','account_name','amount','date'];
        public function user() {
                return $this->belongsTo(User::class);
        }
}
