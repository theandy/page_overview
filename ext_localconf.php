<?php
declare(strict_types=1);

defined('TYPO3') or die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

ExtensionUtility::configurePlugin(
    'PageOverview',
    'Pages',
    [
        \Vendor\PageOverview\Controller\PageOverviewController::class => 'list',
    ],
    []
);

ExtensionManagementUtility::registerPageTSConfigFile(
    'page_overview',
    'Configuration/TsConfig/Page/ContentElementWizard.tsconfig',
    'Page Overview – Content Elements'
);
