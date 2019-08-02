<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Author;

class AuthorAddCommand extends Command
{
    protected static $defaultName = 'author:add';
    private $authorRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->authorRepository = $entityManager->getRepository(Author::class);
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Add author to DB.');
        $this->setHelp('Add author to DB.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = readline("Enter name of the author: ");
        do
        {
            $age = readline("Enter the age of the author: ");
            if(is_numeric($age))
            {
                break;
            }
            else
            {
                $output->writeln("Age value should be integer! Please reenter.");
            }
        } while(True);
        $age = (int)$age;

        $this->authorRepository->createAuthor($name, $age);
    }
}
?>