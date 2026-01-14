<?php
declare(strict_types=1);

defined('TYPO3') or die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$additionalColumns = [
    'tx_page_overview_exclude' => [
        'exclude' => 1,
        'label' => 'Aus Seitenübersicht ausschließen',
        'config' => [
            'type' => 'check',
            'default' => 0,
        ],
    ],
];

ExtensionManagementUtility::addTCAcolumns('pages', $additionalColumns);

ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    'tx_page_overview_exclude',
    '',
    'after:title'
);
