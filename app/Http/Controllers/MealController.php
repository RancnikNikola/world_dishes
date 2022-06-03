<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Meal;
use Illuminate\Http\Request;
use App\Http\Resources\MealCollection;



class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('diff_time') > 0) {
            return new MealCollection(
                Meal::withTrashed()
                    ->filter(request(['search', 'category', 'tag', 'ingredient']))
                    ->paginate(5)
            );
        } else {
            return new MealCollection(
                Meal::latest()
                    ->filter(request(['search', 'category', 'tag', 'ingredient']))
                    ->paginate(5)
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
       return new MealResource(Meal::findOrFail($meal->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        $attributes = [
            'status' => 'modified',
            'updated_at' => Carbon::now()
        ];

        $meal->update($attributes);

        return 'Status updated to modified';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy($meal)
    {   
        $mealToDelete = Meal::findOrFail($meal);
        
        $attributes = [
            'deleted_at' => Carbon::now(),
            'status' => 'deleted'
        ];

        $mealToDelete->update($attributes);
        $mealToDelete->delete();

        return 'Status updated to deleted';
    }


}
