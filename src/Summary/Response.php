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

class Response
{
    private $words;
    private $sentences;

    public function __construct(array $words, array $sentences)
    {
        $this->words = $words;
        $this->sentences = $sentences;
    }

    public function getWords(): array
    {
        return $this->words;
    }

    public function getSentences(): array
    {
        return $this->sentences;
    }
}
