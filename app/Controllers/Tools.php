<?php

namespace App\Controllers;


use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\EntityManager;
use \Models\Entity;
class Tools extends BaseController {

    public function index() {
        $this->view('system/database_tools');
    }

    public function updateSchemas(){
        $em = $this->doctrine->em;
        $schemaTool = new SchemaTool($em);
        $models = $this->loadModels($em);
        $schemaTool->updateSchema($models);
        $this->response->setBody(json_encode(['error' => false, 'message' =>'updatedSucassfuly']));
        return $this->response;
    }

    private function loadModels(EntityManager $entityManager): array{
        $models = [
            $entityManager->getClassMetadata(Entity\User::class)
        ];
        return $models;
    }


}