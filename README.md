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

Hvordan sette opp **Heroku** med **Laravel** (Sammen med heroku sin laravel-guide):

- Følg guide på heroku med sette opp laravel i mappe, initialisere git.
- Legg til heroku buildpack for php (må ha med denne for å få apache server satt opp riktig i laravel-mappene)
	>Gå inn i composer.json
	>Gå til require-dev
	>Sett inn ,"heroku/heroku-buildpack-php": "*"		(husk å sette komma først)
	>Kjør komandoen 'composer update' i komandolinjen for mappen
	>Kjør php artisan config:clear
	>Kjør php artisan cache:clear
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


- Git add og commit + git push heroku master
- Migrate database-tabeller, slik at de blir opprettet på heroku databasen
	heroku run php artisan migrate
		yes	// lager den nye task tabellen
- heroku open
