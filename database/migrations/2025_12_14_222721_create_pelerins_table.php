    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('pelerins', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->string('prenom');
        $table->date('date_naissance');
        $table->string('tel');
        $table->string('email')->unique();
        $table->string('numero_passport')->unique();
        $table->date('date_emission');
        $table->date('date_expire');
        $table->string('statut_visa')->default('En attente');
        $table->string('statut_dossier')->default('incomplet');
        $table->timestamps();
    });

        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('pelerins');
        }
    };
