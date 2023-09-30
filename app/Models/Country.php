<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model{
    use HasFactory;

    protected $primaryKey = 'country_id';
    protected $keyType = 'string';

    protected $fillable = [
        'country_name',
        'region_id'
    ];
    
    public $timestamps = false;

    public function region(){
        return $this->belongsTo(Region::class, 'region_id');
    }
}
