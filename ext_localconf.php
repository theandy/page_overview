<?php
declare(strict_types=1);

defined('TYPO3') or die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

/*
 * -----------------------------------------------------------------
 * Extbase-Plugin registrieren
 * → erzeugt list_type = pageoverview_pages
 * → gültig für TYPO3 11 & 12
 * -----------------------------------------------------------------
 */
ExtensionUtility::configurePlugin(
    'PageOverview',
    'Pages',
    [
        \Vendor\PageOverview\Controller\PageOverviewController::class => 'list',
    ],
    [
        \Vendor\PageOverview\Controller\PageOverviewController::class => '',
    ]
);

/*
 * -----------------------------------------------------------------
 * PageTSConfig für Content-Element-Wizard registrieren
 * → Pflicht für TYPO3 11
 * → harmlos für TYPO3 12
 * -----------------------------------------------------------------
 */
ExtensionManagementUtility::registerPageTSConfigFile(
    'page_overview',
    'Configuration/TsConfig/Page/ContentElementWizard.tsconfig',
    'Page Overview – Content Elements'
);
