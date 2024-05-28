<?php

use PHPUnit\Framework\TestCase;
use App\UserRepository;

class UserRepositoryTest extends TestCase {
    private $pdo;
    private $repository;

    protected function setUp(): void {
        // On utilise le in memory de sqlite pour voir si un nouvel utilisateur est bien créé avec les propriétés attendues
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->exec("CREATE TABLE users (id INTEGER PRIMARY KEY, name TEXT, email TEXT)");
        $this->pdo->exec("INSERT INTO users (id, name, email) VALUES (1, 'John Doe', 'john@example.com')");

        $this->repository = new UserRepository($this->pdo);
    }

    public function testFind() {
        $user = $this->repository->find(1);
        // On teste si on retrouve bien les propriétés attendues
        $this->assertEquals('John Doe', $user['name']);
        $this->assertEquals('john@example.com', $user['email']);
    }
}
