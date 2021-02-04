<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    /**
     * @return Model
     */
    public function getModel();
}
