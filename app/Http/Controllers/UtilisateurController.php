<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use response;
use App\Utilisateur;
class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $succesAdd =false;
        $succesEdit =false;
        $utilisateurs = Utilisateur::paginate(6);
       return view('index', compact('utilisateurs','succesAdd','succesEdit'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     $succesAdd =false;
          $succesEdit =false;
         $request->validate([
          'nom'=>'required',
          'prenom'=>'required',
          'email'=>'required|email|unique:utilisateurs'
        ]);
        $verifierEmail = DB::table('utilisateurs')->where('email', $request->email)->first();
        $utilisateurs = Utilisateur::paginate(6);
       if($verifierEmail){
            $succesAdd =false;
            $succesEdit =false;
            return redirect()->back();
       }else{
           
            Utilisateur::create([
                'nom'=>strtoupper($request->get('nom')),
                'prenom'=>ucfirst($request->get('prenom')),
                'email'=>strtolower($request->get('email'))
            ]);
            $succesAdd =true;
            $succesEdit =false;
       }
                      
     return view('index',compact('utilisateurs','succesAdd','succesEdit'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $succesAdd =false;
        $succesEdit =false;
         $utilisateurs = Utilisateur::paginate(6);
        $modifs = Utilisateur::where('id',$id)->first();
        return view('edit', compact('modifs','utilisateurs','succesAdd','succesEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $succesAdd =false;
        $succesEdit =false;
        $request->validate([
          'nom'=>'required',
          'prenom'=>'required',
          'email'=>'required|email'
        ]);
        $utilisateurs = Utilisateur::paginate(6);
        Utilisateur::where('id',$id)
                     ->update([
                        'nom'=>$request->get('nom'),
                        'prenom'=>$request->get('prenom'),
                        'email'=>$request->get('email')
                    ]);
          $succesAdd =false;
          $succesEdit =true;
          return view ('index', compact('utilisateurs','succesAdd','succesEdit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Utilisateur::destroy($id);
        return redirect('/utilisateur');
    }

    public function recherche(Request $request){
        $succesAdd =false;
        $succesEdit =false;
        $val = $request->get('recherche');
        if($val=='' || $val==null){
         return redirect('/utilisateur');
        }else{
        // $search = request()->input('recherche');
         $utilisateurs = Utilisateur::where('nom','like','%'.$val.'%')->paginate(6);
        return view('index',compact('utilisateurs','succesAdd','succesEdit'));
        }
    }
}
