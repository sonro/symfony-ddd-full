<?php

namespace App\Infrastructure\Persistance\UnitOfWork\Symfony;

use App\Core\Domain\Persistance\UnitOfWorkInterface;

final class KernelResponseListener
{
    private $unitOfWork;

    public function __construct(UnitOfWorkInterface $unitOfWork)
    {
        $this->unitOfWork = $unitOfWork;
    }

    public function onKernelResponse()
    {
        $this->unitOfWork->commit();
    }
}
