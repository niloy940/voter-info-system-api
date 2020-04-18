<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    protected $fillable = [
        'name', 'nid', 'relative_name', 'relative_nid', 'phone', 'address'
    ];
}
