<?php

namespace App\Generic;

interface CRUDInterface {

    public function select(string $query, array $values, bool $selectOne);
    public function insert(string $query, array $values);
    public function update(string $query, array $values);
    public function delete(string $query, array $values);
    
}