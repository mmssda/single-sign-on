<?php

namespace App\Registers;

use Illuminate\Database\Eloquent\Model;
use App\Registers\ClientApp;

class Modul extends Model
{
    //
    protected $table = 'applications'; // override nama tabel
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

    public function app()
    {
        return $this->belngsTo(ClientApp::class, 'owner_id');
    }
}
