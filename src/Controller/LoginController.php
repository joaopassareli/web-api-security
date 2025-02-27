<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Controller\Controller;

class LoginController implements Controller
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $dbPath = __DIR__ . '/../../banco.sqlite';
        $pdo = new \PDO("sqlite:$dbPath");
        $this->pdo = $pdo;
    }

	public function processaRequisicao(): void
	{
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
		$sql = "SELECT * FROM users WHERE email = ?;";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->execute();

        $userData = $stmt->fetch(\PDO::FETCH_ASSOC);
        $validPassword = password_verify($password, $userData['password'] ?? '');

        if ($validPassword) {
            if (password_needs_rehash($userData['password'], PASSWORD_ARGON2ID)) {
                $sql = "UPDATE users SET password = ? WHERE id = ?;";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindValue(1, password_hash($password, PASSWORD_ARGON2ID));
                $stmt->bindValue(2, $userData['id']);
                $stmt->execute();
            }
            $_SESSION['logado'] = true;
            header('Location: /');
        }

        header('Location: /login?:sucesso=0');
	}
}
