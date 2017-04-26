# Book and Meet

Velkommen til Book and Meet! En Spennende ny tjeneste for håndtering og booking av dine møterom og andre lokaler.

Book and Meet er fortsatt under utvikling.

Tjenesten er bygd hovedsakelig på Laravel, et PHP rammeverk som tilbyr store mengder funksjonalitet og tilpassning i både front end og back end.

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>


## Hurtig start guide

-[Installer Github desktop / Shell](https://desktop.github.com/)

-[Installer Laravel og andre nødvendige tillegg](https://laravel.com/docs/5.4/installation)

-[Installer din foretrukne databaseløsning, eks: MySQL.](https://www.mysql.com/products/workbench/) Laravel kan konfirureres til å bruke flere populære databseløsninger som: MySQL, PostgreSQL, og SQLite.

-clone eller fork https://github.com/linda94/booking.git til din lokale Github mappe

-Begynn arbeidet!

## Heroku

Dette prosjektet er satt opp for å kunne brukes med [Heroku](https://www.heroku.com) Her følger en ekstra hjelpeguide for å gjøre Heroku setup noe enklere.

-[Begynn med heroku's getting started with PHP guide](https://devcenter.heroku.com/articles/getting-started-with-php#introduction)
-Skulle du støte på noen problemer som ikke dekkes i Herokus egen guide kan du sjekke under:

#Hva når man får den her feilmeldingen?
The only supported ciphers are AES-128-CBC and AES-256-CBC

- $ php artisan key:generate --show
	kopier denne, med base64 og alt, lim inn i .env filen (APP_KEY), og kjør 'heroku config:set APP_KEY=…' hvor ... tilsvarer HELE key'en.

- bruk php artisan config:clear
- bruk php artisan cache:clear
- git add .
- git commit -m "something"
- git push heroku master

#Hvordan slå på debug?

'debug' => env('APP_DEBUG', true), i app.php
OG 'log' => 'errorlog', under Logging Configuration i app.php

Hva med heroku php buildpack for å få apache ting i bin mappen?
"heroku/heroku-buildpack-php": "*"
	denne inn i composer.json, under require-dev og så ta composer update

HOW TO SET UP HEROKU WITH LARAVEL (Sammen med heroku sin laravel-guide):

- Følg guide på heroku med sette opp laravel i mappe, initialisere git.
- Legg til heroku buildpack for php (må ha med denne for å få apache server satt opp riktig i laravel-mappene)
	Gå inn i composer.json
		Gå til require-dev
			Sett inn ,"heroku/heroku-buildpack-php": "*"		(husk å sette komma først)
	Kjør komandoen 'composer update' i komandolinjen for mappen
	Kjør php artisan config:clear
	Kjør php artisan cache:clear
- Følg guide på heroku med å lage Procfile
- Slå på debug for laravel og heroku sånn at laravel gir feilmeldinger i nettleseren
	Gå inn i config/app.php
		Gå til overskrift "Application Debug Mode"
			Sett 'debug' => env('APP_DEBUG', true)
		Gå til overskrift "Logging Configuration"
			Sett inn 'log' => 'errorlog',
- Følg guide på heroku med å lage ny app på heroku (git add. + git commit + heroku create)
- Følg guide på heroku med å sett opp en ny Laravel encryption key (kopier HELE key-en, med base 64 og alt)
	Kjør php artisan config:clear
	Kjør php artisan cache:clear
- Følg guide på heroku med å pushe/deploye til heroku (git add. + git commit + git push heroku master)
- Åpne med heroku open eller gå til nettsideadressen du fikk av heroku create komandoen
	Nå skal det vises laravel-forsiden


#Hvordan sette opp HEROKU med LARAVEL + PGSQL DATABASE

- Legg til heroku postgresql addon til laravel-prosjektet, i kommandolinjen
	heroku addons:create heroku-postgresql:hobby-dev
- Sett opp Laravel med PostgreSQL, i database filen config/database.php
	Sett inn disse parameterene øverst (etter <?php)
		$url = parse_url(getenv("DATABASE_URL"));
		$host = $url["host"];
		$username = $url["user"];
		$password = $url["pass"];
		$database = substr($url["path"], 1);
	Under overskrifte 'Default Database Connection Name' endre til pgsql
		'default' => env('DB_CONNECTION', 'pgsql'),
	Endre feltene under 'Database Connections' slik at de viser til feltene øverst:
		'host' => env('DB_HOST', $host),
		'port' => env('DB_PORT', '5432'),
		'database' => env('DB_DATABASE', $database),
		'username' => env('DB_USERNAME', $username),
		'password' => env('DB_PASSWORD', $password),
- Git add og commit + git push heroku master
- Migrate database-tabeller, slik at de blir opprettet på heroku databasen (laravel sine 2 standard tabeller dersom ingen andre har blitt lagt inn)
	heroku run php artisan migrate
		yes	// lager to tabeller som følger med laravel (database/migrations/)


#Test at det fungerer

- Lage eloquent Model, migration og controller for Task
	php artisan make:model Task
	php artisan make:migration create_task_table
	php artisan make:controller TaskController -r
- Fikse controller (app/Http/Controllers/TaskController)
	Helt øverst under use Illuminate\Http\Request; lim inn:
		use DB;
		use App\Task;
	I function index lim inn:
		$tasks = DB::table('tasks')->get();

        	return view('tasks.index', compact('tasks'));
	I function create lim inn:
		return view('tasks/newTask');
	I function store lim inn:
		$task = new Task;

        	$task->body = request('body');
        	$task->save(); 

        	return redirect('/tasks');
	
	I function show lim inn:
		$task = DB::table('tasks')->find($id);

        	return view('tasks.show', compact('task'));
- Fikse model (app/Task.php)
	Inni brackets etter class Task extends Model { } 
		lim inn: protected $table = 'tasks';
- Fikse migration (database/migrations/...create_tasks_table)
	Inni function up lim inn:
		Schema::create('tasks', function (Blueprint $table) {
            		$table->increments('id');
            		$table->text('body');
            		$table->timestamps();
        	});
	Inni funciton down lim inn:
		Schema::dropIfExists('tasks');
- Lage side som viser alle tasks
	Lag ny mappe som heter tasks inni mappen views (resources/views)
		Lag en ny fil som heter index.blade.php
		Lim inn html kode:
			<!DOCTYPE html>
			<html>
			    <head>
			        <meta charset="UTF-8">
			        <title></title>
			        <!-- Latest compiled and minified CSS -->
			        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
			        <!-- Optional theme --><!--
			        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">-->
			        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			        <!-- Latest compiled and minified JavaScript -->
			        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
			    </head>
			    <body>
			    <div class="container-fluid">
			        <ul>
			            @foreach ($tasks as $task)
			            <li>
			                <a href="/tasks/{{ $task->id }}">
			                    {{ $task->body }}
			                </a>
			            </li>
			            @endforeach
			        </ul>
			        <br/>
			        <br/>
			        <a href="/">
			            Tilbake
			        </a>
			        </br>
			        </br>
			        <a href="/tasks/newTask">Ny task</a>
			        <br/>
			        </br>
			    </div>
			    </body>
			</html>
- Lage side for å opprette ny task
	Lag ny fil inni tasks mappen som heter newTask.blade.php
	Lim inn html koden:
		<!DOCTYPE html>
		<html>
		<head>
		  <meta charset="UTF-8">
		  <title></title>
		  <!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
			<!-- Optional theme --><!--
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">-->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		</head>
		<body>
		<div class="container-fluid">
		<h1>Make new task</h1>

		<form method="POST" action="/tasks">
			{{ csrf_field() }}

			<input name="body" value="A new taskbody">
			</input>
			<button type="submit">Sumbit</button> 
		</form>
		</div>
		</body>
		</html>
- Lag side for å vise én bestemt task
	Lag ny fil inni tasks mappen som heter show.blade.php
	Lim inn html koden:
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8">
				<title></title>
				<!-- Latest compiled and minified CSS -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
				<!-- Optional theme --><!--
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">-->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
				<!-- Latest compiled and minified JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
			</head>
			<body>
				<div class="container-fluid">
					<h1>{{ $task->body }}</h1>
					<br/>
					<br/>
					<a href="/tasks">Tilbake</a>
					</div>
				</body>
		</html>
- Rediger welcome.blade.php filen i views mappen
	Slett alt som er der, og lim inn html koden:
		<!DOCTYPE html>
		<html>
		    <head>
		        <meta charset="UTF-8">
		        <title></title>
		        <!-- Latest compiled and minified CSS -->
		        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		        <!-- Optional theme --><!--
		        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">-->
		        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		        <!-- Latest compiled and minified JavaScript -->
		        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		    </head>
		    <body>
		    <div class="container-fluid">
		        <h1>
		            <a href="/tasks" style="text-decoration: none">Tasks</a>
		        </h1>
		    </div>
		    </body>
		</html>
- Legge inn riktig routing i routes/web.php
	Slett alt under kommentaren om Web Routes og lim inn html koden:
	 use App\Task;

	Route::get('/', function () {
	    return view('welcome');
	});

	Route::get('/tasks', 'TaskController@index');

	Route::get('/tasks/newTask', 'TaskController@create');

	Route::get('/tasks/{task}', 'TaskController@show')->name('show_task');

	Route::POST('/tasks', 'TaskController@store');
- Git add og commit + git push heroku master
- Migrate database-tabeller, slik at de blir opprettet på heroku databasen
	heroku run php artisan migrate
		yes	// lager den nye task tabellen
- heroku open
