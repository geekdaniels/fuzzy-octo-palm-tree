<?php

$data_url = 'http://api.sportradar.us/soccer-t3/eu/en/tournaments/sr:tournament:17/standings.json?api_key=zcqfwkst22vxy5wburw4qq2e';
$daily_data = 'http://api.sportradar.us/soccer-t3/eu/en/schedules/[year]-[month]-[day]/schedule.json?api_key=zcqfwkst22vxy5wburw4qq2e';
$tournament_result = 'http://api.sportradar.us/soccer-t3/eu/en/tournaments/sr:tournament:17/results.json?api_key=zcqfwkst22vxy5wburw4qq2e';
$tournament_shdl = 'http://api.sportradar.us/soccer-t3/eu/en/tournaments/sr:tournament:17/schedule.json?api_key=zcqfwkst22vxy5wburw4qq2e';

//get data for tournament standing
$data_get = file_get_contents($data_url);
$data_array = json_decode($data_get, true);
//get data for tournament results
$tr_get = file_get_contents($tournament_result);
$tr_array = json_decode($tr_get, true);
//get data for tournament schedule
$ts_get = file_get_contents($tournament_shdl);
$ts_array = json_decode($ts_get, true);

$table = $data_array['standings'][0]['groups'][0];

$table_2 = $tr_array;
$table_3 = $ts_array;

?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Starter Template for Bootstrap 3.3.5</title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="../public/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/lib/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <!--[if IE]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">SportsRadar</a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <!--.nav-collapse -->
        </div>
    </nav>

    <!--
    <div class="container">
        <div class="starter-template">
            <h1>Hello, world!</h1>
            <p class="lead">Now you can start your own project with <a target="_blank" href="http://getbootstrap.com/">Bootstrap 3.3.5</a>. This plugin is a fork from <a href="https://github.com/le717/brackets-html-skeleton#readme">HTML Skeleton</a>.</p>
        </div>
    </div>
