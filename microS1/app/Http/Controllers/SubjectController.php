<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    public function storeSubject(Request $request){
        $payLoad = $request->all();
        try{
            Subject::create([
                "description"=>$payLoad['description'],
                "credit"=>$payLoad['credit'],
                "cooefficient"=>$payLoad['coefficient']
            ]);

            return response(['code'=>'success'],200);

        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }

    public function indexSubjects(){
        try{
            $subjects= Subject::all();
            return response(['code'=>'success','content'=>$subjects],200);
        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }

    public function getSubject($id){
        try{
            $subject= Subject::find($id);
            if($subject){
                return response(['code'=>'success','content'=>$subject],200);
            }else{
                return response(['code'=>'fails','error_message'=>'Subject not found!'],400);
            }
        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }

    public function editSubject($id,Request $request){
        $payLoad = $request->all();
        try{
            $subject= Subject::find($id);
            if($subject){
                $subject->update(
                    array( 
                        "description"=>$payLoad['description'],
                        "credit"=>$payLoad['credit'],
                        "coefficient"=>$payLoad['coefficient']
                        ));
                return response(['code'=>'success'],200);
            }else{
                return response(['code'=>'fails','error_message'=>'Subject not found!'],400);
            }
        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }

    public function deleteSubject($id){
        try{
            $subject= Subject::find($id);
            if($subject){
                $subject->delete();
                return response(['code'=>'success'],200);
            }else{
                return response(['code'=>'fails','error_message'=>'Subject not found!'],400);
            }
        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }
}
