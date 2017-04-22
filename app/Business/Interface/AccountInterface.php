<?php
namespace App\Business\Interfaces;

interface AccountInterface {

    public function all($columns = array('*'));

    public function paginate($perPage = 10, $columns = array('*'));

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id, $columns = array('*'));

    public function findBy($field, $value, $columns = array('*'));
}
