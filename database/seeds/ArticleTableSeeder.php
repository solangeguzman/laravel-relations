<?php

use Illuminate\Database\Seeder;
use App\Author;
use App\Article;
use\App\Tag;
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
        $authorListID[] = $author->id;
      }
      // $tagList=[
      //   'scienza',
      //   'finanza',
      //   'Stati Esteri',
      //   'Bitcoin',
      //   'Sport',
      //   'Fitness'
      // ];

      $tagList=[];
      for($i =0; $i <8; $i++) {
        $tagObj = new Tag();
        $tagObj->name = $faker->firstName();
        $tagObj->surname = $faker->lastName();
        $tagObj->save();
        $tagList[] = $tagObj->id;



      // foreach($tagList as $tag){
      //   $tagObj = new Tag();
      //   $tagObj->name = $tag;
      //   $tagObj->surname = $tag;
      //   $tagObj->save();
      //   $tagListID[] = $tagObj->id;
    }

      for($i=0; $i <50; $i++){
          $article = new Article;
          $article->title = $faker->sentence();
          $article->cover=$faker->paragraph(50);
          $article->text = $faker->paragraph(50);
          $ListAuthID= array_rand(array_flip($authorListID), 1);
          $article->author_id = $ListAuthID;
         
          $randomTagKeys= array_rand($tagList,2 );
          $tag1 = $tagList[$randomTagKeys[0]];
          $tag2 = $tagList[$randomTagKeys[1]];
          
          $article->tag()->attach($tag1);
          $article->tag()->attach($tag2);
          
          $article->save();
      }
  }
}
