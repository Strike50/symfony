<?php

namespace App\Repository;

use App\Entity\Contact;
use App\Service\IModelManager;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ContactRepository extends ServiceEntityRepository implements IModelManager
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Contact::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('c')
            ->where('c.something = :value')->setParameter('value', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
    public function getAll()
    {
        return $this->findAll();
    }

    public function insert($object)
    {
        $this->insert($object);
    }

    public function update($object, $values)
    {
        //pour eviter $object->setNom($values["nom"])
        foreach ($values as $key=>$value){
            $accesseur="set".$key;
            if(method_exists($object,$accesseur)){
                $object->$accesseur($value);
            }
        }
        $this->_em->flush($object);
    }

    public function delete($indexes)
    {
        $keys=array_map(function ($index){return 'id='.$index;},$indexes);
        $keys=implode(" or ",$indexes);
        $query=$this->_em->createQuery("DELETE FROM Contact c where ".$keys);
        $query->execute();
    }

    public function get($index)
    {
        // TODO: Implement get() method.
    }

    public function filterBy($keyAndValues)
    {
        // TODO: Implement filterBy() method.
    }

    public function size()
    {
        // TODO: Implement size() method.
    }

    public function select($indexes)
    {
        // TODO: Implement select() method.
    }
}
