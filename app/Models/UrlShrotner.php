<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlShrotner extends Model
{
    use HasFactory;

    protected $fillable=['user_id','count','url','shrot_url','code'];
}
