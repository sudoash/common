<?php

declare(strict_types=1);

namespace Umber\Common\Database\Manager\Repository\Factory;

use Umber\Common\Database\EntityRepositoryFactoryInterface;
use Umber\Common\Database\EntityRepositoryInterface;
use Umber\Common\Database\Manager\Repository\AbstractDoctrineEntityRepository;
use Umber\Common\Database\Pagination\PaginatorFactoryInterface;

use Symfony\Bridge\Doctrine\RegistryInterface;

use Exception;

/**
 * {@inheritdoc}
 */
final class DoctrineEntityRepositoryFactory implements EntityRepositoryFactoryInterface
{
    private $registry;
    private $paginatorFactory;

    public function __construct(RegistryInterface $registry, PaginatorFactoryInterface $paginatorFactory)
    {
        $this->registry = $registry;
        $this->paginatorFactory = $paginatorFactory;
    }

    /**
     * {@inheritdoc}
     *
     * @throws Exception
     */
    public function create(string $entity): EntityRepositoryInterface
    {
        $em = $this->registry->getEntityManager();

        /** @var AbstractDoctrineEntityRepository $class */
        $class = $em->getClassMetadata($entity)->customRepositoryClassName;

        if ($class === null) {
            throw new Exception('must define repository class');
        }

        $repository = new $class(
            $entity,
            $em,
            $this->paginatorFactory
        );

        if (!$repository instanceof EntityRepositoryInterface) {
            throw new Exception('missing entity repository interface');
        }

        return $repository;
    }
}
