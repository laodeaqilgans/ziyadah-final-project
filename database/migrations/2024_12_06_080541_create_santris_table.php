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
            Schema::create('santris', function (Blueprint $table) {
                $table->id();
                $table->string('nama_santri');              // Nama santri
                $table->string('nik')->unique();             // Nomor Induk Kependudukan (NIK)
                $table->string('kamar');                     // Kamar tempat tinggal
                $table->string('kelas');                     // Kelas santri
                $table->date('tanggal_lahir')->nullable();   // Tanggal lahir santri
                $table->string('alamat')->nullable();         // Alamat santri
                $table->string('nomor_telepon')->nullable();  // Nomor telepon santri
                $table->string('gambar')->nullable();        // Gambar santri (optional)
                $table->timestamps();
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('santris');
        }
    };