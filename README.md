# Book and Meet

Velkommen til Book and Meet! En spennende ny tjeneste for håndtering og booking av dine møterom og andre lokaler.

Tjenesten er bygd hovedsakelig på Laravel, et PHP rammeverk som tilbyr store mengder funksjonalitet og tilpassning i både front end og back end.

*Book and Meet er fortsatt under utvikling.*

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>


## Hurtig start guide

- [Installer Github desktop / Shell](https://desktop.github.com/)

- [Installer Laravel og andre nødvendige tillegg](https://laravel.com/docs/5.4/installation)

- [Installer din foretrukne databaseløsning, eks: MySQL.](https://www.mysql.com/products/workbench/) Laravel kan konfigureres til å bruke flere populære databaseløsninger som: MySQL, PostgreSQL, og SQLite.

- Clone eller fork https://github.com/linda94/booking.git til din lokale Github mappe

- Naviger til din GitHub/booking mappe

> composer install

- Dette forsikrer at alle nødvendige laravel moduler er riktig installert og oppdatert

- **Familiariser deg med Laravel:**

	- [Dokumentasjon](https://laravel.com/docs/5.4)

	- [Video tutorials for de som lærer bedre visuelt](https://laracasts.com/series/laravel-from-scratch-2017)

## Heroku

Dette prosjektet er satt opp for å kunne brukes med [Heroku](https://www.heroku.com). Her følger en ekstra hjelpeguide for å gjøre Heroku setup noe enklere.

[Begynn med heroku's getting started with PHP guide](https://devcenter.heroku.com/articles/getting-started-with-php#introduction)
Skulle du støte på noen problemer som ikke dekkes i Herokus egen guide kan du sjekke under:

### Hva når man får den her feilmeldingen?
*The only supported ciphers are AES-128-CBC and AES-256-CBC*
<br/><br/>
> php artisan key:generate --show
- kopier denne, med base64 og alt, lim inn i .env filen (APP_KEY), og kjør 'heroku config:set APP_KEY=…' hvor ... tilsvarer HELE key'en.

> php artisan config:clear
> php artisan cache:clear
> git add .
> git commit -m "something"
> git push heroku master

### Hvordan slå på debug?

1. `'debug' => env('APP_DEBUG', true),` i app.php
1. `'log' => 'errorlog',` under Logging Configuration i app.php

### Hva med heroku php buildpack for å få apache ting i bin mappen?
`"heroku/heroku-buildpack-php": "*"`
<-- denne inn i composer.json, under require-dev og så ta composer update

### Hvordan sette opp **Heroku** med **Laravel** (Sammen med heroku sin laravel-guide):

- **Følg guide på heroku med sette opp laravel i mappe, initialisere git.**
- **Legg til heroku buildpack for php (må ha med denne for å få apache server satt opp riktig i laravel-mappene)**
	1. Gå inn i composer.json
	1. Gå til require-dev
	1. Sett inn `,"heroku/heroku-buildpack-php": "*"`		(husk å sette komma først)
	1. > composer update
	1. > php artisan config:clear
	1. > php artisan cache:clear
- **Følg guide på heroku med å lage Procfile**
- **Slå på debug for laravel og heroku sånn at laravel gir feilmeldinger i nettleseren**
	1. Gå inn i config/app.php
	1. Gå til overskrift "Application Debug Mode"
	1. Sett `'debug' => env('APP_DEBUG', true)`
	1. Gå til overskrift "Logging Configuration"
	1. Sett inn `'log' => 'errorlog',`
- **Følg guide på heroku med å lage ny app på heroku (git add. + git commit + heroku create)**
- **Følg guide på heroku med å sett opp en ny Laravel encryption key (kopier HELE key-en, med base 64 og alt)**
	1. > php artisan config:clear
	1. > php artisan cache:clear
- **Følg guide på heroku med å pushe/deploye til heroku (git add. + git commit + git push heroku master)**
- **Åpne med heroku open eller gå til nettsideadressen du fikk av heroku create komandoen
	Nå skal det vises laravel-forsiden**


### Hvordan sette opp HEROKU med LARAVEL + PGSQL DATABASE

- **Legg til heroku postgresql addon til laravel-prosjektet, i kommandolinjen:**
	> heroku addons:create heroku-postgresql:hobby-dev
- **Sett opp Laravel med PostgreSQL, i database filen config/database.php**
	Sett inn disse parameterene øverst (etter <?php)
   <br/><br/>
   `$url = parse_url(getenv("DATABASE_URL"));`
   <br/><br/>
   `$host = $url["host"];`
   <br/><br/>
   `$username = $url["user"];`
   <br/><br/>
   `$password = $url["pass"];`
   <br/><br/>
   `$database = substr($url["path"], 1);`
	<br/><br/>
	**Under overskriften 'Default Database Connection Name' endre til pgsql**
	<br/><br/>
		`'default' => env('DB_CONNECTION', 'pgsql'),`
		<br/><br/>
	**Endre feltene under 'Database Connections' slik at de viser til feltene øverst:**
	<br/><br/>
		`host' => env('DB_HOST', $host),`
		<br/><br/>
		`port' => env('DB_PORT', '5432'),`
		<br/><br/>
		`database' => env('DB_DATABASE', $database),`
		<br/><br/>
		`username' => env('DB_USERNAME', $username),`
		<br/><br/>
		`password' => env('DB_PASSWORD', $password),`

- **Git add og commit + git push heroku master**
- **Migrate database-tabeller, slik at de blir opprettet på heroku databasen (laravel sine 2 standard tabeller dersom ingen andre har blitt lagt inn)**
	> heroku run php artisan migrate

	- yes // lager to tabeller som følger med laravel (database/migrations/)

	> heroku open
