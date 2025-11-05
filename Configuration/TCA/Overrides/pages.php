<?php
declare(strict_types=1);

defined('TYPO3') or die('Access denied.');

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

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
                // Nur ein vorgegebenes Crop-Format zulassen (Variant "overview" mit Ratio 16:9)
                'overrideChildTca' => [
                    'columns' => [
                        'crop' => [
                            'config' => [
                                'cropVariants' => [
                                    'default' => [
                                        'title' => 'Desktop',
                                        'allowedAspectRatios' => [
                                            'overview' => [
                                                'title' => 'overview',
                                                'value' => 16 / 9,
                                            ],
                                        ],
                                        'selectedRatio' => 'overview',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
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

// Tab beibehalten, Feld anhängen
ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    '--div--;LLL:EXT:page_overview/Resources/Private/Language/locallang_db.xlf:tab.overview,
     tx_page_overview_img, tx_page_overview_desc, tx_page_overview_exclude',
    '',
    'after:title'
);

call_user_func(static function (): void {
    $extensionKey = 'page_overview';
    ExtensionManagementUtility::registerPageTSConfigFile(
        $extensionKey,
        'Configuration/TsConfig/Page/All.tsconfig',
        'Page Overview'
    );
});
