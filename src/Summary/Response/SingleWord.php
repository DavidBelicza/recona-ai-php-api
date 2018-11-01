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

namespace Recona\Api\Summary\Response;

class SingleWord
{
    private $id;
    private $word;
    private $weight;
    private $qty;

    public function __construct(
        int $id,
        string $word,
        float $weight,
        int $qty
    ) {
        $this->id = $id;
        $this->word = $word;
        $this->weight = $weight;
        $this->qty = $qty;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getWord(): string
    {
        return $this->word;
    }

    public function getWeight(): float
    {
        return $this->weight;
    }

    public function getQty(): int
    {
        return $this->qty;
    }
}
