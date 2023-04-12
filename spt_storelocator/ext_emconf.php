<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Store Locator (List/Map View)',
    'description' => 'The Store Locator extension will help to add some basic store information in the backend and display it as a list or map view in the frontend.',
    'category' => 'plugin',
    'author' => 'Arun Chandran',
    'author_email' => 'arun@spawoz.com',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
