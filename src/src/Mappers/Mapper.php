<?php

namespace Application\Mappers;

use Application\Persistence\Db;

abstract class Mapper
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getDb();
    }
}