<?php

namespace PMM\CoreBundle\Repository;

/**
 * CommandeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommandeRepository extends \Doctrine\ORM\EntityRepository
{
    public function myFindAll(){
        
        return $this
                ->createQueryBuilder('c')
                ->orderBy('c.date', 'DESC')
                ->getQuery()
                ->getResult();
    }
    
    public function getCommandesBetween(\Datetime $date1, \Datetime $date2)
    {
    
        //$date2->add( new \DateInterval('P1D') );
        
        return $this->createQueryBuilder('c')
                    ->Where('c.date BETWEEN :start AND :end')
                    ->setParameter('start', $date1) 
                    ->setParameter('end', $date2)
                    ->getQuery()
                    ->getResult();
                    ;
    }
    
}
