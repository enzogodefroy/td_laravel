<?php

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
                        <th>Creation date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($baskets as $b)
                        <tr>
                            <td data-label="Name"> {{ $b->name }} </td>
                            <td data-label="Quantity"> {{ $b->dateCreation->format('d/m/Y H:i:s') }} </td>
                            <td data-label="Actions">
                                <a class="ui button" href="/basketDetails/{{ $b->id }}">Details</a>
                                <a class="ui button" href="/chooseTimeslot/{{ $b->id }}">Valider ce panier</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>