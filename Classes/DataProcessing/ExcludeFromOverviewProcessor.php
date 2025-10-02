<?php
declare(strict_types=1);

namespace AndreasLoewer\PageOverview\DataProcessing;

use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

final class ExcludeFromOverviewProcessor implements DataProcessorInterface
{
    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    ) {
        $source = $processorConfiguration['source'] ?? 'menu';
        $field  = $processorConfiguration['field']  ?? 'tx_page_overview_exclude';

        if (empty($processedData[$source]) || !is_array($processedData[$source])) {
            return $processedData;
        }

        $processedData[$source] = array_values(array_filter(
            $processedData[$source],
            static fn(array $item): bool => empty($item['data'][$field])
        ));

        return $processedData;
    }
}
