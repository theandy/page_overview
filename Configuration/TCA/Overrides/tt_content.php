<?php
declare(strict_types=1);

defined('TYPO3') or die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

/*
 * -----------------------------------------------------------------
 * Plugin registrieren
 * → TYPO3 11: CType = list, list_type = pageoverview_pages
 * → TYPO3 12: weiterhin gültig
 * -----------------------------------------------------------------
 */
ExtensionUtility::registerPlugin(
    'PageOverview',
    'Pages',
    'LLL:EXT:page_overview/Resources/Private/Language/locallang_db.xlf:plugin.pages.title'
);

/*
 * -----------------------------------------------------------------
 * Zusätzliche Felder für das Plugin
 * (falls noch nicht an anderer Stelle registriert)
 * -----------------------------------------------------------------
 */
$additionalColumns = [
    'tx_page_overview_root' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:page_overview/Resources/Private/Language/locallang_db.xlf:root',
        'config' => [
            'type' => 'group',
            'internal_type' => 'db',
            'allowed' => 'pages',
            'size' => 1,
            'maxitems' => 1,
            'minitems' => 0,
        ],
    ],
    'tx_page_overview_showdesc' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:page_overview/Resources/Private/Language/locallang_db.xlf:showdesc',
        'config' => [
            'type' => 'check',
            'default' => 1,
        ],
    ],
];

ExtensionManagementUtility::addTCAcolumns('tt_content', $additionalColumns);

/*
 * -----------------------------------------------------------------
 * Plugin an CType "list" anbinden
 * → Pflicht für TYPO3 11
 * → funktioniert unverändert in TYPO3 12
 * -----------------------------------------------------------------
 */
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['pageoverview_pages'] =
    'tx_page_overview_root,tx_page_overview_showdesc';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['pageoverview_pages'] =
    'layout,select_key,pages';
