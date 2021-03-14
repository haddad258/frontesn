<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class StudentController extends Controller
{
    public function storeStudent(Request $request){
        $payLoad = $request->all();
        try{
            $student = Student::where('email', '=',$payLoad['email'])->first();
            if ($student === null) {
                Student::create([
                    "first_name"=>$payLoad['first_name'],
                    "last_name"=>$payLoad['last_name'],
                    "email"=>$payLoad['email'],
                    "phone"=>$payLoad['phone']
                ]);

                return response(['code'=>'success'],200);
            }else{
                return response(['code'=>'fails','error_message'=>'Already existing student with the same email!'],409);
            }

        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }

    public function indexStudents(){
        try{
            $students= Student::all();
            return response(['code'=>'success','content'=>$students],200);
        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }

    public function getStudent($id){
        try{
            $student= Student::find($id);
            if($student){
                return response(['code'=>'success','content'=>$student],200);
            }else{
                return response(['code'=>'fails','error_message'=>'Student not found!'],400);
            }
        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }

    public function editStudent($id,Request $request){
        $payLoad = $request->all();
        try{
            $student= Student::find($id);
            if($student){
                $student_exist = Student::where('email', '=',$payLoad['email'])->where('student_id','!=',$id)->first();
                if ($student_exist === null) {
                    $student->update(
                        array( "first_name"=>$payLoad['first_name'],
                                "last_name"=>$payLoad['last_name'],
                                "email"=>$payLoad['email'],
                                "phone"=>$payLoad['phone']
                            ));
                    return response(['code'=>'success'],200);
                }else{
                    return response(['code'=>'fails','error_message'=>'Already existing student with the same email!'],409);
                }
            }else{
                return response(['code'=>'fails','error_message'=>'Student not found!'],400);
            }
        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }

    public function deleteStudent($id){
        try{
            $student= Student::find($id);
            if($student){
                $student->delete();
                return response(['code'=>'success'],200);
            }else{
                return response(['code'=>'fails','error_message'=>'Student not found!'],400);
            }
        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }

}
