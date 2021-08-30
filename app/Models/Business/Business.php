<?php

namespace Models\Business;


use Doctrine\ORM\EntityRepository;
use Libraries\Doctrine;
use  \Doctrine\ORM\EntityManager;
use  \Doctrine\ORM\Tools\Pagination\Paginator;
use \Doctrine\ORM\Query;

abstract class Business {
    protected  EntityManager $em;
    private EntityRepository $repository;
    private string $entityPath;

    public function __construct(string $entityPath) {
        $doctrine = new Doctrine();
        $this->em = $doctrine->em;
        $this->entityPath  = $entityPath;
        $this->repository = $this->em->getRepository($this->entityPath);
    }

    protected abstract function findAllPaginated(string $query, int $initResultCount, int $countOfResults) : array;

    public function findAll() : array {
       return $this->repository->findAll();
    }

    public function findById(int $id) : object {
        return $this->repository->findOneBy(['id' => $id]);
    }


    public function findBy(array $criteria, array $order = null): array {
        return $this->repository->findBy($criteria, $order ? $order : null);
    }

    protected function getPagnator ( Query $dql, ?bool $fetchJoin = true): Paginator  {
        return new Paginator($dql, $fetchJoin);
    }

}