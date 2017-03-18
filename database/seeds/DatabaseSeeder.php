<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\Category;
use App\Models\Lang;
use App\Models\User;
use App\Models\Text;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call('UserTableSeeder');
       // $this->call('ArticlesSeeder');
       // $this->call('CategoriesSeeder');
        //$this->call('LangsSeeder');
       // $this->call('UsersSeeder');
       // $this->call('TextsSeeder');
        $this->call('MonitoringSeeder');
    }

}

class ArticlesSeeder extends Seeder {

    public function run()
    {
        DB::table('Articles')->delete();


    }

}

class CategoriesSeeder extends Seeder {

    public function run()
    {
        DB::table('Categories')->delete();
}

}




class TextsSeeder extends Seeder {

    public function run()
    {
        DB::table('Texts')->delete();

 }

}
class MonitoringSeeder extends Seeder {

    public function run()
    {
        DB::table('Monitoring')->delete();
        Monitoring::create([
            'id' => "1",
            'name' => 'Тест',

        ]);

    }

}


