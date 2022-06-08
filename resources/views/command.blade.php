<?php

$cmdd = $command->commanddetails;

// foreach($cmdd as $detail)
// {
//     echo $detail->product->name . ', ';
// }

?>

<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>A Basic HTML5 Template</title>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.css">
        <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js"></script>

        <style>
            body {
                background-color: #a1a1a1;
            }

            .content {
                width: 90%;
                margin: auto;
            }
        </style>

    </head>

    <body>
        <div class="content">
            <div class="ui segment">
                Command n°<?php echo $command->id ?> by <?php echo $command->user->name?>
            </div>

            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>Nom du produit</th>
                        <th>Quantité</th>
                        <th>Section</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($cmdd as $detail)
                    {
                        echo    '<tr>
                                    <td data-label="Name">' .  $detail->product->name . '</td>
                                    <td data-label="Quantity">' .  $detail->quantity . '</td>
                                    <td data-label="Section">' .  $detail->product->section->name . '</td>
                                </tr>';
                    }

                    ?>
                </tbody>
                </table>
        </div>
    </body>
</html>