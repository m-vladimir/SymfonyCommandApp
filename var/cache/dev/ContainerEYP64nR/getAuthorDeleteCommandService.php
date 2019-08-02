<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'App\Command\AuthorDeleteCommand' shared autowired service.

include_once $this->targetDirs[3].'/vendor/symfony/console/Command/Command.php';
include_once $this->targetDirs[3].'/src/Command/AuthorDeleteCommand.php';

$this->privates['App\\Command\\AuthorDeleteCommand'] = $instance = new \App\Command\AuthorDeleteCommand(($this->services['doctrine.orm.default_entity_manager'] ?? $this->load('getDoctrine_Orm_DefaultEntityManagerService.php')));

$instance->setName('author:delete');

return $instance;