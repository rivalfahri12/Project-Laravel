<?php

use App\Models\setting;
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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('label');
            $table->string('value')->nullable;
            $table->string('type');
            $table->timestamps();
        });

        setting::create([
            'key'=>'_site_name',
            'label'=>'Judul Situs',
            'value'=>'Website Pribadi',
            'type'=>'text',
        ]);

        
        setting::create([
            'key'=>'_instagram',
            'label'=>'Instagram',
            'value'=>'https://instagram.com/rivalfahrii',
            'type'=>'text',
        ]);

        
        setting::create([
            'key'=>'_site_description',
            'label'=>'Site Description',
            'value'=>'Website Pribadi Sederhana',
            'type'=>'text',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
