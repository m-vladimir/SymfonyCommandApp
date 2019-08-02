<?php

namespace App\Repository;

use App\Entity\Author;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Author|null find($id, $lockMode = null, $lockVersion = null)
 * @method Author|null findOneBy(array $criteria, array $orderBy = null)
 * @method Author[]    findAll()
 * @method Author[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuthorRepository extends ServiceEntityRepository
{
    private $authorManager;

    public function __construct(RegistryInterface $registry)
    {
        $this->authorManager = $registry->getManagerForClass(Author::class);
        parent::__construct($registry, Author::class);
    }

    public function createAuthor(string $name, int $age)
    {
        if(!$name)
        {
            echo "Author's name is empty";
            die();
        }
        $author = new Author();
        $author->setName($name);
        $author->setAge($age);

        $this->authorManager->persist($author);
        $this->authorManager->flush();
    }

    public function getAuthor(int $id): Author
    {
        $author = $this->find($id);

        if(!$author)
        {
            echo "No author found for id $id";
            die();
        }
        
        return $author;
    }

    public function deleteAuthor(int $id)
    {
        $author = $this->getAuthor($id);
        $this->authorManager->remove($author);
        $this->authorManager->flush();
    }
}
