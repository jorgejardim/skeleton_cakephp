<?php
function domain_config() {

    $return = [

        /**
         * Client
         */
        'Client' => [
            'id' => 1,
            'name' => 'JDIG',
            'name_reference' => 'jdig',
            'apps' => ['site'],
        ],

        /**
         * Client Configs
         */
        'Client.config' => [
            'payment' => true,
            'discount' => '10%'
        ],

        /**
         * Facebook
         */
        'Facebook' => [
            'app_id' => '',
            'app_secret' => '',
        ],

        /**
         * Email configuration.
         */
        'EmailTransport' => [
            'default' => [
                'className' => 'Smtp',
                'host' => 'smtp.mandrillapp.com',
                'port' => 587,
                'timeout' => 30,
                'username' => 'email@email.com.br',
                'password' => 'secret',
                'client' => null,
                'tls' => null,
            ],
        ],

        'Email' => [
            'default' => [
                'transport' => 'default',
                'from' => ['email@email.com.br' => 'Jorge Jardim'],
                'emailFormat' => 'both',
                //'charset' => 'utf-8',
                //'headerCharset' => 'utf-8',
            ],
        ],

        /**
         * DataBase
         */
        'Datasources' => [
            'default' => [
                'className' => 'Cake\Database\Connection',
                'driver' => 'Cake\Database\Driver\Mysql',
                'persistent' => false,
                'host' => 'localhost',
                'username' => 'root',
                'password' => 'secret',
                'database' => 'myapp',
                'encoding' => 'utf8',
                'timezone' => 'UTC',
                'cacheMetadata' => true,
                'quoteIdentifiers' => false,
            ],
        ],
    ];

    return $return;
}
return domain_config();