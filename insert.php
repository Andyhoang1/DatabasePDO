<!DOCTYPE html>
<html>
<?php
$host = '127.0.0.1:3306';
$db   = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$PDO = new PDO($dsn, $user, $pass);
?>
    <head>
        <title>edit/film</title>
    </head>
        <body>
            <h1>vul in wat je kan<h1>
            <form method ="POST">
                <a href="index.php">terug</a>
                <select name="type">
                    <option value="serie">serie</option>
                    <option value="film">film</option>
                </select>
                <p>Title</p><input type="text" name="title">
                <p>Rating</p><input type="text" name="rating">
                <p>Description</p><input type="text" name="description">
                <p>Has_won_awards</p><input type="text" name="has_won_awards">
                <p>Seasons</p><input type="text" name="seasons">
                <p>Country</p><input type="text" name="country">
                <p>language</p><input type="text" name="language">
                <p>Length</p><input type="text" name="length">
                <p>Date_of_origin</p><input type="text" name="date_of_origin">
                <p>Country_of_origin</p><input type="text" name="country_of_origin">
                <p>Trailerlink</p><input type="text" name="trailerlink">
                <input type="submit" name="update">
            </form>
            <?php
            if (isset($_POST["update"])) {
                $title = $_POST["title"];
                $rating = $_POST["rating"];
                $description = $_POST["description"];
                $has_won_awards = $_POST["has_won_awards"];
                $seasons = $_POST["seasons"];
                $country = $_POST["country"];
                $language = $_POST["language"];
                $length = $_POST["length"];
                $date_of_origin = $_POST["date_of_origin"];
                $country_of_origin = $_POST["country_of_origin"];
                $trailerlink = $_POST["trailerlink"];
                $type = $_POST["type"];
                $query = "INSERT INTO media (`title`, `rating`, `description`, `has_won_awards`, `seasons`, `country`, `language`, `type`,
                `length`, `date_of_origin`, `country_of_origin`, `trailerlink`)
                VALUES (\"$title\", \"$rating\", \"$description\", \"$has_won_awards\", \"$seasons\", \"$country\", \"$language\", \"$type\", 
                \"$length\", \"$date_of_origin\", \"$country_of_origin\", \"$trailerlink\");";
                echo $query;
                $PDO->query($query);
            }
            ?>
        </body>
    </html>