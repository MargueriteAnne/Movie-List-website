<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - MoziLista</title>
    <!-- CSS styles -->
    <style>
        body{background-color: #111;}
        h1 {
            font-family: 'Times New Roman', Times, serif, sans-serif;
            font-style: italic;
            font-size: 50px;
            color: #E90D0D; 
            text-align: center;
            text-transform: uppercase; 
            margin-top: 30px;            
        }

        h2{
            color: #da0c0c;

        }
        h3{
            color: #f2eeee;
        }

         ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #da0c0c;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }
 
        
        iframe {
            width: 100%;
            height: 400px; 
            border: none; 
            margin-bottom: 20px
        }
        p {
            color: #f2eeee;
        }

        #video-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .video-container
        {
           flex: 1;
            margin-right : 20px;
           
        }
        .video-container video {
            width: 100%;
            height: auto;
        }

        .video-container iframe{
            width: 100%;
            height: auto;
        }

        #map-section{
            width: 100%;
            height: 25%;
            position: sticky;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 15px; 
        }
        .gallery-item {
            flex: 1 1 calc(25% - 15px); 
            box-sizing: border-box;
        }
        .gallery-item img {
            width: 100%;
            height: auto;
            display: block;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+Z6Lqg5x8N9xu2+j0Ipe0qXh+8tjy5BDJi8jv4u" crossorigin="anonymous">
</head>


<body>
