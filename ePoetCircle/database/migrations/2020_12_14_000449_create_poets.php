<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\DB;

class CreatePoets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE poets (
        poet_id INT(11) NOT NULL AUTO_INCREMENT,
	    fName CHAR(30) NULL,
	    surname CHAR(40) NULL,
	    address CHAR(100) NULL,
	    postcode CHAR(20) NULL,
	    phoneNum CHAR(30) NULL,
	    PRIMARY KEY (poet_id)
        )");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poets');
    }
}
