<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Store Locator (List/Map View)',
    'description' => 'Extension to manage store location data.',
    'category' => 'plugin',
    'author' => 'Arun Chandran',
    'author_email' => 'arun@spawoz.com',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
