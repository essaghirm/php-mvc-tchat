<?php

class Chatmodel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    /**
     * Get all songs from database
     */
    public function getAllMessage()
    {
        $sql = "SELECT id, pseudo, message  FROM chat ORDER BY id DESC";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    /**
     * Add a message to database
     * @param string $pseudo
     * @param string $message
     */
    public function addMessage($pseudo, $message)
    {
        // clean the input from javascript code for example
        $pseudo = strip_tags($pseudo);
        $message = strip_tags($message);

        $sql = "INSERT INTO chat (pseudo, message) VALUES (:pseudo, :message)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':pseudo' => $pseudo, ':message' => $message));
    }
}