<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Book;

class BookDeleteCommand extends Command
{
    protected static $defaultName = 'book:delete';
    private $bookRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->bookRepository = $entityManager->getRepository(Book::class);
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Delete book from DB.');
        $this->setHelp('Delete book from DB.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        do
        {
            $bookID = readline("Enter the book's id: ");
            if(is_numeric($bookID))
            {
                break;
            }
            else
            {
                $output->writeln("Book's ID value should be integer! Please reenter.");
            }
        } while(True);
        $bookID = (int)$bookID;

        $this->bookRepository->deleteBook($bookID);
    }
}
?>