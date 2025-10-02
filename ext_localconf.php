<?php
defined('TYPO3') or die('Access denied.');

/**
 * RTE Preset
 */
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['page_overview'] = 'EXT:page_overview/Configuration/RTE/Default.yaml';

/**
 * PageTS einbinden
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:page_overview/Configuration/TsConfig/Page/All.tsconfig">'
);

/**
 * Stellt zusätzliche Seitenfelder im FE bereit, damit MenuProcessor sie liefert.
 * Wichtig für: tx_page_overview_exclude, tx_page_overview_desc
 */
$fieldsToAdd = ['tx_page_overview_exclude', 'tx_page_overview_desc'];
$existing = array_filter(array_map('trim', explode(',', (string)($GLOBALS['TYPO3_CONF_VARS']['FE']['additionalGetPageFields'] ?? ''))));
$merged = array_unique(array_filter(array_merge($existing, $fieldsToAdd)));
$GLOBALS['TYPO3_CONF_VARS']['FE']['additionalGetPageFields'] = implode(',', $merged);
