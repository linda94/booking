<?php
use App\Role;
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
