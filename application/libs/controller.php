<?php

/**
 * This is the "base controller class". All other "real" controllers extend this class.
 */
class Controller
{
    /**
     * @var null Database Connection
     */
    public $db = null;

    /**
     * Whenever a controller is created, open a database connection too. The idea behind is to have ONE connection
     * that can be used by multiple models (there are frameworks that open one connection per model).
     */
    function __construct()
    {
        $this->databaseConnection();
    }

    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function databaseConnection()
    {
        // Les connexions sont établies en créant des instances de la classe de base de PDO
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);
    }

    /**
     * Load the model with the given name.
     * loadModel("ChatModel") would include models/chatmodel.php and create the object in the controller, like this:
     * $chatModel = $this->loadModel('ChatModel');
     * @param string $modelName The name of the model
     * @return object model
     */
    public function loadModel($modelName)
    {
        require 'application/models/' . strtolower($modelName) . '.php';
        // return new model (and pass the database connection to the model)
        return new $modelName($this->db);
    }

    public function render($view, $data_array = array())
    {
        //load Twig, le moteur de template
        $twig_loader = new Twig_Loader_Filesystem(PATH_VIEWS);
        $twig = new Twig_Environment($twig_loader);

        //rendre une vue en passant les données à rendre
        echo $twig->render($view . PATH_VIEW_FILE_TYPE, $data_array);
    }
}
