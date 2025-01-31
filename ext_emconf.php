<?php

/**
 * Extension Manager/Repository config file for ext "page_overview".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Page Overview',
    'description' => 'Displays page information of subpages as page overview',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-12.4.99',
            'fluid_styled_content' => '12.4.0-12.4.99',
            'rte_ckeditor' => '12.4.0-12.4.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'AndreasLoewer\\PageOverview\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Andreas Löwer',
    'author_email' => 'info@andreasloewer.de',
    'author_company' => 'Andreas Löwer',
    'version' => '1.0.0',
];
