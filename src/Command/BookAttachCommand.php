<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Book;
use App\Entity\Author;
use Symfony\Component\Console\Input\InputOption;

class BookAttachCommand extends Command
{
    protected static $defaultName = 'book:attach';
    private $bookRepository;
    private $authorRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->bookRepository = $entityManager->getRepository(Book::class);
        $this->authorRepository = $entityManager->getRepository(Author::class);
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Attach book to author.');
        $this->setHelp('Attach book to author provided by ID.');
        $this->addOption('author', null, InputOption::VALUE_REQUIRED,
                         'Attach book to author provided by ID.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $authorID = $input->getOption("author");
        do {
            $bookID = readline("Enter the book ID to attach: ");
            if(is_numeric($bookID))
            {
                break;
            }
            else
            {
                $output->writeln("ID value should be integer! Please reenter.");
            }
        } while(True);
        $bookID = (int)$bookID;

        if(!$authorID || !is_numeric($authorID))
        {
            $output->writeln("Invalid author ID provided!");
        }
        else
        {
            $book = $this->bookRepository->getBook($bookID);
            $author = $this->authorRepository->getAuthor($authorID);
            $this->bookRepository->attachAuthorToBook($book, $author);
        }
    }
}
?>