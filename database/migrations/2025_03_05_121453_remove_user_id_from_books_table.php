<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            if (Schema::hasColumn('books', 'user_id')) {
                // Kiểm tra xem foreign key có tồn tại trước khi xóa
                $tableName = config('database.connections.mysql.prefix').'books';
                $foreignKeyName = 'books_user_id_foreign'; // Tên foreign key
    
                // Kiểm tra xem bảng có tồn tại và có foreign key hay không
                if (Schema::hasTable($tableName)) {
                    try {
                        $sql = "ALTER TABLE {$tableName} DROP FOREIGN KEY {$foreignKeyName}";
                        DB::statement($sql);
                    } catch (\Exception $e) {
                        // Nếu foreign key không tồn tại, bỏ qua lỗi
                    }
                }
                $table->dropColumn('user_id');
            }
        });
    }
    

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
