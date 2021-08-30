<?php
namespace Libraries;

use Doctrine\Common\ClassLoader,
    Doctrine\ORM\Configuration,
    Doctrine\ORM\EntityManager,
    Doctrine\Common\Cache\ArrayCache,
    Doctrine\DBAL\Logging\EchoSQLLogger;
Use Config\Database;

class Doctrine {

    public ?EntityManager $em = null;

    public function __construct()
    {
        $databse =  new Database();

        $doctrineClassLoader = new ClassLoader('Doctrine',  APPPATH.'libraries');
        $doctrineClassLoader->register();
        $entitiesClassLoader = new ClassLoader('Models', rtrim(APPPATH, "/" ));
        $entitiesClassLoader->register();
        $proxiesClassLoader = new ClassLoader('Proxies', APPPATH.'models/proxies');
        $proxiesClassLoader->register();

        // Set up caches
        $config = new Configuration;
        $cache = new ArrayCache;
        $config->setMetadataCacheImpl($cache);
        $driverImpl = $config->newDefaultAnnotationDriver(array(APPPATH.'Models/Entities'));
        $config->setMetadataDriverImpl($driverImpl);
        $config->setQueryCacheImpl($cache);
        $config->setQueryCacheImpl($cache);

        // Proxy configuration
        $config->setProxyDir(APPPATH.'/Models/proxies');
        $config->setProxyNamespace('Proxies');
        $config->setAutoGenerateProxyClasses( TRUE );

        // Database connection information
        $connectionOptions = array(
            'driver'    =>  $databse->default["DBDriver"],
            'user'      =>  $databse->default["username"],
            'password'  =>  $databse->default["password"],
            'host'      =>  $databse->default["hostname"],
            'dbname'    =>  $databse->default["database"]
        );

        // Create EntityManager
        $this->em = EntityManager::create($connectionOptions, $config);
    }
}
