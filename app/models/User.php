<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
class User extends Eloquent
{
    public $name;

    public $timestamps = ['created_at', 'update_at'];

    protected $fillable = ['username', 'email'];


}
?> 