<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    .matches-list {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }

    .match {
        display: flex;
        flex-direction: column;
        padding: 10px;
        border-bottom: 1px solid #ddd;
        background-color: #fff;
        margin-bottom: 5px;
    }

    .match-header {
        display: flex;
        align-items: center;
        font-weight: bold;
        font-size: 14px;
        color: #777;
        margin-bottom: 10px;
    }

    .match-header .flag {
        margin-right: 10px;
    }

    .match-details {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .time {
        color: #555;
        font-size: 14px;
    }

    .status {
        font-size: 14px;
        color: #e74c3c;
    }

    .teams {
        display: flex;
        align-items: center;
        flex-grow: 1;
        justify-content: space-between;
    }

    .home-team, .away-team {
        font-weight: bold;
        font-size: 16px;
    }

    .score {
        display: flex;
        align-items: center;
        font-size: 18px;
        font-weight: bold;
        color: #333;
    }

    .half-time {
        font-size: 14px;
        color: #777;
    }
    </style>
</head>

<body>
    @yield('content')
</body>

</html>