<?php
/**
 * Created by PhpStorm.
 * User: b_vitis
 * Date: 31/01/2018
 * Time: 09:09
 */

namespace App\Service;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ContactSessionManager implements IModelManager {

    const KEY='contacts';
    private $session;

    private function updateSession($values){
        $this->session->set(self::KEY,$values);
    }
    public function __construct(SessionInterface $session)
    {
        $this->session=$session;
    }

    public function count()
    {
        // TODO: Implement count() method.
    }
    public function delete($indexes)
    {
        // TODO: Implement delete() method.
    }
    public function filterBy($keyAndValues)
    {
        // TODO: Implement filterBy() method.
    }
    public function get($index)
    {
        // TODO: Implement get() method.
    }
    public function getAll()
    {
        return $this->session->get(self::KEY,[]);
    }
    public function insert($object)
    {
        $contacts=$this->getAll();
        $contacts[]=$object;
        $this->updateSession($contacts);
    }
    public function select($indexes)
    {
        // TODO: Implement select() method.
    }
    public function update($object)
    {
        // TODO: Implement update() method.
    }
    public function deleteAll(){
        $contacts=array();
        $this->updateSession($contacts);
    }

    /**
     * @return SessionInterface
     */
    public function getSession(): SessionInterface
    {
        return $this->session;
    }

    /**
     * @param SessionInterface $session
     */
    public function setSession(SessionInterface $session)
    {
        $this->session = $session;
    }

}