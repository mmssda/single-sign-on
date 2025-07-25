<?php

namespace App\Registers;

use Illuminate\Database\Eloquent\Model;

class ApplicationUser extends Model
{
    protected $table = 'application_users'; // override nama tabel
    protected $primaryKey = 'id'; // jika pakai UUID sebagai primary key
    public $incrementing = false; // kalau bukan auto-increment

    
    protected $fillable = [
            'id',                
            'user_id',          
            'client_id',                
            'note',                
            'is_active',
    ];
}
