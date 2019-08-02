<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Book;

class BookListCommand extends Command
{
    protected static $defaultName = 'book:list';
    private $bookRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->bookRepository = $entityManager->getRepository(Book::class);
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Print all books.');
        $this->setHelp('Print all books in DB.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $books = $this->bookRepository->findAll();
        foreach($books as $book)
        {
            $output->writeln("Book ID: {$book->getId()}\nName: {$book->getName()}");

            $publicationYear = $book->getYearOfPublication();
            if($publicationYear) { $output->writeln("Year of publication: $publicationYear"); }

            $genre = $book->getGenre();
            if($genre) { $output->writeln("Genre: $genre"); }

            $annotation = $book->getAnnotation();
            if($annotation) { $output->writeln("Annotation: $annotation"); }

            $authors = $book->getAuthors();
            $authorNames = !count($authors) ? "" : "Authors: ";
            foreach($authors as $author)
            {
                $authorNames .= "$author, ";
            }
            $authorNames = !count($authors) ? "" : substr($authorNames, 0, -2)."\n";
            $output->writeln($authorNames);
        }
    }
}
?>