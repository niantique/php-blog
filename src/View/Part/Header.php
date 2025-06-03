<?php

namespace App\View\Part;

class Header
{
    public function render()
    {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="preconnect" href="https://fonts.googleapis.com" />
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
            <link
                href="https://fonts.googleapis.com/css2?family=Boldonse&display=swap"
                rel="stylesheet" />
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Krona+One&family=Lekton:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="/styles/global.css" type="text/css">
            <title>Blaze Leon</title>
        </head>

        <body>
            <header>
                <h1>Blaze Leon</h1>
                <p>explore the speed, style, and tech<br>of the world’s hottest sports cars</p>
            </header>

            <form action="/search" method="get">
                <in>Search:
                    <input type="text" name="keyword">
                    </label>
                    <button>Go</button>
            </form>

    <?php
    }
}
