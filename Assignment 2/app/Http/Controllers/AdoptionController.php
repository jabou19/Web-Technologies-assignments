<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdoptionController extends Controller
{
    public function create()
    {
        return view('adoptions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => ['required'],
            'description' => ['required'],
            'image'       => ['file', 'image']
        ]);


        $adoption = new Adoption();
        if ($request->has('image'))
        {
            $filename = Str::random(32) . "." . $request->file('image')->extension();
            $request->file('image')->move('imgs/uploads', $filename);
            $adoption->image_path = "imgs/uploads/$filename";
        }
        else
            $adoption->image_path = "imgs/demo/4.jpg";
        $adoption->name= $validated['name'];
        $adoption->description = $validated['description'];
        $adoption->listed_by = auth()->id();
        $adoption->save();


        /*
        |-----------------------------------------------------------------------
        | Task 4 User, step 5.
        | The $adoption variable should be assigned to the logged user.
        | This is done using the listed_by field from the user column in the database.
        |-----------------------------------------------------------------------
        */

//      $user=User::all(request('listed_by'));
//      $adoption->listedBy()->associate($user);

        return redirect()->home()->with('success', "Post for $adoption->name created successfully");
    }

    public function show(Adoption $adoption)
    {
        return view('adoptions.details', ['adoption' => $adoption]);
    }

    public function adopt(Adoption $adoption)
    {
        /*
        |-----------------------------------------------------------------------
        | Task 5 User, step 6. You should assing $adoption
        | The $adoption variable should be assigned to the logged user.
        | This is done using the adopted_by field from the user column in the database.
        |-----------------------------------------------------------------------
        */
abort_if($adoption->listed_by== auth()->id(),403);

        $adoption->adopted_by=auth()->id();
        $adoption->save();
        return redirect()->home()->with('success', "Pet $adoption->name adopted successfully");
    }


    public function mine()
    {
        /*
        |-----------------------------------------------------------------------
        | Task 6 User, step 3.
        | You should assing the $adoptions variable with a list of all adoptions of logged user.
        |-----------------------------------------------------------------------
        */

       $user=auth()->id();
       $adoptions=Adoption::where('adopted_by', $user)->get();


        return view('adoptions.list', ['adoptions' => $adoptions, 'header' => 'My Adoptions']);
    }
}
