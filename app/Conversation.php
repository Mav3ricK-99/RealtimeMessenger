<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
       protected $appends = ['contact_name'];
       protected $primaryKey = 'conversation_id';

       public function getContactNameAttribute()
       {
            return $this->contact()->first(['name'])->name;
       }

       public function contact()
       {
           return $this->belongsTo(User::class);
       }
}
