<?php

$cmdd = $command->commanddetails;

?>

<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>">

        <title>Commande</title>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.css">
        <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js"></script>

        <style>
            .example-wrapper { 
                margin: 1em auto; 
                width: 95%; 
                font: 18px/1.5 sans-serif;
            }

            body {
                background-color: #a2a2a2 !important;
            }
    </style>

    </head>

    <body>
        <div class="example-wrapper">
            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Section</th>
                        <th>Set prepared</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($cmdd as $detail)
                    {
                        $form = '';

                        if (!$detail->prepared)
                        {
                            $form = '<form method="GET" action="/validateCommandDetail">
                                        <div class="ui checkbox">
                                            <input type="checkbox" name="example" onChange="this.form.submit()" />
                                            <input type="hidden" name="product" value="' . $detail->product->id . '" />
                                            <input type="hidden" name="command" value="' . $detail->command->id . '" />
                                            <label>Set prepared</label>
                                        </div>
                                    </form>';
                        }

                        echo    '<tr>
                                    <td data-label="Name">' .  $detail->product->name . '</td>
                                    <td data-label="Quantity">' .  $detail->quantity . '</td>
                                    <td data-label="Section">' .  $detail->product->section->name . '</td>
                                    <td>' . $form . '</td>
                                </tr>';
                    }

                    ?>
                </tbody>
                </table>
        </div>
    </body>
</html>