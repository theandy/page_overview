<?php

defined('TYPO3') or die('Access denied.');

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

// Neue Felder definieren
$additionalColumns = [
    'tx_page_overview_img' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:page_overview/Resources/Private/Language/locallang_db.xlf:img.label',
        'description' => 'LLL:EXT:page_overview/Resources/Private/Language/locallang_db.xlf:img.desc',
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
    'tx_page_overview_desc' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:page_overview/Resources/Private/Language/locallang_db.xlf:desc',
        'config' => [
            'type' => 'text',
            'enableRichtext' => true,
            'richtextConfiguration' => 'default',
            'rows' => 10,
            'cols' => 40,
        ],
    ],
    // NEU: Ausschluss-Haken
    'tx_page_overview_exclude' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:page_overview/Resources/Private/Language/locallang_db.xlf:exclude.label',
        'description' => 'LLL:EXT:page_overview/Resources/Private/Language/locallang_db.xlf:exclude.desc',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'items' => [
                ['label' => '', 'value' => 1],
            ],
            'default' => 0,
        ],
    ],
];

// Felder registrieren
ExtensionManagementUtility::addTCAcolumns('pages', $additionalColumns);

// Felder dem Backend-Formular hinzufügen
/*
ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    'tx_page_overview_img, tx_page_overview_desc',
    '1',
    'after:title'
);
*/

// Tab beibehalten, Feld anhängen
ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    '--div--;LLL:EXT:page_overview/Resources/Private/Language/locallang_db.xlf:tab.overview,
     tx_page_overview_img, tx_page_overview_desc, tx_page_overview_exclude',
    '',
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
