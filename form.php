<?php
 $db = mysqli_connect('localhost','root','Password','se_proj')
 or die('Error connecting to MySQL server.');

/*if($db)
{
    echo "Connection Successful";
    echo "\n";
}*/
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
           
    </head>
    <h1>Results</h1>
    <body>
   
       <h2> test</h2>
        <img src="nopic.png" alt="noimage">

   
        <?php
        
            if(!empty($_GET['genres'])){
                foreach($_GET['genres'] as $item)
                {
                    $query = "SELECT * FROM movies WHERE genres = '$item' ORDER BY RAND() LIMIT 1";

                    mysqli_query($db, $query) or die('Error querying database.');
                
                    global $result;
                    $result = mysqli_query($db, $query);
                
       
                   while ($row = mysqli_fetch_array($result)) {
                   echo $row['title'] . ' ' . $row['rating'] . ': ' . $row['genres'] .'<br />';
                        
                   global $test; 
                   $test = $row['title'];
                        
                   

                    }


                }

                function contains_dupes($array)
                {
                    $contain_dupes = array();
                    foreach($array as $r)
                    {
                        if(++$contain_dupes[$r] > 1)
                        {
                            return true;
                        }
                        return false;
                    }
                }
            }
            else {
                echo "No Checkbox was selected. Showing no movies";
            }
        ?>

        <?php

?>
    
   
   <script type="text/javascript"> 
        var x = "<?php echo"$test"?>"; 
        document.write(x); 

        if (x)
        {
       
        function apiCall () {
            console.log(x);
            
            $.getJSON('http://www.omdbapi.com/?apikey=b236647d&t=' + encodeURI(x)).then(function(response)
            {
            var image = response.Poster;

            if(image != "NA")
            {
                $('img').attr('src', image);
            }
            
            });
            }
            apiCall();
        }

        else {
            document.write("test");
        }

    </script>
    
     
    </body>
</html>