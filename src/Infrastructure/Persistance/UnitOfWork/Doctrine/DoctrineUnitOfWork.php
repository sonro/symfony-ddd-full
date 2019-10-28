<?php

namespace App\Infrastructure\Persistance\UnitOfWork\Doctrine;

use App\Core\Domain\Persistance\UnitOfWorkInterface;
use Doctrine\ORM\EntityManagerInterface;

final class DoctrineUnitOfWork implements UnitOfWorkInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var int
     */
    private $transactionsSaved;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->transactionsSaved = 0;
    }

    public function save(): void
    {
        ++$this->transactionsSaved;
    }

    public function commit(): void
    {
        if ($this->transactionsSaved > 0) {
            $this->entityManager->flush();
        }
    }
}
