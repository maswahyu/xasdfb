<?php

namespace App\Http\Repository;

use App\Category;

class CategoryRepository
{
	protected $model;

	function __construct(Category $eloquent)
	{
		$this->model = $eloquent;
	}

	/**
     * Find data by id
     *
     * @param       $id
     * @param array $columns
     *
     * @return mixed
     */
    public function find($id, $columns = ['*'])
    {
        return $this->model->findOrFail($id, $columns);   
    }

	/**
     * Find data by field and value
     *
     * @param       $field
     * @param       $value
     * @param array $columns
     *
     * @return mixed
     */
    public function findByField($field, $value = null)
    {
        return $this->model->where($field, '=', $value)->first();
    }
}