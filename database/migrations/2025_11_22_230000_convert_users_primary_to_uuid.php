<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $columnType = DB::table('information_schema.columns')
            ->where('table_name', 'users')
            ->where('column_name', 'id')
            ->value('data_type');

        if ($columnType === 'uuid') {
            return;
        }

        DB::statement('CREATE EXTENSION IF NOT EXISTS "pgcrypto";');

        if (! Schema::hasColumn('users', 'uuid_temp')) {
            Schema::table('users', function (Blueprint $table) {
                $table->uuid('uuid_temp')->nullable();
            });
        }

        DB::statement('UPDATE users SET uuid_temp = gen_random_uuid() WHERE uuid_temp IS NULL;');

        DB::statement('ALTER TABLE users DROP CONSTRAINT IF EXISTS users_pkey;');
        DB::statement('ALTER TABLE users RENAME COLUMN id TO legacy_bigint_id;');
        DB::statement('ALTER TABLE users RENAME COLUMN uuid_temp TO id;');
        DB::statement('ALTER TABLE users ALTER COLUMN legacy_bigint_id DROP DEFAULT;');
        DB::statement('ALTER TABLE users ADD PRIMARY KEY (id);');
        DB::statement('ALTER TABLE users ALTER COLUMN id SET DEFAULT gen_random_uuid();');
        DB::statement('ALTER TABLE users ALTER COLUMN id SET NOT NULL;');
        DB::statement('DROP SEQUENCE IF EXISTS users_id_seq;');

        if (Schema::hasColumn('users', 'legacy_bigint_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('legacy_bigint_id');
            });
        }

        if (Schema::hasColumn('users', 'current_team_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('current_team_id');
            });

            Schema::table('users', function (Blueprint $table) {
                $table->uuid('current_team_id')->nullable();
            });
        }

        Schema::dropIfExists('sessions');
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->uuid('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::dropIfExists('personal_access_tokens');
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuidMorphs('tokenable');
            $table->text('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        throw new \RuntimeException('Reverter a conversão para UUID requer intervenção manual.');
    }
};
