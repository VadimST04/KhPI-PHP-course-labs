<?php
require_once 'Database.php';

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database(
            getenv('DB_HOST'),
            getenv('POSTGRES_DB'),
            getenv('POSTGRES_USER'),
            getenv('POSTGRES_PASSWORD')
        );
    }

    public function getUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    public function registrate($data)
    {
        $sql = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';
        $this->db->query($sql);

        $data['password'] = md5($data['password']);

        $this->db->bind(':name', $data['name'], PDO::PARAM_STR);
        $this->db->bind(':email', $data['email'], PDO::PARAM_STR);
        $this->db->bind(':password', $data['password'], PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function login($data)
    {
        $sql = 'SELECT * FROM users WHERE email = :email';
        $this->db->query($sql);
        $this->db->bind(':email', $data['email'], PDO::PARAM_STR);

        $user = $this->db->single();

        if (md5($data['password']) === $user->password) {
            return $user;
        } else {
            return false;
        }
    }
}
