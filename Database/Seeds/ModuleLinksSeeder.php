<?php

namespace App\Modules\Kantoku\Database\Seeds;

use Illuminate\Database\Seeder;
Use DB;
use Schema;


class ModuleLinksSeeder extends Seeder
{


	public function run()
	{

		$admin_id = DB::table('menus')
			->where('name', '=', 'admin')
			->pluck('id');

		if ($admin_id == null) {
			$admin_id = 1;
		}


// Links -------------------------------------------------------------------
// modules
		$link_names = array([
			'menu_id'				=> $admin_id, // admin menu
			'status_id'				=> 1,
			'position'				=> 7
		]);

		if (Schema::hasTable('menulinks'))
		{
			DB::table('menulinks')->insert( $link_names );
		}

		$last_insert_id = DB::getPdo()->lastInsertId();
		$locale_id = DB::table('locales')
			->where('name', '=', 'English')
			->where('locale', '=', 'en', 'AND')
			->pluck('id');

		$ink_name_trans = array([
			'title'					=> 'Modules',
			'status'				=> 1,
			'url'					=> '/admin/modules',
			'menulink_id'			=> $last_insert_id,
			'locale_id'				=> $locale_id // English ID
		]);

		if (Schema::hasTable('menulinks'))
		{
			DB::table('menulink_translations')->insert( $ink_name_trans );
		}

	} // run


}
