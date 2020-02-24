<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractBlocks extends Model{
    use SoftDeletes;

    protected $table = 'contract_blocks';

    protected $fillable = ['name', 'slug', 'contract_id', 'position', 'father', 'block', 'state'];
}
