<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

Class Newsletter {

    

    public function __construct(ApiClient $client){
        
        $client = new ApiClient;

        $this->client = $client;

    } 

    public function subscribe(string $email){

        

        return $this->client()->lists->addListMember(config('services.mailchimp.lists.subscribers'), [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);

    }

    public function client(){

        

         return $this->client->setConfig([
	        'apiKey' => config('services.mailchimp.key'),
	        'server' => 'us18'
        ]);  

    } 

}
