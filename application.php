#!/usr/bin/env php
<?php
require(__DIR__.'/vendor/autoload.php');

use Symfony\Component\Console\Application;
use App\Command;

$application = new Application();
$application->add(new Command\BookAddCommand());
$application->add(new Command\BookDeleteCommand());
$application->add(new Command\BookListCommand());
$application->add(new Command\AuthorAddCommand());
$application->add(new Command\AuthorDeleteCommand());
$application->add(new Command\AuthorListCommand());
$application->add(new Command\BookAttachCommand());
$application->add(new Command\BookDetachCommand());
$application->run();

?>