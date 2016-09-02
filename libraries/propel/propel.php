<?php
return [
  'propel' => [
    'database' => [
      'connections' => [
        'default' => [
          'adapter' => 'mysql',
          'dsn' => 'mysql:host=localhost;port=3306;dbname=ecommerce',
          'user' => 'root',
          'password' => '',
          'settings' => [
            'charset' => 'utf8',
            'queries' => [
              'utf8' => 'SET NAMES utf8 COLLATE utf8_unicode_ci, COLLATION_CONNECTION = utf8_unicode_ci, COLLATION_DATABASE = utf8_unicode_ci, COLLATION_SERVER = utf8_unicode_ci'
            ]
          ]
        ]
      ],
      'adapters' => [
        'mysql' => [
          'tableType' => 'InnoDB',
        ]
      ] 
    ],
    'paths' => [
      # Directory where the project files (`schema.xml`, etc.) are located.
      # Default value is current path #
      'projectDir' => '/Users/kimbui/Desktop/Working/www/hc-2016-ec-team05-118/Project/Source',

      # The directory where Propel expects to find your `schema.xml` file.
      'schemaDir' => '/Users/kimbui/Desktop/Working/www/hc-2016-ec-team05-118/Project/Source/models',

      # The directory where Propel should output classes, sql, config, etc.
      # Default value is current path #
      'outputDir' => '/Users/kimbui/Desktop/Working/www/hc-2016-ec-team05-118/Project/Source/models',

      # The directory where Propel should output generated object model classes.
      'phpDir' => '/Users/kimbui/Desktop/Working/www/hc-2016-ec-team05-118/Project/Source/models',

      # The directory where Propel should output the compiled runtime configuration.
      'phpConfDir' => '/Users/kimbui/Desktop/Working/www/hc-2016-ec-team05-118/Project/Source/models/generated-conf',

      # The directory where Propel should output the generated DDL (or data insert statements, etc.)
      'sqlDir' => '/Users/kimbui/Desktop/Working/www/hc-2016-ec-team05-118/Project/Source/models/generated-sql',

      # Directory in which your composer.json resides
      'composerDir' => '/Users/kimbui/Desktop/Working/www/hc-2016-ec-team05-118/Project/Source/libraries/vendor'

    ]
  ]
];
