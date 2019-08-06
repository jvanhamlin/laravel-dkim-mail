<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Domain Name
    |--------------------------------------------------------------------------
    |
    | If you are using DKIM, you will need to specify the domain name
    | that has the DNS TXT entry. This is used when signing emails with
    | Swift DKIM signer.
    |
    */

    'domain_name' => env('DKIM_DOMAIN_NAME'),

    /*
    |--------------------------------------------------------------------------
    | Passphrase
    |--------------------------------------------------------------------------
    |
    | This is the passphrase you used when generating your private and public
    | keys. If you opted out of a passphrase, omit the DKIM_PASSPHRASE entry
    | in the .env file to have this value default to null.
    |
    */

    'passphrase' => env('DKIM_PASSPHRASE', null),
    
    /*
    |--------------------------------------------------------------------------
    | Selector
    |--------------------------------------------------------------------------
    |
    | If you are using DKIM, you will need to specify the selector to use
    | when signing your emails.
    |
    */

    'selector' => env('DKIM_SELECTOR'),

];
