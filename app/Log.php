<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
        // TABLE name
        protected $table = 'logs';
        // PRIMARY KEY
        public $primaryKey = 'history_id';
        // Timestamps
        public $timestamp = true;
        public $timestamps = true;
}
