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

use Recona\Api\Base\DomainRequestInterface;
use Recona\Api\Base\RequestMetaData;

class Request implements DomainRequestInterface
{
    private $requestMetaData;
    private $text;

    public function __construct(
        RequestMetaData $requestMetaData,
        string $text
    ) {
        $this->requestMetaData = $requestMetaData;
        $this->text = $text;
    }

    public function getRequestMetaData(): RequestMetaData
    {
        return $this->requestMetaData;
    }

    public function jsonSerialize(): array
    {
        return [
            'text' => $this->text
        ];
    }
}
