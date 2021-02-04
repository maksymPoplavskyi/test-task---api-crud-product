<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface
{
    /**
     * @return Model
     */
    abstract public function getModel();

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->getModel()->all();
    }
}
