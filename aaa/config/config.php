<?php return [

    # cockpit session name
    'app.name' => 'My Project X',

    # cockpit session name
    'session.name' => 'mysession',

    # app custom security key
    'sec-key' => 'xxxxx-SiteSecKeyPleaseChangeMe-xxxxx',

    # site url (optional) - helpful if you're behind a reverse proxy
    'site_url' => 'http://192.168.1.229/yukicomnew',

    # define the languages you want to manage
    'languages' => [
        'fr' => 'French',
        'de' => 'German'
    ],

    # define additional groups
    'groups' => [
        'author' => [
            '$admin' => false,
            '$vars' => [
                'finder.path' => '/storage/upload'
            ],
            'cockpit' => [
                'backend' => true,
                'finder' => true
            ],
            'collections' => [
                'manage' => true
            ]
        ]
    ],

    # use mongodb as main data storage
    'database' => [   
        'server' => 'mongodb://192.168.1.229:27017/yukicom',
        'options' => [
            'db' => 'yukicom',
            'username'=>'yukicom',
            'password'=>'yukicom@P.',
        ]
    ],

    # use smtp to send emails
    'mailer' => [
        'from'       => 'info@mydomain.tld',
        'transport'  => 'smtp',
        'host'       => 'smtp.myhost.tld',
        'user'       => 'username',
        'password'   => 'xxpasswordxx',
        'port'       => 25,
        'auth'       => true,
        'encryption' => '' # '', 'ssl' or 'tls'
    ],

    # Define Access-Control (CORS) settings.
    # Those are the default values. You don't need to duplicate them all.
    'cors' => [
      'allowedHeaders' => 'X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding, Cockpit-Token',
      'allowedMethods' => 'PUT, POST, GET, OPTIONS, DELETE',
      'allowedOrigins' => '*',
      'maxAge' => '1000',
      'allowCredentials' => 'true',
      'exposedHeaders' => 'true',
    ],
];