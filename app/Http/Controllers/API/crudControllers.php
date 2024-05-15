<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\crud;

class crudControllers extends Controller
{
    public function get(){
        try{
            $data=crud::get();
            return response()->json($data,200);
        }catch(\Throwable $t)
        {
         return response()->json(['error'=> $t->getMessage()],500);
        }
    }
    public function create(Request $re){
        try{
            $data['nom']=$re['nom'];
            $data['prenom']=$re['prenom'];
            $data['email']=$re['email'];
            $res=crud::create($data);
            return response()->json($res,200);
        }catch(\Throwable $t)
        {
         return response()->json(['error'=> $t->getMessage()],500);
        }
    
    }
    public function getById($id){
        try{
            $data=crud::find($id);
            return response()->json($data,200);
        }catch(\Throwable $t)
        {
         return response()->json(['error'=> $t->getMessage()],500);
        }
    
    }
    public function update(Request $re,$id){
        try{
            $data['nom']=$re['nom'];
            $data['prenom']=$re['prenom'];
            $data['email']=$re['email'];
            crud::find($id)->update($data);
           $res=crud::find($id);
            return response()->json($res,200);
        }catch(\Throwable $t)
        {
         return response()->json(['error'=> $t->getMessage()],500);
        }
    
    }
    public function delete($id){
        try{
           $res=crud::find($id)->delete();
            return response()->json(['delete'=> $res],200);
        }catch(\Throwable $t)
        {
         return response()->json(['error'=> $t->getMessage()],500);
        }
    
    }

 }
 
