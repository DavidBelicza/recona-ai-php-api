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

/** @noinspection PhpComposerExtensionStubsInspection */

declare(strict_types=1);

namespace Recona\Api\Base;

use Recona\Api\Base\Exception\ApiRequestException;

class BaseService
{
    public function postJsonToBody(DomainRequestInterface $request): array
    {
        $meta = $request->getRequestMetaData();
        $resource = curl_init($meta->getUrl());

        curl_setopt_array(
            $resource,
            [
                CURLOPT_POST           => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER     => [
                    'Authorization: ' . $meta->getToken(),
                    'Content-Type: application/json'
                ],
                CURLOPT_POSTFIELDS     => json_encode($request)
            ]
        );

        $rawResult = curl_exec($resource);

        if ($rawResult === false) {
            throw new ApiRequestException(
                'No response has received!'
            );
        }

        $result = json_decode($rawResult, true);

        if (!is_array($result)) {
            throw new ApiRequestException(
                'JSON decode error!'
            );
        }

        if ($result['Success'] !== true) {
            $errors = implode(', ', $result['Errors']);

            throw new ApiRequestException(
                'A.I. can not proceed the request: ' . $errors
            );
        }

        return $result;
    }
}
