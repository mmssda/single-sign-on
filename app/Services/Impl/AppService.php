<?php

namespace App\Services\Impl;

use Laravel\Passport\ClientRepository;
use App\Services\Contracts\AppServiceInterface;
use App\Registers\ClientApp;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class AppService implements AppServiceInterface
{

    public function index():Collection
    {
        return ClientApp::with(['oauthClient','owner'])->get();
    }

    public function register(array $credential):ClientApp
    {

        $ownerId = auth()->id();
      
        // create data oauth client
       $client = app(ClientRepository::class)->create(
                $ownerId,           // ID pemilik client (biasanya null untuk client_credentials)
                $credential['app_name'],             // Nama aplikasi
                $credential['redirect_url'],      // Redirect URI
                // null,  // Untuk guard tertentu (misal 'users')
                false,
                false
            );

        // create data client app
        $idmax = ClientApp::max('id');
        return ClientApp::create([
            'id'                => $idmax != null? $idmax+1: 1,
            'owner_id'          => $ownerId,
            'app_name'          => $client->name,
            'slug'              => $credential['slug'],
            'redirect_url'      => $client->redirect,
            'client_secret'     => $client->secret,
            'oauth_client_id'   => $client->id,
            'icon'              => $credential['icon'],
            'description'       => $credential['description'],
            'is_active'         => true,
        ]);
      
    }

    public function show($id):ClientApp
    {
        $relasi = [ 
                    'oauthClient',
                    'owner'=> function($q){
                        $q->where('user_type', 'owner');
                    }
                ];
        return  ClientApp::where('id', $id)
                            ->with($relasi)
                            ->first();
    }

    public function validateClient(string $clientId, string $redirectUri): bool
    {
        return true;
    }
}