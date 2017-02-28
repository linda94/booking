Hva når man får den her feilmeldingen?
##The only supported ciphers are AES-128-CBC and AES-256-CBC

- $ php artisan key:generate --show
	kopier denne, med base64 og alt, lim inn i .env filen (APP_KEY), og kjør 'heroku config:set APP_KEY=…' hvor ... tilsvarer HELE key'en.

- bruk php artisan config:clear
- bruk php artisan cache:clear
- git add .
- git commit -m "something"
- git push heroku master

Hvordan slå på debug?

'debug' => env('APP_DEBUG', true), i app.php
OG 'log' => 'errorlog', under Logging Configuration i app.php

Hva med heroku php buildpack for å få apache ting i bin mappen?
"heroku/heroku-buildpack-php": "*"
	denne inn i composer.json, under require-dev og så ta composer update

HOW TO SET UP HEROKU WITH LARAVEL (Sammen med heroku sin laravel-guide):

#1 Følg guide på heroku med sette opp laravel i mappe, initialisere git.
#2 Følg guide på heroku med å lage Procfile
#3 Legg til heroku buildpack for php (må ha med denne for å få apache server satt opp riktig i laravel-mappene)
	Gå inn i composer.json
		Gå til require-dev
			Sett inn ,"heroku/heroku-buildpack-php": "*"		(husk å sette komma først)
	Kjør komandoen 'composer update' i komandolinjen for mappen
	Kjør php artisan config:clear
	Kjør php artisan cache:clear
#4 Slå på debug for laravel og heroku sånn at laravel gir feilmeldinger i nettleseren
	Gå inn i config/app.php
		Gå til overskrift "Application Debug Mode"
			Sett 'debug' => env('APP_DEBUG', true)
		Gå til overskrift "Logging Configuration"
			Sett inn 'log' => 'errorlog',
#5 Følg guide på heroku med å lage ny app på heroku (git add. + git commit + heroku create)
#6 Følg guide på heroku med å sett opp en ny Laravel encryption key (kopier HELE key-en, med base 64 og alt)
	Kjør php artisan config:clear
	Kjør php artisan cache:clear
#7 Følg guide på heroku med å pushe/deploye til heroku (git add. + git commit + git push heroku master)
#8 Åpne med heroku open eller gå til nettsideadressen du fikk av heroku create komandoen
	Nå skal det vises laravel-forsiden


HOW TO SET UP HEROKU WITH LARAVEL + PGSQL DATABASE

#1 Legg til heroku postgresql addon til laravel-prosjektet, i kommandolinjen
	heroku addons:create heroku-postgresql:hobby-dev
#2 Sett opp Laravel med PostgreSQL, i database filen config/database.php
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
#3 Git add og commit + git push heroku master
#4 Migrate database-tabeller, slik at de blir opprettet på heroku databasen (laravel sine 2 standard tabeller dersom ingen andre har blitt lagt inn)
	heroku run php artisan migrate
		yes	// lager to tabeller som følger med laravel (database/migrations/)
#5 Teste man kan hente ut fra og sette inn i tabeller i databasen, bruke eksempel-tabellen 'users' fra laravel
	Gå til resources/routes/web.php og sett inn en oppføring i 'Users' tabellen:
		Route::get('/test', function () {
			DB::table('users')->insert([
				'id' => '1', 'name' => "Andreas", 'email' => 'aks1992@gmail.com', 'password' => 'nope',
			]);

			$users = DB::table('users')->get();

			dd($users);
		});
#6 Git add og commit + git push heroku master, heroku open og så sett på /test bak adressen i adresselinjen i nettleseren og last inn
	Du skal nå få opp et JSON objekt med det du satt inn i 'users' tabellen
#7 Kommenter ut/slett hele DB::table() delen da denne vil sette inn det samme på nytt, og da vil du få error fordi du allerede har oppføringen lagt i databasen fra før (kan feks bare ha id=1 én gang). Hver gang du åpner nettsiden vil den prøve uten hell å legges inn på nytt ellers. Kommenter ut dd($users) også
#8 Opprett en ny mappe 'test' inni 'views' mappen i resources/views
#9 Opprett en ny fil 'testing.blade.php' inni 'test' mappen
#10 Sett opp HTML struktur + loop som går gjennom objektene som hentes ut fra databasen:
	<ul>
		@foreach ($users as $user)
		<li>
			{{ $user->name }}
		</li>
		@endforeach
	</ul>
#11 Gå tilbake til resources/routes/web.php og send $users til testing view'et
	return view('test.testing', compact('users'));
#12 Git add og commit + git push heroku master, heroku open og så sett på /test bak adressen i adresselinjen i nettleseren og last inn
#13 Du skal nå se en liste av navn (foreløpig bare ett element i listen)