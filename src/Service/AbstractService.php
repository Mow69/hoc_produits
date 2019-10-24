<?php

namespace App\Service;

use App\Db;

abstract class AbstractService
{
    protected $pdo;

    public function __construct()
    {
        try {
            $this->pdo = Db::getInstance();
        } catch (\Exception $ex) {
            throw $ex;
        }
    }
}
