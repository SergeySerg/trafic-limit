<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model {

    protected $fillable=[
        'company_id',
        'type',
        'limit',
        'reported',
        'comparison',
    ];

}
