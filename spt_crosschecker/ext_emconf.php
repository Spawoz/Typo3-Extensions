<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "spt_crosschecker".
 *
 * Auto generated 15-07-2020 08:33
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Content Cross Checker',
    'description' => 'Content Cross Checker module will help the administrator to verify the updates  in the live and staging sever while major upgrades.',
    'category' => 'module',
    'author' => 'Arun Chandran',
    'author_email' => 'arun@spawoz.com',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '2.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.2.0-10.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'clearcacheonload' => false,
    'author_company' => 'Spawoz Technologies Pvt. Ltd.'
);
