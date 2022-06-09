<?php

$details = $basket->basketdetails;

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
                        <th>Product name</th>
                        <th>Quantity</th>
                        <th>Section</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $b)
                        <tr>
                            <td data-label="Name"> {{ $b->product->name }} </td>
                            <td data-label="Quantity"> {{ $b->quantity }} </td>
                            <td data-label="Section"> {{ $b->product->section->name }} </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
        </div>
    </body>
</html>