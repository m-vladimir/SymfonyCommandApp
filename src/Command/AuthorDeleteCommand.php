<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Author;

class AuthorDeleteCommand extends Command
{
    protected static $defaultName = 'author:delete';
    private $authorRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->authorRepository = $entityManager->getRepository(Author::class);
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Delete author from DB.');
        $this->setHelp('Delete author from DB.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        do
        {
            $authorID = readline("Enter the author id: ");
            if(is_numeric($authorID))
            {
                break;
            }
            else
            {
                $output->writeln("ID value should be integer! Please reenter.");
            }
        } while(True);
        $authorID = (int)$authorID;

        $this->authorRepository->deleteAuthor($authorID);
    }
}
?>