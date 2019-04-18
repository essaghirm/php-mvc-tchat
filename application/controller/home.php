<?php

/**
 * Class Home
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * Cette méthode gère ce qui se passe lorsque on déplace de http://127.0.0.1/php-mvc-tchat/home/index (default page)
     */

    public function index()
    {
        // load a model, perform an action, pass the returned data to a variable
        $chatModel = $this->loadModel('ChatModel');
        $chats = $chatModel->getAllMessage();

        // render the view, pass the data
        $this->render('home/index', array('chats' => $chats));
    }
    /**
     * PAGE: addMessage
     * Cette méthode gère ce qui se passe lorsque on déplace de http://127.0.0.1/php-mvc-tchat/home/addMessage
     */
    public function addMessage()
    {
        // if we have POST data to create a new song entry
        if (isset($_POST["submit_add_message"])) {
            $chat_model = $this->loadModel('ChatModel');
            $chat_model->addMessage($_POST["pseudo"], $_POST["message"]);
        }

        // where to go after song has been added
        header('location: ' . URL . 'home/index');
    }

}
