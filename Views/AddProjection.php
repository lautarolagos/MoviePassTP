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
             <form  class="form" action="<?php echo FRONT_ROOT ?>Billboard/Test" method="POST">
                <div>
                <div>
                    <img class="posterImg" src="https://image.tmdb.org/t/p/w342/<?php echo $posterImg;?>" alt="">
                </div>
                    <div>
                        <label for="dateId">Date</label>
                        <input class="form-input"type="date" name="date" id="dateId" min="<?php echo date('Y-m-d');?>" required>
                    </div>
                    <div>
                        <label for="startTimeId">Start Time</label>
                        <input class="form-input" type="time" name="startTine" id="startTimeId" min="<?php echo date("H:i"); ?>" required>
                    </div>
                    <div>
                        <input type="hidden" name="idMovie" value="<?php echo $movieId;?>">
                        <input type="hidden" name="idMovie" value="<?php echo $idAuditorium;?>">
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn-submit">Add</button>
                </div>
            </form>
            <form class="form" action="<?php echo FRONT_ROOT ?>Billboard/ShowMoviesAPI" method="POST">
                    <input type="hidden" name="idMovie" value="<?php echo $idAuditorium; ?>">
                    <button class="btn-submit" type="submit">Go Back</button>
            </form>
        </div>
    </section>
</body>
</html>