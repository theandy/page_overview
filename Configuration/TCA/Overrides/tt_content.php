<?php
declare(strict_types=1);
defined('TYPO3') or die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

// 1) Feld registrieren
ExtensionManagementUtility::addTCAcolumns('tt_content', [
    'tx_page_overview_root' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:page_overview/Resources/Private/Language/locallang_be.xlf:field.rootPage',
        'config' => [
            'type' => 'group',
            'internal_type' => 'db',
            'allowed' => 'pages',
            'size' => 1,
            'maxitems' => 1,
            'fieldWizard' => ['recordsOverview' => ['disabled' => false]],
            'suggestOptions' => ['default' => ['additionalSearchFields' => 'nav_title,subtitle']],
        ],
        // nur beim passenden CType anzeigen, falls es global angehängt würde
        'displayCond' => 'FIELD:CType:=:pageoverview_pages',
    ],
]);

// 2) CType registrieren
ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'label' => 'LLL:EXT:page_overview/Resources/Private/Language/locallang_be.xlf:pageoverview_pages_title',
        'value' => 'pageoverview_pages',
        'icon' => 'content-text',
        'group' => 'default',
        'description' => 'LLL:EXT:page_overview/Resources/Private/Language/locallang.xlf:pageoverview_pages_description',
    ],
    'textmedia',
    'after'
);
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['pageoverview_pages'] = 'content-text';

// 3) Basis-Showitem definieren wie gehabt
$GLOBALS['TCA']['tt_content']['types']['pageoverview_pages'] = [
    'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            header; Internal title (not displayed),
            bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel,
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

// 4) Feld zuverlässig einhängen (nach bodytext)
ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;LLL:EXT:page_overview/Resources/Private/Language/locallang_be.xlf:tab.settings,tx_page_overview_root',
    'pageoverview_pages',
    'after:bodytext'
);
