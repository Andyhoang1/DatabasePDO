<!DOCTYPE html>
<head>
<title> Movies/Series </title>
</head>
<body>
<h1> Welkom op het netland beheerderspaneel </h1>
<br>
<?php
$host = '127.0.0.1:3306';
$db   = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$PDO = new PDO($dsn, $user, $pass);

$querySeries = "
SELECT
id, title, rating
FROM
media
WHERE
type = 'serie'
";
if (isset($_GET["series_sort"])) {
    if ($_GET['series_sort'] == "title") {
        $querySeries .= "
        ORDER BY 
        title DESC";
    } else if ($_GET['series_sort'] == "rating") {
        $querySeries .= "
        ORDER BY 
        rating DESC";
    }
}
$seriesStatement = $PDO->query($querySeries);
$queryserieseenresultaat = $seriesStatement->fetchAll(PDO::FETCH_ASSOC);

$queryFilms = "
SELECT
id, title, length
FROM
media
WHERE
type = 'film'
";
if (isset($_GET["films_sort"])) {
    if ($_GET['films_sort'] == "title") {
        $queryFilms .= "
        ORDER BY 
        title DESC";
    } else if ($_GET['films_sort'] == "length") {
        $queryFilms .= "
        ORDER BY 
        length DESC";
    }
}
$seriesStatement2 = $PDO->query($queryFilms);
$queryfilmseenresultaat = $seriesStatement2->fetchAll(PDO::FETCH_ASSOC);


?>
    <h1>Series</h1>
        <table>
            <thead>
                <tr>
                    <form method ="GET">
                        <input type="text" value="title" name="series_sort" hidden>    
                        <input type="submit" value="title">
                        <?php
                        if (isset($_GET["films_sort"])) {
                            ?>
                            <input type="text" name="films_sort" value="<?= $_GET["films_sort"]; ?>" hidden>
                            <?php
                        }
                        ?>
                    </form>
                    </th>
                    <th>
                    <form method ="GET">
                        <input type="text" value="rating" name="series_sort" hidden>
                        <input type="submit" value="rating">
                        <?php
                        if (isset($_GET["films_sort"])) {
                            ?>
                            <input type="text" name="films_sort" value="<?= $_GET["films_sort"]; ?>" hidden>
                            <?php
                        }
                        ?>
                    </form>
                </tr>
            </thead>
            <tbody>            
        <?php
        foreach ($queryserieseenresultaat as $second) {
            ?>
            <tr>
                <td>
                    <?php
                    echo $second["title"] . PHP_EOL;
                    ?>
                </td>
                <td>
                    <?php
                    echo $second["rating"] . PHP_EOL;
                    ?>
                </td>
                <td>
                <a href="series.php?id=<?php
                echo $second["id"]; ?>">details
                </td>
                <td>
                <a href="edit.php?id=<?php
                echo $second["id"]; ?>">wijzig
                </td>
                <td>
                <a href="insert.php?id=<?php
                echo $second["id"]; ?>">toevoegen
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        </table>
        <h1>Films</h1>
        <table>
        <thead>
                <tr>
                    <form method ="GET">
                        <input type="text" value="title" name="films_sort" hidden>    
                        <input type="submit" value="title">
                        <?php
                        if (isset($_GET["series_sort"])) {
                            ?>
                            <input type="text" name="series_sort" value="<?= $_GET["series_sort"]; ?>" hidden>
                            <?php
                        }
                        ?>
                    </form>
                    </th>
                    <th>
                    <form method ="GET">
                        <input type="text" value="length" name="films_sort" hidden>
                        <input type="submit" value="length">
                        <?php
                        if (isset($_GET["series_sort"])) {
                            ?>
                            <input type="text" name="series_sort" value="<?= $_GET["series_sort"]; ?>" hidden>
                            <?php
                        }
                        ?>
                    </form>
                </tr>
            </thead>
            <tbody>            
        <?php
        foreach ($queryfilmseenresultaat as $first) {
            ?>
            <tr>
                <td>
                    <?php
                    echo $first["title"] . PHP_EOL;
                    ?>
                </td>
                <td>
                    <?php
                    echo $first["length"] . PHP_EOL;
                    ?>
                </td>
                <td>
                <a href="films.php?id=<?php
                echo $first["id"]; ?>">details
                </td>
                <td>
                <a href="edit.php?id=<?php echo $first["id"]; ?>">wijzig
                </td>
                <td>
                <a href="insert.php?id=<?php
                echo $second["id"]; ?>">toevoegen
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        </table>
        <?php
        $querySeries = "
        SELECT
        id, title, rating
        FROM
        media";
        if (isset($_GET["series_sort"])) {
            if ($_GET['series_sort'] == "title") {
                $querySeries .= "
                ORDER BY 
                title";
            } else if ($_GET['series_sort'] == "rating") {
                $querySeries .= "
                ORDER BY 
                rating";
            }
        }
        $seriesStatement = $PDO->query($querySeries);
        $seriesResult = $seriesStatement->fetchAll(PDO::FETCH_ASSOC);
        $queryFilms = "
        SELECT
        id, title, length
        FROM
        media";
        if (isset($_GET["flims_sort"])) {
            if ($_GET['flims_sort'] == "title") {
                $queryFilms .= "
                ORDER BY 
                title DESC";
            } else if ($_GET['flims_sort'] == "length") {
                $queryFilms .= "
                ORDER BY 
                length ASC";
            }
        }
        $seriesStatement2 = $PDO->query($queryFilms);
        $queryfilmseenresultaat = $seriesStatement2->fetchAll(PDO::FETCH_ASSOC);
        ?>
    </body>
</html>