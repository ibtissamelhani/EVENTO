<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ticket</title>
    <style>
        .air-ticket-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
            width: 600px;
            margin: 0 auto;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .classD {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .classA {
            flex-basis: calc(33.33% - 10px);
            background-color: #ddd;
            padding: 5px;
            border-radius: 5px;
        }

        .classC {
            font-size: 0.9em;
        }

        .classB {
            display: block;
            margin-bottom: 10px;
            color: #000;
            font-size: 20px
        }
        .title{
            margin-bottom: 5px;
            margin-top: 10px;
            text-align:center; 
            color: blue;
            font-size: 50px;
            font-family:Arial, Helvetica, sans-serif
        }
    </style>
</head>

<body>
    <div class="air-ticket-card">
        <h1 class="title">Evento</h1>
        <div class="classD">
            <span class="classA">N° : {{$eventUser->id}}</span>
            <span class="classA">Nbr of places : {{$eventUser->number_place}}</span>
        </div>
        <div class="classC">
            <span class="classB">Event : {{$eventUser->event->name}}</span>
            <span class="classB">Attendee Name : {{$eventUser->user->name}}</span>
            <span class="classB">Event location: {{$eventUser->event->location}}</span>
            <span class="classB">Event Date: {{$eventUser->event->date}}</span>
            <span class="classB">Total price: {{$eventUser->event->price * $eventUser->number_place}} MAD</span>
        </div>
    </div>
</body>

</html>
