<?php

declare(strict_types=1);
defined('TYPO3') or die();

// Adds the content element to the "Type" dropdown
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        // title
        'label' => 'LLL:EXT:page_overview/Resources/Private/Language/locallang.xlf:pageoverview_pages_title',
        // plugin signature: extkey_identifier
        'value' => 'pageoverview_pages',
        // icon identifier
        'icon' => 'content-text',
        // group
        'group' => 'default',
        // description
        'description' => 'LLL:EXT:page_overview/Resources/Private/Language/locallang.xlf:pageoverview_pages_description',
    ],
    'textmedia',
    'after',
);

// Adds the content element icon to TCA typeicon_classes
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['pageoverview_pages'] = 'content-text';

// ...
