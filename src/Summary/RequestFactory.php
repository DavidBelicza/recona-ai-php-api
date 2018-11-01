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

namespace Recona\Api\Summary;

use Recona\Api\Base\RequestMetaDataFactory;

class RequestFactory
{
    private $requestMetaDataFactory;

    public function __construct(RequestMetaDataFactory $requestMetaDataFactory)
    {
        $this->requestMetaDataFactory = $requestMetaDataFactory;
    }

    public function create(
        string $url,
        string $token,
        string $text
    ): Request {

        $requestMetaData = $this->requestMetaDataFactory->create($url, $token);

        return new Request(
            $requestMetaData,
            $text
        );
    }
}
