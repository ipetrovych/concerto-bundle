<?php

namespace Ctrl\Bundle\ConcertoBundle\ORM;

use Ctrl\Bundle\ConcertoBundle\Model\Soloist;
use Ctrl\Bundle\ConcertoBundle\Model\SoloistAwareInterface;
use Doctrine\Common\EventManager;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;

/**
 * Class Conductor
 *
 * An Entity Manager with a soloist property and filter.
 */
class Conductor extends EntityManager implements SoloistAwareInterface
{
    /** @var Soloist */
    protected $soloist;

    /**
     * Factory method to create Conductor instances.
     *
     * @param mixed         $conn         An array with the connection parameters or an existing Connection instance.
     * @param Configuration $config       The Configuration instance to use.
     * @param EventManager  $eventManager The EventManager instance to use.
     *
     * @return Conductor The created Conductor.
     *
     * @throws \InvalidArgumentException
     * @throws ORMException
     */
    public static function create($conn,  Configuration $config, EventManager $eventManager = null)
    {
        $config->addFilter('soloist', 'Ctrl\Bundle\ConcertoBundle\ORM\Filter\SoloistFilter');

        return parent::create($conn, $config, $eventManager);
    }

    /**
     * AKA "The Tenant"
     *
     * @return Soloist
     */
    public function getSoloist()
    {
        return $this->soloist;
    }

    /**
     * Sets the Soloist.
     *
     * @param  Soloist $soloist The Soloist to set
     */
    public function setSoloist(Soloist $soloist)
    {
        if( $this->soloist === $soloist ) {
            return;
        }
        $this->soloist = $soloist;
    }

}
