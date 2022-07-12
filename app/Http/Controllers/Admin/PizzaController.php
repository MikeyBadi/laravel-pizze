<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pizza;
use App\Ingredient;
use App\Http\Requests\PizzaRequest;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzas = Pizza::orderBy('id', 'desc')->get();
        return view('admin.pizze.index', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredients = Ingredient::all();
        return view('admin.pizze.create', compact('ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PizzaRequest $request)
    {
        $data = $request->all();
        $new_pizza = new Pizza;
        $data['slug'] = Pizza::generateSlug($data['nome']);
        // dd($data['vegetariano']);
        $new_pizza->fill($data);
        $new_pizza->save();

        if(array_key_exists('ingredients', $data)){
            $new_pizza->ingredients()->attach($data['ingredients']);
        }

        return redirect()->route('admin.pizza.show', $new_pizza);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pizza = Pizza::find($id);
        if ($pizza) {

            return view('admin.pizze.show', compact('pizza'));
        }
        abort(404, 'Pizza non trovata');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pizza = Pizza::find($id);
        $ingredients = Ingredient::all();
        if ($pizza) {
            return view('admin.pizze.edit', compact('pizza','ingredients'));
        }
        abort(404, 'Pizza non trovata');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PizzaRequest $request, Pizza $pizza)
    {
        $data = $request->all();
        $data['slug'] = Pizza::generateSlug($data['nome']);
        // dd($data['vegetariano']);
        $pizza->update($data);

        return redirect()->route('admin.pizza.show', $pizza);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pizza $pizza)
    {
        $pizza->delete();
        return redirect()->route('admin.pizza.index')->with('message', 'Pizza $pizza->nome was deleted');
    }

}
