<?php

// class BookDatabaseConnection
// {
//     public static function ConnectTo_BooksDatabase()
//     {
//         $database = require ('config/config-books.php');
//         try {
//             return new PDO(
//                 $database['connection'].';dbname='.$database['db_name'],
//                 $database['user'],
//                 $database['password']               
//             );
//         }
//         catch (PDOException $e)
//         {
//             echo 'Cannot connect to user database. Please try again later.';
//         }
//     }


// }

 class BooksDatabaseConnection
{
    public static function ConnectTo_BooksDatabase()
    {
        $database = require ('config/config-books.php');
        try {
            return new PDO(
               'pgsql:host=' . $database['host'] . ';dbname=' . $database['dbname'],
                $database['user'],
                $database['password']            
            );
        }
        catch (PDOException $e)
        {
            echo 'Cannot connect to books database. Please try again later.';
        }
    }


} 

?>
