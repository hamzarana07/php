
<html>
    <head>
        <title>RSS</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body style="display:block; text-align: center">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <?php
        $context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
        $url = 'https://www.gsmarena.com/rss-news-reviews.php3';

        $xml = file_get_contents($url, false, $context);
        $xml = simplexml_load_string($xml);
        //print_r($xml);
        //foreach($xml->children() as $chann){
            //echo $chann->item[1]->title;
            //echo "<br>";
        //}


        try{
            for ($x=0; $x <=4; $x++){
                echo "<div class='row' style='margin-top:20px;'>";
                echo "<div class='card text-white bg-dark mb-3'; style='max-width: 18rem;display:block;width:50%;margin:auto;
'>";
                echo "<div class='card-header'><h4>" . $xml->channel->item[$x]->title . "</h4></div>";
                echo "<br>";
                echo "<div class='card-body'>";
                echo "<p>" . $xml->channel->item[$x]->link. "</p>";
                echo "<br>";
                echo "<p>" . $xml->channel->item[$x]->image->url. "</p>";
                echo "<br>";
                echo "<p>" . $xml->channel->item[$x]->pubDate. "</p>";
                echo "<br>";
                echo "<p>" . $xml->channel->item[$x]->category. "</p>";
                echo "<br>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        }
        catch(Exception $e){
            echo "Error";
        }
        echo "<nav aria-label='Page navigation example'>";
          echo "<ul class='pagination' style='display:inline-flex;'>";
            echo "<li class='page-item'><a class='page-link' href='index.php'>1</a></li>";
            echo "<li class='page-item'><a class='page-link' href='2.php'>2</a></li>";
            echo "<li class='page-item'><a class='page-link' href='3.php'>3</a></li>";
            echo "<li class='page-item'><a class='page-link' href='4.php'>4</a></li>";
          echo "</ul>";
        echo "</nav>";


        ?>
    </body>
</html>
