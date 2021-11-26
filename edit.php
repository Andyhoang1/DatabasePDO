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
        <title>edit/serie</title>
    </head>
        <body>
            <h1>vul in wat je kan<h1>
            <form method ="POST">
                <a href="index.php">terug</a><br>
                <p>Type</p>
                <select name="type">
                    <option value="serie">serie</option>
                    <option value="film">film</option>
                </select>
                <p>Title</p><input type="text" name="title" value="">
                <p>Rating</p><input type="text" name="rating" value="">
                <p>Description</p><input type="text" name="description" value="">
                <p>Has_won_awards</p><input type="text" name="has_won_awards" value="">
                <p>Seasons</p><input type="text" name="seasons" value="">
                <p>Country</p><input type="text" name="country" value="">
                <p>language</p><input type="text" name="language" value="">
                <p>Length</p><input type="text" name="length" value="">
                <p>Date_of_origin</p><input type="text" name="date_of_origin" value="">
                <p>Country_of_origin</p><input type="text" name="country_of_origin" value="">
                <p>Trailerlink</p><input type="text" name="trailerlink" value="">
                
                <input type="submit" name="update">
            </form>
            <?php
            if (isset($_POST["update"])) {
                $id = $_POST["title"];
                $query = "UPDATE media 
                SET title='$_POST[title]', rating='$_POST[rating]', 
                description='$_POST[description]', has_won_awards='$_POST[has_won_awards]', seasons='$_POST[seasons]', country='$_POST[country]', language='$_POST[language]', type='$_POST[type]',
                length='$_POST[length]', date_of_origin='$_POST[date_of_origin]', country_of_origin='$_POST[country_of_origin]', trailerlink='$_POST[trailerlink]'
                WHERE id='$_GET[id]'";
                echo $query;
                $PDO->query($query);
            }
            ?>
        </body>
</html>