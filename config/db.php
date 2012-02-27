<?php

    //set to 0 if working locally
    $sulley = 0;
    
    if($sulley)
    {
        try
        {            
            $user = "ad060389";
            $pwd = "boerema";

            $conn = new PDO("mysql:host=localhost;dbname=ad060389", $user, $pwd);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        }
        catch (PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage() . "\n";
            exit;
        }
    }
    else
    {
        try
        {        
            $user = "root";
            $pwd = "";

            $conn = new PDO("mysql:host=localhost;dbname=dig4104", $user, $pwd);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        } 
        catch (PDOException $e) 
        {
            echo "Connection failed: " . $e->getMessage() . "\n";
            exit;
        }
    }
?>