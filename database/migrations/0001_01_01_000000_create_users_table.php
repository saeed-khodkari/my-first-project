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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 30); // نام کوچک
            $table->string('last_name', 50);  // نام خانوادگی
            $table->date('birthdate'); // تاریخ تولد
            $table->string('phone', 13)->unique(); // شماره موبایل با فرمت +989
            $table->string('otp_code')->nullable(); // کد OTP
            $table->timestamp('otp_expires_at')->nullable(); // تاریخ انقضای کد OTP
            $table->string('profile_picture')->default('uploads/profile_pictures/default.png'); // تصویر پروفایل، با مقدار پیش‌فرض
            $table->enum('role', ['admin', 'instructor', 'user'])->default('user'); // نقش کاربری: admin, instructor, user
            $table->enum('status', ['1', '0'])->default('1'); // وضعیت حساب: 1 = فعال، 0 = غیرفعال
            $table->timestamp('mobile_verified_at')->nullable(); // زمان تأیید شماره موبایل
            $table->string('address', 500); // آدرس کاربر
            $table->rememberToken(); // توکن برای به خاطر سپردن کاربر
            $table->timestamps(); // زمان‌های ایجاد و بروزرسانی
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
