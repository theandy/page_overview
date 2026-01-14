<?php
declare(strict_types=1);

defined('TYPO3') or die();

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

/*
 * Plugin registrieren
 */
ExtensionUtility::registerPlugin(
    'PageOverview',   // UpperCamelCase Extension-Key
    'Pages',          // Plugin-Name
    'Seitenübersicht' // Label (direkt, bewusst ohne LLL)
);

/*
 * Plugin-Felder an list-Type anhängen
 */
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['pageoverview_pages'] =
    'tx_page_overview_root,tx_page_overview_showdesc';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['pageoverview_pages'] =
    'layout,select_key,pages';
