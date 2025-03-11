<?php

namespace app\Interfaces;

interface ComicBookType
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getId(): int;

    public function setId(int $id): void;

    public function getDescription(): string;

    public function setDescription(string $description): void;
}
