# LaravelBlog

Cheat Sheet
Gebruik deze code om uit de users map te gaan en naar de correcte map te gaan:
cd C:\laragon\www

Gebruik dit om een nieuwe project aan te maken
laravel new nameproject
1.	composer install
2.	npm install
3.	npm run dev
4.	npm run build
5.	composer require laravel/breeze --dev
6.	php artisan breeze:install
7.	php artisan migrate  (om database aan te maken)
8.	Maak migrations aan
9.	php artisan make:seeder NameSeeder

10.	Vul de seeders in:

a.	public function run()
b.	    {
c.	        User::create([
d.	            'name' => 'Bob',
e.	            'email' => 'bob@gmail.com',
f.	            'password' => Hash::make('12345678')
g.	        ]);
h.	    }

12.	add NameSeeder::class, to DatabaseSeeder.php zodat de database de seeder herkent.
13.	php artisan migrate:fresh –seed
14.	Connect alle foreign id’s aan elkaar 
15.	Maak models aan met php artisan make:model Compartment
16.	Ga naar views en voeg de code toe, kijk naar oefensystem

Voorbeeld:
php artisan make:migration createStudentsTable
Kijk naar PracticeSystem voor inhoud migrations

Hiermee kan je alleen een van deze 3 waardes invullen in de database:
$table->enum(‘size’, [‘small’, ‘medium’, ‘large’]);


Maak een .env bestand aan
Copy .env.example .env (kopieer .env.example naar .env)



