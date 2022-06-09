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
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($timeslots as $t)
                    <tr>
                        <form method="GET" action="/basketValid">
                            <td>
                                {{ $t->slotDate->format('d/m/Y H:i:s') }}
                                <input type="hidden" value="{{ $idBasket }}" name="idBasket" />
                                <input type="hidden" value="{{ $t->id }}" name="idTimeslot" />
                                <button class="ui button" onclick="this.form.submit()">Choisir</button>
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>