<?php
declare(strict_types=1);
defined('TYPO3') or die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

// Feld registrieren
ExtensionManagementUtility::addTCAcolumns('tt_content', [
    'tx_page_overview_root' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:page_overview/Resources/Private/Language/Form/locallang_tabs.xlf:root_page.label',
        'config' => [
            'type' => 'group',
            'internal_type' => 'db',
            'allowed' => 'pages',
            'size' => 1,
            'maxitems' => 1,
            'minitems' => 0,
            'fieldWizard' => ['recordsOverview' => ['disabled' => false]],
            'suggestOptions' => ['default' => ['additionalSearchFields' => 'nav_title,subtitle']],
        ],
    ],

    // NEU: Anzeige der Seitenbeschreibung toggeln (Default: an)
    'tx_page_overview_showdesc' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:page_overview/Resources/Private/Language/Form/locallang_tabs.xlf:show_description.label',
        'description' => 'LLL:EXT:page_overview/Resources/Private/Language/Form/locallang_tabs.xlf:show_description.info',
        'config' => [
            'type' => 'check',
            'default' => 1,
        ],
    ],
]);

// CType registrieren
/*
ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'label' => 'Seitenübersicht',
        'value' => 'pageoverview_pages',
        'icon' => 'content-text',
        'group' => 'default',
        'description' => 'Unterseiten-Übersicht',
    ],
    'textmedia',
    'after'
);
*/

ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:page_overview/Resources/Private/Language/locallang_db.xlf:tt_content.pageoverview_pages.title',
        'pageoverview_pages',
        'content-text',
    ],
    'text',
    'after'
);


$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['pageoverview_pages'] = 'content-text';

// Typ konfigurieren (Feld direkt enthalten)
$GLOBALS['TCA']['tt_content']['types']['pageoverview_pages'] = [
    'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            header; LLL:EXT:page_overview/Resources/Private/Language/Form/locallang_tabs.xlf:internal_title,
            bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel,
        --div--;LLL:EXT:page_overview/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            tx_page_overview_root,
            tx_page_overview_showdesc,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
            --palette--;;hidden,
            --palette--;;access,
    ',
    'columnsOverrides' => [
        'bodytext' => [
            'config' => [
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
            ],
        ],
    ],
];
