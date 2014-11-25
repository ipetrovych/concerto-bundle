<?php

namespace Ctrl\Bundle\ConcertoBundle\Tests\Fixtures\ORM\Repository;

use Ctrl\Bundle\ConcertoBundle\ORM\Repository\ConcertoEntityRepository;

class ConcertoTestCustomAwareEntityRepository extends ConcertoEntityRepository
{
    protected $soloistField;

    public function getSoloistField()
    {
        return $this->soloistField;
    }

    public function setSoloistField($sf)
    {
        if($sf == $this->soloistField){
            return;
        } else {
            $this->soloistField = $sf;
        }
    }
}
