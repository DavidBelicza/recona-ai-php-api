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

use Recona\Api\Summary\Response\Sentence;
use Recona\Api\Summary\Response\SingleWord;

class ResponseFactory
{
    public function create(array $result): Response
    {
        $singleWords = [];
        $sentences = [];

        foreach ($result['Data']['SingleWords'] as $singleWord) {
            $singleWords[] = new SingleWord(
                (int)$singleWord['ID'],
                trim($singleWord['Word']),
                (float)$singleWord['Weight'],
                (int)$singleWord['Qty']
            );
        }

        foreach ($result['Data']['SentencesByRelation'] as $singleWord) {
            $sentences[] = new Sentence(
                (int)$singleWord['ID'],
                trim($singleWord['Value'])
            );
        }

        return new Response($singleWords, $sentences);
    }
}
