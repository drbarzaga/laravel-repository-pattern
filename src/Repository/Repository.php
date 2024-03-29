<?php


namespace Softok2\Repository;


use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;

abstract class Repository implements RepositoryInterface
{
    /** @var App */
    private $app;

    /** @var Model */
    private $model;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    abstract public function model();

    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model) {
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\Database\Eloquent\Model");
        }
        return $this->model = $model;
    }

    public function all($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    public function list($orderByColumn, $orderBy = 'desc', $with = [], $columns = ['*'])
    {
        return $this->model->with($with)
            ->orderBy($orderByColumn, $orderBy)
            ->get($columns);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id, $attribute = 'id')
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    public function findBy(string $field, $value, $columns = array('*'))
    {
        return $this->model->where($field, $value)
            ->select($columns)
            ->first();
    }

    public function findAllBy(string $field, $value, $columns = array('*'))
    {
        return $this->model->where($field, $value)
            ->select($columns)
            ->get();
    }

    public function paginate($perPages = 15)
    {
        return $this->model->paginate($perPages);
    }

    public function setModel(Model $model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }
}
