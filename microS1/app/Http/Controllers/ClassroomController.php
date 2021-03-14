<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class ClassroomController extends Controller
{
    public function storeClass(Request $request){
        $payLoad = $request->all();
        try{
            Classroom::create([
                "description"=>$payLoad['description']
            ]);

            return response(['code'=>'success'],200);

        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }

    public function indexClasses(){
        try{
            $classes= Classroom::all();
            return response(['code'=>'success','content'=>$classes],200);
        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }

    public function getClass($id){
        try{
            $class= Classroom::find($id);
            if($class){
                return response(['code'=>'success','content'=>$class],200);
            }else{
                return response(['code'=>'fails','error_message'=>'Classroom not found!'],400);
            }
        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }

    public function editClass($id,Request $request){
        $payLoad = $request->all();
        try{
            $class= Classroom::find($id);
            if($class){
                $class->update(
                    array( 
                        "description"=>$payLoad['description']
                        ));
                return response(['code'=>'success'],200);
            }else{
                return response(['code'=>'fails','error_message'=>'Classroom not found!'],400);
            }
        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }

    public function deleteClass($id){
        try{
            $class= Classroom::find($id);
            if($class){
                $class->delete();
                return response(['code'=>'success'],200);
            }else{
                return response(['code'=>'fails','error_message'=>'Classroom not found!'],400);
            }
        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }
}
