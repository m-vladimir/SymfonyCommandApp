<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'App\Command\AuthorListCommand' shared autowired service.

include_once $this->targetDirs[3].'/vendor/symfony/console/Command/Command.php';
include_once $this->targetDirs[3].'/src/Command/AuthorListCommand.php';

$this->privates['App\\Command\\AuthorListCommand'] = $instance = new \App\Command\AuthorListCommand();

$instance->setName('author:list');

return $instance;
