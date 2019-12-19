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

This command generate a class with the following structure:

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
