<?php

namespace App\Repository;

use Illuminate\Support\Collection;

abstract class Repository
{
    /**
     * Define repository modal
     *
     * @like[User::class]
     */
    abstract public function model();

    /**
     * Get all list from model
     *
     * @param null $request
     * @return Collection
     */
    public function getAll()
    {
        return $this->model()::get();
    }

    /**
     * Create modal collection
     *
     * @param $data
     * @return bool|Object
     */
    public function create(array $data)
    {
        return $this->model()::create($data);
    }

    /**
     * Find Row id form model list
     *
     * @param $primaryKey
     * @return Object
     */
    public function find($primaryKey)
    {
        return $this->model()::find($primaryKey);
    }

    /**
     * Find Row id form model list
     *
     * @param $primaryKey
     * @return Object
     */
    public function findOrFail($primaryKey)
    {
        return $this->model()::findOrFail($primaryKey);
    }

    /**
     * Update model
     *
     * @param integer $primaryKey
     * @param $data
     * @return bool|Object
     */
    public function update($primaryKey, $data)
    {
        if (empty($primaryKey) || empty($data)) {
            return false;
        }

        if ($this->findOrFail($primaryKey)->update($data)) {
            return $this->find($primaryKey);
        }
        return false;
    }

    /**
     * Delete a row form collection
     *
     * @param int $primaryKey
     * @return boolean
     */
    public function delete($primaryKey)
    {
        return $this->find($primaryKey)->delete();
    }
}
