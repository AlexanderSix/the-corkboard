<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The Corkboard</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: hsl(204, 96%, 27%);
                color: hsl(195, 100%, 95%);
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                font-weight: 600;
            }

            .links > a {
                color: hsl(195, 100%, 95%);
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                position: relative;
                text-decoration: none;
                text-decoration-color: hsl(326, 90%, 39%);
                text-transform: uppercase;

                transition: all 400ms ease-in-out;
            }

            .links > a:before {
                content: "";
                position: absolute;
                width: 100%;
                height: 2px;
                bottom: -5px;
                left: 0;
                background-color: hsl(328, 85%, 46%);
                visibility: hidden;
                -webkit-transform: scaleX(0);
                transform: scaleX(0);
                -webkit-transition: all 0.3s ease-in-out 0s;
                transition: all 0.3s ease-in-out 0s;
            }

            .links > a:hover:before {
                visibility: visible;
                -webkit-transform: scaleX(1);
                transform: scaleX(1);
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .hero.is-fullheight {
                background-color: hsl(204, 96%, 27%);
                color: hsl(195, 100%, 95%);

                /*background-color: #035287;*/
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 40 40'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%231991d2' fill-opacity='0.21'%3E%3Cpath d='M0 38.59l2.83-2.83 1.41 1.41L1.41 40H0v-1.41zM0 1.4l2.83 2.83 1.41-1.41L1.41 0H0v1.41zM38.59 40l-2.83-2.83 1.41-1.41L40 38.59V40h-1.41zM40 1.41l-2.83 2.83-1.41-1.41L38.59 0H40v1.41zM20 18.6l2.83-2.83 1.41 1.41L21.41 20l2.83 2.83-1.41 1.41L20 21.41l-2.83 2.83-1.41-1.41L18.59 20l-2.83-2.83 1.41-1.41L20 18.59z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            }

            .hero.is-fullheight .title {
                color: hsl(195, 100%, 95%);

                font-weight: 600;

                text-shadow: 0 2px 5px hsla(0, 0%, 0%, .5);
            }

            .navbar-title {
                color: hsl(195, 100%, 95%);

                font-size: 24px;
                font-weight: 600;
            }

            .navbar-burger.burger {
                color: hsl(195, 100%, 95%);
            }

            .pink {
                color: hsl(336, 100%, 77%);
            }

            .button.is-large {
                background-color: hsl(334, 86%, 67%);
                border-radius: 50px;
                border: 0;
                box-shadow: 0 2px 5px hsla(0, 0%, 0%, .5);
                color: hsl(210, 24%, 16%);
                font-weight: 600;
                margin-top: 3vh;

                transition: background-color 150ms ease-in-out;
            }

            .button.is-large:hover {
                background-color: hsl(338, 100%, 86%);
            }

            section.section {
                background-color: hsl(216, 33%, 97%);
            }

            .box.about {
                margin-top: -100px;
            }

            .profile-image {
                border-radius: 64px;
                border: 1px solid hsla(210, 16%, 82%, 1.0)
            }

            .message-content-subject {
                font-weight: 600;
                text-align: left;
            }

            .message-content {
                text-align: left;
            }

            section.chart-section {
                color: hsl(210, 24%, 16%);
                padding-top: 15vh;
            }

            .chart-container {
                height: auto;
                width: 90%;
            }

            .footer {
                background-color: hsl(204, 96%, 27%);
                color: hsl(195, 100%, 95%);

                /*background-color: #035287;*/
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 40 40'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%231991d2' fill-opacity='0.21'%3E%3Cpath d='M0 38.59l2.83-2.83 1.41 1.41L1.41 40H0v-1.41zM0 1.4l2.83 2.83 1.41-1.41L1.41 0H0v1.41zM38.59 40l-2.83-2.83 1.41-1.41L40 38.59V40h-1.41zM40 1.41l-2.83 2.83-1.41-1.41L38.59 0H40v1.41zM20 18.6l2.83-2.83 1.41 1.41L21.41 20l2.83 2.83-1.41 1.41L20 21.41l-2.83 2.83-1.41-1.41L18.59 20l-2.83-2.83 1.41-1.41L20 18.59z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            }

            .footer * {
                color: hsl(195, 100%, 95%);
            }
        </style>
    </head>
    <body>

        <section class="hero is-fullheight">
            <div class="hero-head">
                <header class="navbar">
                    <div class="container">
                        <div class="navbar-brand">
                            <a class="navbar-item">
                                <h5 class="navbar-title">The Corkboard</h5>
                            </a>
                            <span class="navbar-burger burger" data-target="navbarMenuHeroC">
                            <span></span>
                            <span></span>
                            <span></span>
                            </span>
                            </div>
                        <div id="navbar-menu" class="navbar-menu">
                            <div class="navbar-end">
                                @if (Route::has('login'))
                                    <div class="top-right links">
                                        @auth
                                            <a href="{{ url('/home') }}">Home</a>
                                        @else
                                            <a href="{{ route('login') }}">Login</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}">Register</a>
                                        @endif
                                        @endauth
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </header>
            </div>

            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title is-size-3-mobile is-size-1-tablet">Message Boards Made <span class="pink">Easy</span>!</h1>
                    <a class="button is-large" href="{{ route('register') }}">Register Now</a>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="column is-8 is-offset-2">
                    <div class="box about">
                        <article class="media">
                            <div class="media-left">
                                <figure class="image is-64">
                                    {{--<img src="https://bulma.io/images/placeholders/64x64.png" alt="Profile Picture" />--}}
                                    <img class="profile-image" src="{{ asset('storage/images/profile/01w.jpg') }}" alt="Profile Picture" />
                                </figure>
                            </div>
                            <div class="media-content">
                                <div class="content">
                                    <h4 class="message-content-subject">Pin messages to the Corkboard for everyone to see, or pin messages that only your team can see!</h4>
                                    <hr>
                                    <p class="message-content">Messages are a great way to share a lot of information quickly, whether you're inviting everyone to the next company party or discussing team-based trade secrets!</p>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="box">
                        <article class="media">
                            <div class="media-left">
                                <figure class="image is-64">
                                    <img class="profile-image" src="{{ asset('storage/images/profile/02m.jpg') }}" alt="Profile Picture" />
                                </figure>
                            </div>
                            <div class="media-content">
                                <div class="content">
                                    <p class="message-content">Once you've posted a message, anyone who can see your message can create and post a response! This is a great way to encourage team engagement!</p>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="box">
                        <article class="media">
                            <div class="media-left">
                                <figure class="image is-64">
                                    <img class="profile-image" src="{{ asset('storage/images/profile/03w.jpg') }}" alt="Profile Picture" />
                                </figure>
                            </div>
                            <div class="media-content">
                                <div class="content">
                                    <p class="message-content">
                                        With the Corkboard, the possibilities are endless! The Corkboard will change the way that your team communicates!
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section class="section chart-section">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <h4 class="title is-size-3-mobile is-size-1-tablet">Increase Productivity</h4>
                        <p>Teams using Corkboards have said that their team's productivity has
                            increased dramatically since starting to use their Corkboards. As a matter of
                            fact, teams using Corkboards area saying that if they were to stop using Corkboards,
                            they wouldn't be able to function any more due to a loss of productivity!</p>
                    </div>
                    <div class="column">
                        <div class="chart-container">
                            <canvas id="productivity-chart" height="400px" width="600px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section chart-section">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <div class="chart-container">
                            <canvas id="cork-chart" height="400px" width="600px"></canvas>
                        </div>
                    </div>
                    <div class="column">
                        <h4 class="title is-size-3-mobile is-size-1-tablet">More Cork = More Benefits</h4>
                        <p>It's not just our teams who are saying great things about Corkboard! The
                        Scientific Journal of Science has officially backed up our claims, and you
                        don't even need a team to reap the benefits! Science has proven time and time
                        again that more cork is the key for a happier, more fulfilling life, and what
                        a better place to get more cork than Corkboard! We have 100% more cork than
                        any of our leading competitors!</p>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <h5 class="title is-size-5-mobile is-size-3-tablet">The Corkboard</h5>
                    </div>
                    <div class="column">
                        <p style="text-align: center; font-weight: 600;">&copy; Alexander Six 2016</p>
                    </div>
                    <div class="column">
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    <a href="{{ url('/home') }}">Home</a>
                                @else
                                    <a href="{{ route('login') }}">Login</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </footer>

        {{--<div class="flex-center position-ref full-height">--}}
            {{--@if (Route::has('login'))--}}
                {{--<div class="top-right links">--}}
                    {{--@auth--}}
                        {{--<a href="{{ url('/home') }}">Home</a>--}}
                    {{--@else--}}
                        {{--<a href="{{ route('login') }}">Login</a>--}}

                        {{--@if (Route::has('register'))--}}
                            {{--<a href="{{ route('register') }}">Register</a>--}}
                        {{--@endif--}}
                    {{--@endauth--}}
                {{--</div>--}}
            {{--@endif--}}

            {{--<div class="content">--}}
                {{--<div class="title m-b-md">--}}
                    {{--The Corkboard--}}
                {{--</div>--}}


            {{--</div>--}}
        {{--</div>--}}

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var chartCanvas = document.getElementById('productivity-chart');
        var chart = new Chart(chartCanvas, {
            type: 'line',
            data: {
                datasets: [
                    {
                        label: "Red Team",
                        data: [0, 8, 18, 30, 44, 64, 100],
                        backgroundColor: 'hsla(354, 85%, 44%, 0.25)',
                        borderColor: 'hsl(354, 85%, 44%)'
                    },
                    {
                        label: "Blue Team",
                        data: [0, 2, 13, 29, 40, 72, 94],
                        backgroundColor: 'hsla(201, 79%, 46%, 0.25)',
                        borderColor: 'hsl(201, 79%, 46%)'
                    },
                    {
                        label: "Orange Team (stopped using Corkboard)",
                        data: [100, 75, 20, 0, 0, 0, 0],
                        backgroundColor: 'hsla(29, 80%, 44%, 0.25)',
                        borderColor: 'hsl(29, 80%, 44%)'
                    }
                ],
                labels: ["Week 1", "Week 2", "Week 3", "Week 4", "Week 5", "Week 6", "Week 7"]
            },
            options: {
                xAxisId: 'Time Using Corkboards (days)',
                yAxisId: 'Productivity',
                backgroundColor: 'hsl(216, 33, 97)',
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });

        var corkChartCanvas = document.getElementById('cork-chart');
        var corkChart = new Chart(corkChartCanvas,{
            type: 'bar',
            data: {
                datasets: [
                    {
                        label: "Amount of Cork",
                        data: [100, 1, 1, 1],
                        backgroundColor: 'hsla(322, 93%, 27%, 0.25)',
                        borderColor: 'hsl(322, 93%, 27%)'
                    }
                ],
                labels: ["The Corkboard", "Slack", "Reddit", "Other"]
            },
            options: {
                xAxisId: 'Messaging Applications',
                yAxisId: 'Amount of Cork',
                backgroundColor: 'hsl(216, 33, 97)',
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        })

    </script>
    </body>
</html>
