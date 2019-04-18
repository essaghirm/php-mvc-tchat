php-mvc-tchat
=======
installation : 
 
   1 - git clone  https://github.com/snlabs/php-mvc-tchat.git
   
   2 -  cd php-mvc-tchat
   
   3 -  Configuration pour: base de données (application/config/config.php):
   * C’est l’endroit où vous définissez vos identifiants de base de données, DB_USER et  DB_PASS.
   
   
   4 - lancez les scripts sql ( application/_install ):: 
  
     * 01-create-database.sql
     * 02-create-table-chat.sql
     * 03-insert-demo-data-into-table-chat.sql
   
   5 - lancez la commande : composer install
   