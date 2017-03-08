<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHistory extends Model
{
   protected $table = 'users_history';    
   protected $primaryKey = 'id_history';    
   protected $fillable = [
        'timestamp_history',
        'user_id'
   ];
}