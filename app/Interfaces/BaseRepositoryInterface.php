<?php

namespace App\Interfaces;

interface BaseRepositoryInterface
{
    /**
     * Get all records.
     *
     * @return array
     */
    public function all();

    /**
     * Find a record by its ID.
     *
     * @param mixed $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create a new record.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update a record by its ID.
     *
     * @param mixed $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);
    /**
     * Delete a record by its ID.
     *
     * @param mixed $id
     * @return bool
     */
    public function delete($id);
}