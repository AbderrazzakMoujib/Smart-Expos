<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{
    protected $fillable = ["name", "company", "email", "number", "country", "city", "postal_code", "service", "message", "assigned_to"];
}
