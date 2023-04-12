<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:spt_storelocator/Resources/Private/Language/locallang_db.xlf:tx_sptstorelocator_domain_model_storelocator',
        'label' => 'titel',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'titel,vorschautext,kategorie,adresse,geokoordinaten,moreinfo,latitude,longitude',
        'iconfile' => 'EXT:spt_storelocator/Resources/Public/Icons/tx_sptstorelocator_domain_model_storelocator.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'titel, vorschautext, bild, kategorie, adresse, geokoordinaten, --palette--;LLL:EXT:spt_storelocator/Resources/Private/Language/locallang_db.xlf:aPaletteDescription;aPalette, moreinfo, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'palettes' => [
        'aPalette' => [
            'label' => 'LLL:EXT:spt_storelocator/Resources/Private/Language/locallang_db.xlf:aPaletteDescription',
            'showitem' => 'latitude, longitude',
        ],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_sptstorelocator_domain_model_storelocator',
                'foreign_table_where' => 'AND {#tx_sptstorelocator_domain_model_storelocator}.{#pid}=###CURRENT_PID### AND {#tx_sptstorelocator_domain_model_storelocator}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'titel' => [
            'exclude' => true,
            'label' => 'LLL:EXT:spt_storelocator/Resources/Private/Language/locallang_db.xlf:tx_sptstorelocator_domain_model_storelocator.titel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'default' => ''
            ],
        ],
        'vorschautext' => [
            'exclude' => true,
            'label' => 'LLL:EXT:spt_storelocator/Resources/Private/Language/locallang_db.xlf:tx_sptstorelocator_domain_model_storelocator.vorschautext',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
                'eval' => 'trim',
                'default' => ''
            ]
        ],
        'bild' => [
            'exclude' => true,
            'label' => 'LLL:EXT:spt_storelocator/Resources/Private/Language/locallang_db.xlf:tx_sptstorelocator_domain_model_storelocator.bild',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'bild',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ]
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'bild',
                        'tablenames' => 'tx_sptstorelocator_domain_model_storelocator',
                        'table_local' => 'sys_file',
                    ],
                    'maxitems' => 1
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
            
        ],
        'kategorie' => [
            'exclude' => true,
            'label' => 'LLL:EXT:spt_storelocator/Resources/Private/Language/locallang_db.xlf:tx_sptstorelocator_domain_model_storelocator.kategorie',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'sys_category',
                'foreign_table_where' => 'AND sys_category.pid = ###CURRENT_PID###',
                'treeConfig' => [
                    'parentField' => 'parent',
                    'appearance' => [
                        'expandAll' => true,
                        'showHeader' => true,
                    ],
                ],
            ],
        ],
        'adresse' => [
            'exclude' => true,
            'label' => 'LLL:EXT:spt_storelocator/Resources/Private/Language/locallang_db.xlf:tx_sptstorelocator_domain_model_storelocator.adresse',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
                'eval' => 'trim',
                'default' => ''
            ]
        ],
        'geokoordinaten' => [
            'exclude' => true,
            'label' => 'LLL:EXT:spt_storelocator/Resources/Private/Language/locallang_db.xlf:tx_sptstorelocator_domain_model_storelocator.geokoordinaten',
            'config' => [
                'type' => 'user',
                'renderType' => 'GoogleMapElement',
                'parameters' => [
                    'longitude' => 'longitude',
                    'latitude' => 'latitude',
                    'address' => 'address'
                ],
            ],
        ],
        'moreinfo' => [
            'exclude' => true,
            'label' => 'LLL:EXT:spt_storelocator/Resources/Private/Language/locallang_db.xlf:tx_sptstorelocator_domain_model_storelocator.moreinfo',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
            ]
        ],
        'latitude' => [
            'exclude' => true,
            'label' => 'LLL:EXT:spt_storelocator/Resources/Private/Language/locallang_db.xlf:tx_sptstorelocator_domain_model_storelocator.lattitude',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'longitude' => [
            'exclude' => true,
            'label' => 'LLL:EXT:spt_storelocator/Resources/Private/Language/locallang_db.xlf:tx_sptstorelocator_domain_model_storelocator.longitude',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
    ],
];
