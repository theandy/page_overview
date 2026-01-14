<?php
declare(strict_types=1);

defined('TYPO3') or die();

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

ExtensionUtility::registerPlugin(
    'PageOverview',
    'Pages',
    'Seitenübersicht'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['pageoverview_pages'] =
    'tx_page_overview_root,tx_page_overview_showdesc';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['pageoverview_pages'] =
    'layout,select_key,pages';
