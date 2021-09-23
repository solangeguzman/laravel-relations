<?php

use Illuminate\Database\Seeder;
use App\Author;
use App\Article;
use Faker\Generator as faker;
class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)

    {
      $authorList=[
      'Marcos Gutierrez',
      'Pepe Baudo',
      'Daniel Brambilla',
      'Samuel Magnoli',
      'Armando Lupo',
      ];

      $authorListID =[];


      foreach($authorList as $a){
        $author = new Author;
        $author->name = $a;
        $author->surname=$faker->text(50);
        $author->picture=$faker->text(50);
        $author->email = $faker->email();
        $author->save();
        $authorListID[] = $author;
      }

      for($i=0; $i <50; $i++){
          $article = new Article;
          $article->title = $faker->sentence();
          $article->cover=$faker->paragraph(50);
          $article->text = $faker->paragraph(50);
          $ListAuthID= array_rand($authorListID);
          $article->author_id = $ListAuthID[0]->id;
          $article->save();
      }
  }
}
