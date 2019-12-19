### Repository Pattern for Laravel Projects

A Simple Repository Pattern implementation for Laravel Projects.

### Install

Require this package via composer using the fallowing command:

``` bash
$ composer require softok2/repository
```

After register the service provider to the `providers` array in `config/app.php`

```php
Softok2\Repository\RepositoryServiceProvider::class,
```

### Usage

This package provides a command for the creation of the repositories classes, it can be used as follows:

```bash
$ php artisan make:repository RepositoryName
```

This would generate a class with the name RepositoryName inside the Repository directory under the app directory.
Or it can be used as follows:

```bash
$ php artisan make:repository RepositoryName --model=ModelName
```

Indicating with the parameter --model the name of the model for which the repository will be generated.

This command generate a class with the following structure, feel free to modify this class and add functionalities to your repository:

```php
<?php

namespace App\Repository;

use Softok2\Repository\Repository;

class UserRepository extends Repository
{
    public function model()
    {
        return Model::class;
    }
}
```

The generated class extends from the ```Softok2\Repository\Repository``` class which implements the interface
```Softok2\Repository\RepositoryInterface``` that has the following methods:

```php
<?php
interface RepositoryInterface
{
    public function all($columns = ['*']);

    public function list($orderByColumn, $orderBy = 'desc', $with = [], $columns = ['*']);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id, $columns = array('*'));

    public function findBy(string $field, $value, $columns = array('*'));

    public function findAllBy(string $field, $value, $columns = array('*'));

    public function paginate($perPages = 15);

    public function setModel(Model $model);

    public function getModel();
}
```
