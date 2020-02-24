<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserContracts extends Model{
    use SoftDeletes;

    protected $table = 'user_contracts';

    protected $fillable = ['user_id', 'contract_id', 'state'];	
}
