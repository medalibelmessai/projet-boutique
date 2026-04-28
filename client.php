<?php

class Client {

    private $nom;
    private $email;
    private $password;

    public function __construct($nom, $email, $password) {
        $this->nom = $nom;
        $this->email = $email;
        $this->password = $password;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }
}