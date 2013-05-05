<?php

class Create_Posts {

	/**
	 * Make changes to the database.
	 * Create the posts table in the database
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table) {
		    $table->increments('id');
		    $table->string('post_title', 255);
		    $table->text('post_body');
		    $table->integer('post_author');
		    $table->timestamps();
		});

		DB::table('posts')->insert(array(
		    'post_title'  	=>	'First post',
		    'post_body'		=>	'This is post one.',		
		    'post_author'  	=> 	'Admin'
		));

		DB::table('posts')->insert(array(
		    'post_title'  	=>	'Second post',
		    'post_body'		=>	'This is post two.',		
		    'post_author'  	=> 	'Admin'
		));

		DB::table('posts')->insert(array(
		    'post_title'  	=>	'Third post',
		    'post_body'		=>	'This is post three.',		
		    'post_author'  	=> 	'Admin'
		));

		DB::table('posts')->insert(array(
		    'post_title'  	=>	'Fourth post',
		    'post_body'		=>	'This is post four.',		
		    'post_author'  	=> 	'Admin'
		));

		DB::table('posts')->insert(array(
		    'post_title'  	=>	'Fifth post',
		    'post_body'		=>	'This is post five.',		
		    'post_author'  	=> 	'Admin'
		));

		DB::table('posts')->insert(array(
		    'post_title'  	=>	'Sixt post',
		    'post_body'		=>	'This is post six.',		
		    'post_author'  	=> 	'Admin'
		));

		DB::table('posts')->insert(array(
		    'post_title'  	=>	'Seventh post',
		    'post_body'		=>	'This is post seven.',		
		    'post_author'  	=> 	'Admin'
		));
	}

	/**
	 * Revert the changes to the database.
	 * In this case we just drop the table
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}