<?php
/**
 *  /$$$$$$$  /$$$$$$$$  /$$$$$$   /$$$$$$  /$$   /$$  /$$$$$$
 * | $$__  $$| $$_____/ /$$__  $$ /$$__  $$| $$$ | $$ /$$__  $$
 * | $$  \ $$| $$      | $$  \__/| $$  \ $$| $$$$| $$| $$  \ $$
 * | $$$$$$$/| $$$$$   | $$      | $$  | $$| $$ $$ $$| $$$$$$$$
 * | $$__  $$| $$__/   | $$      | $$  | $$| $$  $$$$| $$__  $$
 * | $$  \ $$| $$      | $$    $$| $$  | $$| $$\  $$$| $$  | $$
 * | $$  | $$| $$$$$$$$|  $$$$$$/|  $$$$$$/| $$ \  $$| $$  | $$
 * |__/  |__/|________/ \______/  \______/ |__/  \__/|__/  |__/
 *
 * @see https://recona.app
 */

declare(strict_types=1);

namespace Recona\Api;

use PHPUnit\Framework\TestCase;
use Recona\Api\Base\BaseService;
use Recona\Api\Base\RequestMetaDataFactory;
use Recona\Api\Summary\RequestFactory;
use Recona\Api\Summary\ResponseFactory;

class SummaryTest extends TestCase
{
    private const TEXT = 'The oldest words we know of are building block words, reflecting key elements in developing societies across humanity. So, let\'s look at some of the oldest words we could find a linguistic square one. These words go back more than a thousand years! "Back in the day," indeed.↵↵Love is one of the oldest English words, it came about before the year 900. Even before there was social media, Netflix and chill, or bouquets of roses... people wanted some way to express their attachment and affection toward others. Love is love is love, right?';

    public function testSummarize(): void
    {
        $service = new BaseService();

        $requestFactory = new RequestFactory(
            new RequestMetaDataFactory()
        );

        $responseFactory = new ResponseFactory();

        $request = $requestFactory->create(
            'https://recona.app/api/demo/',
            '1234',
            self::TEXT
        );

        $result = $service->postJsonToBody($request);
        $response = $responseFactory->create($result);

        $this->assertTrue(!empty($response->getSentences()));
        $this->assertTrue(!empty($response->getWords()));
    }
}
