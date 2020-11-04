<?php
    require_once('Header.php');
    require_once('Nav.php');
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
                        <label for="dateId">Date</label>
                        <input class="form-input"type="date" name="date" id="dateId" min="<?php echo date('Y-m-d');?>" required>
                    </div>
                    <div>
                        <label for="startTimeId">Start Time</label>
                        <input class="form-input"type="time" name="startTine" id="startTimeId" required>
                    </div>
                    <div>
                        <label for="endTimeId">End Time</label>
                        <input class="form-input"type="time" name="endTime" id="endTimeId" required>
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
        </div>
    </section>
</body>
</html>