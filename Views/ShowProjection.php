<?php
    namespace Views;
    require_once('Nav.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo CSS_PATH;?>otherStyle.css" rel="stylesheet" type="text/css" media="all">
    <title>Document</title>
</head>
<body class="body-cont">
    <div class="contenedor">
        <figure>
            <img src="https://image.tmdb.org/t/p/w342/<?php echo $posterPath;?>">
            <div class="capa">
                <h3><?php echo $title; ?></h3>
                <p><?php echo $overview; ?></p>
            </div>
        </figure>
    </div>
    <center><label class="labelProjections">Available Projections</label></center>
    <div>
        <table class="table-list-buy">
            <thead class="thead-list-buy">
                <th class="th-list-buy">Date</th>
                <th class="th-list-buy">Time</th>
                <th class="th-list-buy">Ticket Price</th>
                <th class="th-list-buy">Cinema</th>
                <th class="th-list-buy">Adress</th>
                <th class="th-list-buy">Auditorium</th>
                <th class="th-list-buy"></th>
            </thead>
            <tbody>
            <?php foreach($projections as $projection){?>
                    <tr class="tr-list-buy">
                        <td class="td-list-buy"><?php echo $projection->getDate(); ?></td>
                        <td class="td-list-buy"><?php echo $projection->getStartTime(); ?></td>
                        <td class="td-list-buy"><?php echo $projection->getAuditorium()->getTicketPrice();?></td>
                        <td class="td-list-buy"><?php echo $projection->getAuditorium()->getCinema()->getName(); ?></td>
                        <td class="td-list-buy"><?php echo $projection->getAuditorium()->getCinema()->getAdress(); ?></td>
                        <td class="td-list-buy"><?php echo $projection->getAuditorium()->getNameAuditorium();?></td>
                        <td class="td-list-buy">
                            <form action="<?php echo FRONT_ROOT ?>Purchase/ShowStartPurchase" method="POST">
                            <button  style="margin-left: 0;" class="button-add" type="submit" name="" value="">BUY</button>
                            </form>
                        </td>
                    </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
</body>
</html>