-->
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <ul class="breadcrumb">
                    <h4 class="text-center">2016/2017 LEAGUES STANDING</h4>
                </ul>
                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Team</th>
                            <th>Played</th>
                            <th>Win</th>
                            <th>Draw</th>
                            <th>Loss</th>
                            <th>GF</th>
                            <th>GA</th>
                            <th>GD</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
            
                        foreach($table['team_standings'] as $table_data){
                        echo "<tr>
                            <td>{$table_data['rank']}</td>
                            <td>{$table_data['team']['name']}</td>
                            <td>{$table_data['played']}</td>
                            <td>{$table_data['win']}</td>
                            <td>{$table_data['draw']}</td>
                            <td>{$table_data['loss']}</td>
                            <td>{$table_data['goals_for']}</td>
                            <td>{$table_data['goals_against']}</td>
                            <td>{$table_data['goal_diff']}</td>
                            <td>{$table_data['points']}</td>
                            </tr>";
                        }
                        
                    ?>
                    <!--<tr>
                            
                        </tr>
                        <tr>
                            
                        </tr>
                        <tr>
                            
                        </tr>
                        <tr>
                            
                        </tr>
                        <tr>
                            
                        </tr>
                        <tr>
                            
                        </tr>-->
                    <!--Just Comment Out the <tbody> Element and insert your code-->
                    </tbody>
                </table>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <h4 class="text-center">2016/2017 LEAGUES RESULT</h4>
                </ul>
                <table class="table">
                    <thead>
                        <tr>
                        <tr>
                            <th>HOME TEAM</th>
                            <th>vs</th>
                            <th>AWAY TEAM</th>
                            <th>SCORE LINE</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
            
                        foreach($table_2['results'] as $table_data1){
                            echo "<tr>
                                <td>{$table_data1['sport_event']['competitors'][0]['name']}
                                 </td>
                                <td>VS</td>
                                <td>{$table_data1['sport_event']['competitors'][1]['name']}
                                </td>
                                <td>{$table_data1['sport_event_status']['home_score']}&#x0020:&#x0020
                                {$table_data1['sport_event_status']['away_score']}</td>
                            </tr>";

                        }
                    ?>
                    <!--<tr>
                            <td>Home Team</td>
                            <td>vs</td>
                            <td>Away Team</td>
                            <td>0 - 0</td>
                        </tr>
                        <tr>
                            <td>Home Team</td>
                            <td>vs</td>
                            <td>Away Team</td>
                            <td>0 - 0</td>
                        </tr>
                        <tr>
                            <td>Home Team</td>
                            <td>vs</td>
                            <td>Away Team</td>
                            <td>0 - 0</td>
                        </tr>
                        <tr>
                            <td>Home Team</td>
                            <td>vs</td>
                            <td>Away Team</td>
                            <td>0 - 0</td>
                        </tr>
                        <tr>
                            <td>Home Team</td>
                            <td>vs</td>
                            <td>Away Team</td>
                            <td>0 - 0</td>
                        </tr>
                        <tr>
                            <td>Home Team</td>
                            <td>vs</td>
                            <td>Away Team</td>
                            <td>0 - 0</td>
                        </tr>-->
                        <!--Just Comment Out the <tbody> Element and insert your code-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-5 col-md-push-7">
            <ul class="breadcrumb">
                    <h4 class="text-center">2016/2017 LEAGUES SCHEDULE</h4>
            </ul>
            <table class="table">
                <thead>
                    <tr>
                    <tr>
                        <th>Home Team</th>
                        <th>VS</th>
                        <th>Away Team</th>
                        <th>Schedule</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
            
                    foreach($table_3['sport_events'] as $table_data2){
                        echo "<tr>
                            <td>{$table_data2['competitors'][0]['name']}</td>
                            <td>VS</td>
                            <td>{$table_data2['competitors'][1]['name']}</td>
                            <td>{$table_data2['scheduled']}</td>
                        </tr>";

                    }
                ?>
                <!--<tr>
                        <td>Home Team</td>
                        <td>vs</td>
                        <td>Away Team</td>
                        <td>YYYY-MM-DD</td>
                    </tr>
                    <tr>
                        <td>Home Team</td>
                        <td>vs</td>
                        <td>Away Team</td>
                        <td>YYYY-MM-DD</td>
                    </tr>
                    <tr>
                        <td>Home Team</td>
                        <td>vs</td>
                        <td>Away Team</td>
                        <td>YYYY-MM-DD</td>
                    </tr>
                    <tr>
                        <td>Home Team</td>
                        <td>vs</td>
                        <td>Away Team</td>
                        <td>YYYY-MM-DD</td>
                    </tr>
                    
                    <tr>
                        <td>Home Team</td>
                        <td>vs</td>
                        <td>Away Team</td>
                        <td>YYYY-MM-DD</td>
                    </tr>
                    <tr>
                        <td>Home Team</td>
                        <td>vs</td>
                        <td>Away Team</td>
                        <td>YYYY-MM-DD</td>
                    </tr>-->
                    
                </tbody>
            </table>
        </div>
    </div>
    <div class="container">
        <div class="col-md-5 col-md-push-7">
            <ul class="breadcrumb">
                    <h4 class="text-center">2016/2017 LEAGUES LINE UPS</h4>
            </ul>
            <table class="table">
                <thead>
                    <tr>
                    <tr>
                        <th>Home Team</th>
                        <th>VS</th>
                        <th>Away Team</th>
                        <th>Schedule</th>
                    </tr>
                </thead>
                <tbody>
                <!--<tr>
                        <td>Home Team</td>
                        <td>vs</td>
                        <td>Away Team</td>
                        <td>YYYY-MM-DD</td>
                    </tr>
                    <tr>
                        <td>Home Team</td>
                        <td>vs</td>
                        <td>Away Team</td>
                        <td>YYYY-MM-DD</td>
                    </tr>
                    <tr>
                        <td>Home Team</td>
                        <td>vs</td>
                        <td>Away Team</td>
                        <td>YYYY-MM-DD</td>
                    </tr>
                    <tr>
                        <td>Home Team</td>
                        <td>vs</td>
                        <td>Away Team</td>
                        <td>YYYY-MM-DD</td>
                    </tr>
                    
                    <tr>
                        <td>Home Team</td>
                        <td>vs</td>
                        <td>Away Team</td>
                        <td>YYYY-MM-DD</td>
                    </tr>
                    <tr>
                        <td>Home Team</td>
                        <td>vs</td>
                        <td>Away Team</td>
                        <td>YYYY-MM-DD</td>
                    </tr>-->
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="../public/lib/jquery/jquery-1.12.2.min.js"></script>
    <script src="../public/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>