<?php

namespace app\Interfaces;

use app\Interfaces\ComicBookType;
use app\Enums\Format;

interface ComicBook
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getId(): int;

    public function setId(int $id): void;

    public function getDescription(): string;

    public function setDescription(string $description): void;

    public function getType(): ComicBookType;

    public function setType(ComicBookType $type): void;

    public function getFormat(): Format;

    public function setFormat(Format $format): void;
}
