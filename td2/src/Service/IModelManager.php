<?php
/**
 * Created by PhpStorm.
 * User: b_vitis
 * Date: 31/01/2018
 * Time: 09:09
 */

namespace App\Service;

interface IModelManager
{

    public function getAll();
    public function insert($object);
    public function update($object,$values);
    public function delete($indexes);
    public function get($index);
    public function filterBy($keyAndValues);
    public function size();
    public function select($indexes);
}