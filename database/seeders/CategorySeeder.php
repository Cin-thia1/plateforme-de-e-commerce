<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $electronique = Category::create([
            'name' => 'Électronique',
            'slug' => 'electronique'
        ]);
        $elecSubs=[
           'Smartphones et montres connectées',
            'Ordinateurs portables',
            'Ordinateurs gaming',
            'Tablettes',
            'Casques et écouteurs',
            'Télévisions et home cinéma',
            'Appareils photo et caméras',
            'Accessoires',
            'Consoles de jeux et manette',
            'Composants informatiques',
        ];
        foreach ($elecSubs as $name) {
            SubCategory::create([
                'name' => $name,
                'slug' => \Str::slug($name),
                'category_id' => $electronique->id
            ]);
        }
        
        $vetements = Category::create([
            'name' => 'Vêtements',
            'slug' => 'vetements' 
        ]);
//catégorie vetements
        $vetementsSubs = [
            'T-shirts et polos',
            'Chemises',
            'Pantalons',
            'Robes et jupes',
            'Vestes et manteaux',
            'Pulls et sweats',
            'Sous-vêtements et lingerie',
            'Tenues de sport',
            'Chaussures',
            'Accessoires vestimentaires (ceintures, chapeaux, foulards…)',
        ];

        foreach ($vetementsSubs as $name) {
            SubCategory::create([
                'name' => $name,
                'slug' => \Str::slug($name), 
                'category_id' => $vetements->id 
            ]);
        }

        //categorie électroménager
        $electromenager = Category::create([
            'name' => 'Électroménager',
            'slug' => 'electromenager'
        ]);

        $electromenagerSubs = [
            'Réfrigérateurs et congélateurs',
            'Machines à laver et sèche-linge',
            'Fours et cuisinières',
            'Micro-ondes',
            'Mixeurs et robots de cuisine',
            'Bouilloires et cafetières',
            'Aspirateurs',
            'Ventilateurs et climatiseurs',
            'Fers à repasser',
            'Petits appareils de soin',
        ];


        foreach ($electromenagerSubs as $name) {
            SubCategory::create([
                'name' => $name,
                'slug' => \Str::slug($name),
                'category_id' => $electromenager->id
            ]);
        }
        //categorie meubles
        
        $meubles = Category::create([
            'name' => 'Meubles',
            'slug' => 'meubles'
        ]);

        $meublesSubs = [
            'Canapés et fauteuils',
            'Tables (à manger, basses, de chevet)',
            'Chaises et tabourets',
            'Lits et cadres de lit',
            'Armoires et penderies',
            'Commodes et rangements',
            'Bureaux et étagères',
            'Meubles TV',
            'Mobilier d’extérieur',
            'Décoration intérieure ',
        ];

        foreach ($meublesSubs as $name) {
            SubCategory::create([
                'name' => $name,
                'slug' => \Str::slug($name),
                'category_id' => $meubles->id
            ]);
        }

            //categorie bijoux
       $bijoux = Category::create([
            'name' => 'Bijoux',
            'slug' => 'bijoux'
        ]);

        $bijouxSubs = [
            'Bagues',
            'Colliers',
            'Bracelets',
            'Boucles d’oreilles',
            'Montres',
            'Bijoux pour hommes',
            'Bijoux de mariage et fiançailles',
        ];

        foreach ($bijouxSubs as $name) {
            SubCategory::create([
                'name' => $name,
                'slug' => \Str::slug($name),
                'category_id' => $bijoux->id
            ]);
        } 

        //categorie cosmetiques
        $cosmetiques = Category::create([
            'name' => 'Cosmétiques',
            'slug' => 'cosmetiques'
        ]);

        $cosmetiquesSubs = [
            'Maquillage (teint, yeux, lèvres)',
            'Soins du visage',
            'Soins du corps',
            'Parfums et eaux de toilette',
            'Produits capillaires ',
            'Produits pour hommes',
            'Coffrets cadeaux beauté',
        ];

        foreach ($cosmetiquesSubs as $name) {
            SubCategory::create([
                'name' => $name,
                'slug' => \Str::slug($name),
                'category_id' => $cosmetiques->id
            ]);
        }
    }
}
