<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<style>
    .cardWrap {
        width: 27em;
        margin: 3em auto;
        color: #fff;
        font-family: sans-serif;
    }

    .card {
        background: linear-gradient(to bottom, #e84c3d 0%, #e84c3d 26%, #ecedef 26%, #ecedef 100%);
        height: 11em;
        float: left;
        position: relative;
        padding: 1em;
        margin-top: 100px;
    }

    .cardLeft {
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
        width: 16em;
    }

    .cardRight {
        width: 6.5em;
        border-left: .18em dashed #fff;
        border-top-right-radius: 8px;
        border-bottom-right-radius: 8px;
    }

    .cardRight:before,
    .cardRight:after {
        content: "";
        position: absolute;
        display: block;
        width: .9em;
        height: .9em;
        background: #fff;
        border-radius: 50%;
        left: -.5em;
    }

    .cardRight:before {
        top: -.4em;
    }

    .cardRight:after {
        bottom: -.4em;
    }

    h1 {
        font-size: 1.1em;
        margin-top: 0;
    }

    h1 span {
        font-weight: normal;
    }

    .title,
    .name,
    .seat,
    .time {
        text-transform: uppercase;
        font-weight: normal;
    }

    .title h2,
    .name h2,
    .seat h2,
    .time h2 {
        font-size: .9em;
        color: #525252;
        margin: 0;
    }

    .title span,
    .name span,
    .seat span,
    .time span {
        font-size: .7em;
        color: #a2aeae;
    }

    .title {
        margin: 2em 0 0 0;
    }

    .name,
    .seat {
        margin: .7em 0 0 0;
    }

    .time {
        margin: .7em 0 0 1em;
    }

    .seat,
    .time {
        float: left;
    }

    .eye {
        position: relative;
        width: 2em;
        height: 1.5em;
        background: #fff;
        margin: 0 auto;
        border-radius: 1em/0.6em;
        z-index: 1;
    }

    .eye:before,
    .eye:after {
        content: "";
        display: block;
        position: absolute;
        border-radius: 50%;
    }

    .eye:before {
        width: 1em;
        height: 1em;
        background: #e84c3d;
        z-index: 2;
        left: 8px;
        top: 4px;
    }

    .eye:after {
        width: .5em;
        height: .5em;
        background: #fff;
        z-index: 3;
        left: 12px;
        top: 8px;
    }

    .number {
        text-align: center;
        text-transform: uppercase;
    }

    .number h3 {
        color: #e84c3d;
        margin: .9em 0 0 0;
        font-size: 2.5em;
    }

    .number span {
        display: block;
        color: #a2aeae;
    }

    .barcode {
        height: 2em;
        width: 0;
        margin: 1.2em 0 0 .8em;
        box-shadow: 1px 0 0 1px #343434,
            5px 0 0 1px #343434,
            10px 0 0 1px #343434,
            11px 0 0 1px #343434,
            15px 0 0 1px #343434,
            18px 0 0 1px #343434,
            22px 0 0 1px #343434,
            23px 0 0 1px #343434,
            26px 0 0 1px #343434,
            30px 0 0 1px #343434,
            35px 0 0 1px #343434,
            37px 0 0 1px #343434,
            41px 0 0 1px #343434,
            44px 0 0 1px #343434,
            47px 0 0 1px #343434,
            51px 0 0 1px #343434,
            56px 0 0 1px #343434,
            59px 0 0 1px #343434,
            64px 0 0 1px #343434,
            68px 0 0 1px #343434,
            72px 0 0 1px #343434,
            74px 0 0 1px #343434,
            77px 0 0 1px #343434,
            81px 0 0 1px #343434;
    }
</style>
</head>

<body>
    <div class="cardWrap">
        <div class="card cardLeft">
            <h1>Event <span>Harbor</span></h1>
            <div class="title">
                <h2>{{ $reservation->event->title }}</h2>
                <span>{{ $reservation->event->category->name }}</span>
            </div>
            <div class="name">
                <span>Client</span>
                <h2>{{ $reservation->client->name }}</h2>
            </div>
            <div class="seat">
                <span>Seats</span>
                <h2>{{ $reservation->event->tickets_number }}</h2>
            </div>
            <div class="time">
                <span>time</span>
                <h2>{{ \Carbon\Carbon::parse($reservation->event->date)->format('d M, Y') }},<p>
                        {{ \Carbon\Carbon::parse($reservation->event->date)->format('h:i') }}</p>
                </h2>
            </div>

        </div>
        <div class="card cardRight">
            <div class="eye"></div>
            <div class="number">
                <span>Seat</span>
                <h3>#{{ $reservation->id }}</h3>
            </div>
            <div class="barcode"></div>
        </div>

    </div>
</body>
</html>
