<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Book;

class BookAddCommand extends Command
{
    protected static $defaultName = 'book:add';
    private $bookRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->bookRepository = $entityManager->getRepository(Book::class);
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Add book to DB.');
        $this->setHelp('Add book to DB.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = readline("Enter name of the book: ");
        do
        {
            $yearOfPublication = readline("Enter the book's year of publication: ");
            if(is_numeric($yearOfPublication))
            {
                break;
            }
            else
            {
                $output->writeln("Year value should be integer! Please reenter.");
            }
        } while(True);
        $yearOfPublication = (int)$yearOfPublication;

        $genre = readline("Enter name of the book: ");
        $annotation = readline("Enter name of the book: ");

        $this->bookRepository->createBook($name, $yearOfPublication, $genre, $annotation);
    }
}

?>