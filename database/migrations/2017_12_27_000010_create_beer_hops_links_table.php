<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeerHopsLinksTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'beer_hops_links';

    /**
     * Run the migrations.
     * @table beer_hops_link
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('beers_id')->unsigned();
            $table->integer('beer_hops_id')->unsigned();

            $table->index(["beers_id"], 'fk_beer_hops_link_beers1_idx');

            $table->index(["beer_hops_id"], 'fk_beer_hops_link_beer_hops1_idx');


            $table->foreign('beers_id', 'fk_beer_hops_link_beers2_idx')
                ->references('id')->on('beers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('beer_hops_id', 'fk_beer_hops_link_beer_hops2_idx')
                ->references('id')->on('beer_hops')
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
