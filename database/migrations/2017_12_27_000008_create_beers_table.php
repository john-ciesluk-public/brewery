<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'beers';

    /**
     * Run the migrations.
     * @table beers
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('image');
            $table->string('ibu');
            $table->string('og');
            $table->string('abv');
            $table->tinyInteger('available');
            $table->tinyInteger('deleted');
            $table->string('calories');
            $table->string('slug');
            $table->integer('pints_sold');
            $table->integer('price');
            $table->integer('beer_types_id')->unsigned();
            $table->nullableTimestamps();

            $table->index(["beer_types_id"], 'fk_beers_beer_types_idx');

            $table->foreign('beer_types_id', 'fk_beers_beer_types1_idx')
                ->references('id')->on('beer_types')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
