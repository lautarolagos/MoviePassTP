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
            <img src="https://i.pinimg.com/564x/b7/8d/07/b78d0768cc804c8be55ab2193469524f.jpg" alt="">
            <div class="capa">
                <h3>quimekzu no shaiba</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique, excepturi eligendi sunt autem officia quibusdam. Facilis eum voluptatum sunt quo, officia debitis fuga possimus impedit aut eaque optio repellat sapiente.?></p>
            </div>
        </figure>
    </div>
    <div>
        <table class="table-list-buy">
            <thead class="thead-list-buy">
                <th class="th-list-buy">Cinema</th>
                <th class="th-list-buy">Auditorium</th>
                <th class="th-list-buy">Date</th>
                <th class="th-list-buy">Ticket Price</th>
                <th class="th-list-buy"></th>
            </thead>
            <tbody>
                    <tr class="tr-list-buy">
                        <td class="td-list-buy">ambassador</td>
                        <td class="td-list-buy">sala 1</td>
                        <td class="td-list-buy">2020-11-11 23:00HS</td>
                        <td class="td-list-buy">$200</td>
                        <td class="td-list-buy">
                            <form action="<?php echo FRONT_ROOT ?>Purchase/ShowStartPurchase" method="POST">
                            <button  style="margin-left: 0;" class="button-add" type="submit" name="" value="">BUY</button>
                            </form>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
