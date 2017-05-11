<?php
use App\Role;
use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EntrustSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        // Create table for storing roles
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating roles to users (Many-to-Many)
        Schema::create('role_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'role_id']);
        });

        // Create table for storing permissions
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('permission_role', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['permission_id', 'role_id']);
        });

//----------- Roller ---------------------------------

        //Lager Administrator rollen
        $Administrator = new App\Role();
        $Administrator->name         = 'Administrator';
        $Administrator->display_name = 'Administrator'; // optional
        $Administrator->description  = 'Administrator av en losning'; // optional
        $Administrator->save();

        //Lager super bruker rollen
        $SuperBruker = new App\Role();
        $SuperBruker->name         = 'SuperBruker';
        $SuperBruker->display_name = 'Super bruker'; // optional
        $SuperBruker->description  = ''; // optional
        $SuperBruker->save();

        //Lager bruker rollen
        $Bruker = new App\Role();
        $Bruker->name         = 'Bruker';
        $Bruker->display_name = 'Bruker'; // optional
        $Bruker->description  = 'Standard bruker'; // optional
        $Bruker->save();

//------------Permissions / tillatelser ---------------

        //Bruker: Tilgang til løsning
        $tilgangTilLosning = new App\Permission();
        $tilgangTilLosning->name         = 'tilgangTilLosning';
        $tilgangTilLosning->display_name = 'Tilgang til løsning'; // optional
        // Lar en bruker...
        $tilgangTilLosning->description  = 'Gir brukere tilgang til løsning'; // optional
        $tilgangTilLosning->save();

        //Bruker: Lar en bruker endre egne profil instillinger
        $profilInstillinger = new App\Permission();
        $profilInstillinger->name         = 'profilInstillinger';
        $profilInstillinger->display_name = 'Profil instillinger'; // optional
        // Lar en bruker...
        $profilInstillinger->description  = 'Lar en bruker endre egne profil instillinger'; // optional
        $profilInstillinger->save();

        //Bruker: Lar en bruker gjøre en booking
        $booke = new App\Permission();
        $booke->name         = 'booke';
        $booke->display_name = 'Booke'; // optional
        // Lar en bruker...
        $booke->description  = 'Lar en bruker gjøre en booking'; // optional
        $booke->save();

        //Bruker: Lar en bruker endre egne bruker instillinger
        $brukerInstillinger = new App\Permission();
        $brukerInstillinger->name         = 'brukerInstillinger';
        $brukerInstillinger->display_name = 'Bruker instillinger'; // optional
        // Lar en bruker...
        $brukerInstillinger->description  = 'Lar en bruker endre egne bruker instillinger'; // optional
        $brukerInstillinger->save();

        //Legger tillatelser til bruker rollen
        $Bruker->attachPermissions(array($brukerInstillinger, $booke, $profilInstillinger, $tilgangTilLosning));

		
		//Administrator: Kan invitere nye brukere til sin løsning
		$invitere = new App\Permission();
		$invitere->name         = 'invitere';
        $invitere->display_name = 'InvitereNyBrukere'; // optional
        // Lar en admin / superbruker...
        $invitere->description  = 'Lar noen med rettigheter til det invitere nye brukere til løsning'; // optional
        $invitere->save();
		
		//Administrator: Kan aksesere administrator side
		$adminSide = new App\Permission();
		$adminSide->name         = 'adminSide';
        $adminSide->display_name = 'akseserAdminSide'; // optional
        // Lar en admin / superbruker...
        $adminSide->description  = 'Lar noen med rettigheter til det aksesere administrator side'; // optional
        $adminSide->save();
		
		//Administrator: Kan endre andres brukerinfo
		$andresBruker = new App\Permission();
		$andresBruker->name         = 'andresBruker';
        $andresBruker->display_name = 'EndreAndresBruker'; // optional
        // Lar en admin / superbruker...
        $andresBruker->description  = 'Lar noen med rettigheter til det endre andres brukerinformasjon'; // optional
        $andresBruker->save();
		
		//Administrator: Kan administrere andres brukere
		$administrereBrukere = new App\Permission();
		$administrereBrukere->name         = 'administrereBrukere';
        $administrereBrukere->display_name = 'AdministrereAndresBrukere'; // optional
        // Lar en admin / superbruker...
        $administrereBrukere->description  = 'Lar noen med rettigheter til det administrere andres brukere'; // optional
        $administrereBrukere->save();
		
		//Administrator: Kan resende eller tvangsendre passord til andre brukere
		$tvangsendrePassord = new App\Permission();
		$tvangsendrePassord->name         = 'tvangsendrePassord';
        $tvangsendrePassord->display_name = 'TvnagsendrePassorder'; // optional
        // Lar en admin / superbruker...
        $tvangsendrePassord->description  = 'Lar noen med rettigheter til det tvangsendre passord til andre brukere i sin løsning'; // optional
        $tvangsendrePassord->save();
		
		//Administrator: Endre andres brukernivåer
		$endreBrukernivaer = new App\Permission();
		$endreBrukernivaer->name         = 'endreBrukernivaer';
        $endreBrukernivaer->display_name = 'endreAndresBrukernivåer'; // optional
        // Lar en admin / superbruker...
        $endreBrukernivaer->description  = 'Lar noen med rettigheter til det endre brukernivå til brukere i sitt egen løsning'; // optional
        $endreBrukernivaer->save();
		
		//Administrator: Skal kunne administrere bookinger
		$administrereBookinger = new App\Permission();
		$administrereBookinger->name         = 'administrereBookinger';
        $administrereBookinger->display_name = 'SkalKunneAdministrereBookinger'; // optional
        // Lar en admin / superbruker...
        $administrereBookinger->description  = 'Lar noen med rettigheter til det administrere bookinger'; // optional
        $administrereBookinger->save();
		
		//Administrator: Skal kunne lage ny rom
		$nyttRom = new App\Permission();
		$nyttRom->name         = 'nyttRom';
        $nyttRom->display_name = 'LageNyeRom'; // optional
        // Lar en admin...
        $nyttRom->description  = 'Lar noen med rettigheter til det lage nye rom i en løsning'; // optional
        $nyttRom->save();
		
		//Legger tillatelser til administrator rollen
		$Administrator->attachPermissions(array($invitere, $adminSide, $andresBruker, $administrereBrukere, $tvangsendrePassord, $endreBrukernivaer, $administrereBookinger, $nyttRom));

		//Legger tillatelser til superbruker rollen
		$SuperBruker->attachPermissions(array($invitere, $adminSide, $andresBruker, $administrereBrukere, $tvangsendrePassord, $endreBrukernivaer, $administrereBookinger));

        //---------Legger til standard Admin bruker til en hver ny løsning --------

        $defaultAdmin = new App\User();
        $defaultAdmin->name = 'Admin';
        $defaultAdmin->email ='admin@bookandmeet.com';
        $defaultAdmin->password = bcrypt('bob123');
        $defaultAdmin->save();
        $defaultAdmin->attachRole(1);

		//---------Legger til 4 default rom til en ny løsning --------
		
		$newroom = new App\Room();
		$newroom->name = 'Nytt rom';
		$newroom->equipment = "Default";
        $newroom->capacity = 0;
        $newroom->Save();
		
		$newroom = new App\Room();
		$newroom->name = 'Nytt rom';
		$newroom->equipment = 'Default';
        $newroom->capacity = 0;
        $newroom->Save();
		
		$newroom = new App\Room();
		$newroom->name = 'Nytt rom';
		$newroom->equipment = 'Default';
        $newroom->capacity = 0;
        $newroom->Save();
		
		$newroom = new App\Room();
		$newroom->name = 'Nytt rom';
		$newroom->equipment = 'Default';
        $newroom->capacity = 0;
        $newroom->Save();
    }

	
    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('permission_role');
        Schema::drop('permissions');
        Schema::drop('role_user');
        Schema::drop('roles');
    }
}
