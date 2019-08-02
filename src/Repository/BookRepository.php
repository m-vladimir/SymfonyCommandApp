<?php

namespace App\Repository;

use App\Entity\Book;
use App\Entity\Author;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    private $bookManager;

    public function __construct(RegistryInterface $registry)
    {
        $this->bookManager = $registry->getManagerForClass(Book::class);
        parent::__construct($registry, Book::class);
    }

    public function createBook(string $name, int $yearOfPublication, string $genre, string $annotation)
    {
        if(!$name)
        {
            echo "The name of the book is empty";
            die();
        }
        $book = new Book();
        $book->setName($name);
        $book->setYearOfPublication($yearOfPublication);
        $book->setGenre($genre);
        $book->setAnnotation($annotation);

        $this->bookManager->persist($book);
        $this->bookManager->flush();
    }

    public function getBook(int $id): Book
    {
        $book = $this->find($id);

        if(!$book)
        {
            echo "No book found for id $id";
            die();
        }
        
        return $book;
    }

    public function deleteBook(int $id)
    {
        $book = $this->getBook($id);
        $this->bookManager->remove($book);
        $this->bookManager->flush();
    }

    public function attachAuthorToBook(Book $book, Author $author) 
    {
        $book->addAuthor($author);
        $this->bookManager->flush();
    }

    public function detachAuthorFromBook(Book $book, Author $author) 
    {
        $bookAuthors = $book->getAuthors();
        $isTheBookAuthor = False;
        foreach($bookAuthors as $bookAuthor)
        {
            if($author === $bookAuthor) {
                $isTheBookAuthor = True;
            }
        }

        if($isTheBookAuthor)
        {
            $book->removeAuthor($author);
            $this->bookManager->flush();
        }
        else
        {
            echo "The author is not attached to the book!";
            die();
        }
    }
}
