<?php

defined('TYPO3') or die('Access denied.');

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

// Neue Felder definieren
$additionalColumns = [
    'tx_page_image' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:page_images/Resources/Private/Language/locallang_db.xlf:pages.tx_page_image',
        'config' => ExtensionManagementUtility::getFileFieldTCAConfig(
            'tx_page_overview_img',
            [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'Bild hinzufügen für die Ansicht',
                    'showPossibleLocalizationRecords' => true,
                ],
                'maxitems' => 1,
            ],
            'jpg,jpeg,png,svg,gif' // Erlaubte Bildtypen
        ),
    ],
];

// Felder registrieren
ExtensionManagementUtility::addTCAcolumns('pages', $additionalColumns);

// Felder dem Backend-Formular hinzufügen
ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    'tx_page_overview_img',
    '1',
    'after:title'
);

call_user_func(function()
{
    /**
     * Temporary variables
     */
    $extensionKey = 'page_overview';

    /**
     * Default PageTS for PageOverview
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        $extensionKey,
        'Configuration/TsConfig/Page/All.tsconfig',
        'Page Overview'
    );
});
