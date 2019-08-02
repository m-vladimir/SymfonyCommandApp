<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Author;

class AuthorListCommand extends Command
{
    protected static $defaultName = 'author:list';
    private $authorRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->authorRepository = $entityManager->getRepository(Author::class);
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Print all authors.');
        $this->setHelp('Print all authors in DB.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $authors = $this->authorRepository->findAll();
        foreach($authors as $author)
        {
            $output->writeln("Author ID: {$author->getId()}\nName: {$author->getName()}");

            $age = $author->getAge();
            if($age) { $output->writeln("Age: $age"); }

            $books = $author->getBooks();
            $bookNames = !count($books) ? "" : "Authors: ";
            foreach($books as $book)
            {
                $bookNames .= "$book, ";
            }
            $bookNames = !count($books) ? "" : substr($bookNames, 0, -2)."\n";
            $output->writeln("$bookNames");
        }
    }
}
?>