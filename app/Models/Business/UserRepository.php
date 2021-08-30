<?php

namespace Models\Business;

use Models\Entity\User;

class UserRepository extends Business {


    public function __construct() {
        parent::__construct(User::class);
    }

    public function findAllPaginated(string $query, int $initResultCount, int $countOfResults) : array {
        $dql = $query ;
        $doctrineResultQuery = $this->em->createQuery($dql)
            ->setFirstResult($initResultCount)
            ->setMaxResults($countOfResults);
        $paginator = $this->getPagnator($doctrineResultQuery);
        $results = [
            'results' => $paginator,
            'count' => count($paginator)
        ];
        return $results;
    }

}