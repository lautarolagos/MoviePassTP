<?php
    require_once('Header.php');
    require_once('Nav.php');

    date_default_timezone_set('America/Argentina/Buenos_Aires');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section  class="">
        <div class="cont-form">
            <h2 class="form-title">Add Projection</h2>
             <form  class="form" action="<?php echo FRONT_ROOT ?>Projection/projectionCheck" method="POST">
             <div>
                <img class="posterImg" src="https://image.tmdb.org/t/p/w342/<?php echo $posterImg;?>" alt="">
            </div>
                <div>
                    <div>
                        <label for="dateTimeId">Date-Time</label>
                        <input class="form-input" type="datetime-local" name="dateTime" id="dateTimeId" min="<?php echo date("Y-m-d")."T".date("H:i");?>" max="9999-12-31T23:59" required>
                    </div>

                    <div>
                        <input type="hidden" name="idMovie" value="<?php echo $movieId;?>">
                        <input type="hidden" name="idAuditorium" value="<?php echo $idAuditorium;?>">
                        <input type="hidden" name="movieRuntime" value="<?php echo $movieRuntime; ?>">
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn-submit">Add</button>
                </div>
            </form>
            <form class="form" action="<?php echo FRONT_ROOT ?>API/ShowMovies" method="POST">
                    <input type="hidden" name="idAuditoriumBack" value="<?php echo $idAuditorium; ?>">
                    <button class="btn-submit" type="submit">Go Back</button>
            </form>
        </div>
    </section>
</body>
</html>