<?php

namespace App\Registers;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\Client;
use App\User;

class ClientApp extends Model
{
    protected $table = 'client_apps'; // override nama tabel
    protected $primaryKey = 'id'; // jika pakai UUID sebagai primary key
    public $incrementing = false; // kalau bukan auto-increment
 
    protected $fillable = [
            'id',                
            'owner_id',          
            'app_name',          
            'slug',              
            'redirect_url',      
            'client_secret',     
            'oauth_client_id',   
            'icon',              
            'description',       
            'is_active',
    ];

    // oauth client
    public function oauthClient()
    {
        return $this->belongsTo(Client::class, 'oauth_client_id');
    }

    // owner
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
    


}
