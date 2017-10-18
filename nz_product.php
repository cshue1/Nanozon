<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "sakila";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "DROP TABLE IF EXISTS products;
            CREATE TABLE products(
                itemNum SMALLINT,
                itemName VARCHAR(30) NOT NULL,
                description VARCHAR(1000) NOT NULL,
                price DOUBLE NOT NULL
            );
            
            INSERT INTO products(itemNum, itemName, description, price)
                VALUES (1,
                'Rey',
                'Be the fearless jedi heroine from Star Wars: The Force Awakens.',
                45.00);
            INSERT INTO products(itemNum, itemName, description, price)
                VALUES (2,
                'Kylo Ren',
                'This emotional jedi sith from Star Wars: The Force Awakens will scare all your friends.',
                30.00);
            INSERT INTO products(itemNum, itemName, description, price)
                VALUES (3,
                'Chewbacca',
                'Be the fearless jedi heroine from Star Wars: The Force Awakens.',
                30.00);
            INSERT INTO products(itemNum, itemName, description, price)
                VALUES (4,
                'Harry Potter',
                'Be the famous “Boy Who Lived” from the J.K. Rowling series, Harry Potter.',
                40.00);
            INSERT INTO products(itemNum, itemName, description, price)
                VALUES (5,
                'Hermione Granger',
                'Be the clever heroine from J.K. Rowling’s series, Harry Potter.',
                45.00);
            INSERT INTO products(itemNum, itemName, description, price)
                VALUES (6,
                'Ron Weasley',
                'Harry’s lovable sidekick from J.K. Rowling’s Harry Potter.',
                30.00);
                
            SELECT * FROM products;";
    $result = $conn->query($sql);
    if (!$result) die ("Database access failed: " . mysql_error());

?>