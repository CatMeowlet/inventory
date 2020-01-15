<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // TABLE name
    protected $table = 'items';
    // PRIMARY KEY
    public $primaryKey = 'item_id';
    // Timestamps
    public $timestamps = true;
}
