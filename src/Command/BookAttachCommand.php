<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BookAttachCommand extends Command
{
    protected static $defaultName = 'book:attach';

    protected function configure()
    {
        $this->setDescription('');
        $this->setHelp('');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
    }
}
?>