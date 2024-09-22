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
        background-color: #fff;
        margin-bottom: 5px;
    }

    .match-header {
        display: flex;
        align-items: center;
        font-weight: bold;
        font-size: 14px;
        color: #333;
        margin-bottom: 10px;
        background-color:#ddd;
        padding: 13px;
        border-radius: 2px;
    }

    .match-header .flag {
        margin-right: 10px;
    }

    .match-details {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: #ddd 1px solid;
        margin-top: 15px;
        padding-bottom: 20px;
    }

    .time {
        color:#777;
        font-weight: 600;
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
        justify-content: center;
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

    .home-name {
        position: relative;
        width: 400px;
        text-align: end;
        padding-right: 40px;
        bottom: 5px;
    }

    .away-name {
        position: relative;
        bottom: 5px;
    }
    .half-time-score {
        color:#777;
        font-weight: 600;
        text-align: end;
    }
    .corner-score {
        color:#777;
        font-weight: 600;
        text-align: end;
    }
    .country-logo {
        width: 30px;
        height: 20px;
    }
    .match-score {
        display: flex;
        font-weight: bold;
        color:#e74c3c
    }

    .team-logo {
        position: relative;
        top: 5px;
        width: 20px;
        height: 20px;
    }
    </style>
</head>

<body>
    @yield('content')
</body>

</html>