<?php

use Illuminate\Database\Seeder;
use App\Pizza;

class PizzaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pizze = config('pizze');

        foreach ($pizze as $pizza) {

            $new_pizza = new Pizza();
            $new_pizza->nome = $pizza['nome'];
            $new_pizza->prezzo = $pizza['prezzo'];
            $new_pizza->ingredienti = $pizza['ingredienti'];

            if ($pizza['vegetariana'] === 'sì') {
                $pizza['vegetariana'] = true;
            } else {
                $pizza['vegetariana'] = false;
            }

            $new_pizza->vegetariano = $pizza['vegetariana'];
            $new_pizza->slug = Pizza::generateSlug($pizza['nome']);

            // dump($new_pizza);
            $new_pizza->save();
        }

    }
}
