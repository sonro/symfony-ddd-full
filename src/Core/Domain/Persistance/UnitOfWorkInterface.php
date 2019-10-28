<?php

namespace App\Core\Domain\Persistance;

interface UnitOfWorkInterface
{
    public function save(): void;

    public function commit(): void;
}
