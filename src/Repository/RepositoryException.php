<?php


namespace Softok2\Repository;

use Exception;

/**
 * Class RepositoryException
 * @package Softok2\Repository
 */
class RepositoryException extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
