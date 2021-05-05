<?php

namespace App\Http\Controllers;
use App\Models\Character;

use Illuminate\Http\Request;

class CharacterController extends Controller
{




    public function index()
    {
        return view('welcome');
    }



    public function enterCharacter(Request $request){

        $character = Character::enterCharacter($request);
        return redirect('/showCharacter');

    }

    public function showCharacter(Request $request){

        //$characters = Character::all();

     //       return View('character', compact ('characters'));

        if($request){
            $query = trim($request->get('search'));

            $characters = Character::where('name','LIKE','%'. $query . '%')
            ->orWhere('description','LIKE','%'. $query . '%')
            ->orWhere('power','LIKE','%'. $query . '%')
            ->orWhere('id','LIKE','%'. $query . '%')
            ->orderBy('id','asc')
            ->get();

            return view('character',['characters' => $characters, 'search' => $query]);
        }


    }


    public function updateCharacter(Request $request){

        $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'power' => ['required','numeric']
        ]);

       //dd($request->all());
        $id = $request->get('id');

        //dd($id);

        Character::where('id', '=', $id)
                    ->update([
                        'name'=>request('name'),
                        'description'=>request('description'),
                        'power'=>request('power'),
                    ]);

        //return $request;
       return redirect('/showCharacter');
    }


    public function deleteCharacter(Request $request){

       // dd($request->all());
        Character::where('id', '=', $request->get('id'))
                    ->delete();
        return redirect('/showCharacter');

    }


    public function mostPowerfulCharacter(){

        //DB::table('orders')->max('id');
        //$strongestCharacter = Character::max('power');
        $maxId = 'no encontrado';
        $maxName ='no encontrado';
        $maxDescription = 'no encontrado';
        $maxPower = '0';


        $powerfulCharacter = Character::orderBy('power','desc')->first();
        $maxId = $powerfulCharacter->id;
        $maxName = $powerfulCharacter->name;
        $maxDescription = $powerfulCharacter->description;
        $maxPower = $powerfulCharacter->power;

        $arrayPowerful = ([
            'id'=>$maxId,
            'name'=>$maxName,
            'description'=>$maxDescription,
            'power'=>$maxPower
        ]);

        //dd($arrayPowerful);
    //return redirect()->back(compact ('powerfulCharacter'));
        return view('powerfulCharacter', compact ('arrayPowerful'));

    }



    public function  lessPowerfulCharacter(){

        //DB::table('orders')->max('id');
        //$strongestCharacter = Character::max('power');
        $maxId = 'no encontrado';
        $maxName ='no encontrado';
        $maxDescription = 'no encontrado';
        $maxPower = '0';


        $powerfulCharacter = Character::orderBy('power','asc')->first();
        $maxId = $powerfulCharacter->id;
        $maxName = $powerfulCharacter->name;
        $maxDescription = $powerfulCharacter->description;
        $maxPower = $powerfulCharacter->power;

        $arrayPowerful = ([
            'id'=>$maxId,
            'name'=>$maxName,
            'description'=>$maxDescription,
            'power'=>$maxPower
        ]);

        //dd($arrayPowerful);
    //return redirect()->back(compact ('powerfulCharacter'));
        return view('powerfulCharacter', compact ('arrayPowerful'));

    }

    /*
    public function searchCharacter(Request $request)
    {


        $search = $request->get('search');
        $characters=Character::where('name','like','%'.$search.'%')->get();

        return view('searchCharacter',compact('characters','search'));

        /*
        $id = $character->id;
        $name = $character->name;
        $description = $character->description;
        $power = $character->power;


        if ($request) {
            $query = trim($request->get('search'));
            $character = Character::Where('nombre', 'LIKE', '%' . $query . '%' )
                ->orderBy('created_at','desc');

        }


        $arrayCharacter = ([
            'id'=>$id,
            'name'=>$name,
            'description'=>$description,
            'power'=>$power
        ]);



       dd($arrayCharacter);
       */
        // return view('searchCharacter',compact('character','search'));

    //}









}
