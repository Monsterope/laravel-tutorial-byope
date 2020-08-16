<?php

namespace App\Http\Controllers;

use App\Student;
use App\Studentroom;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function GetStudent()
    {
        if (request()->has("room_id") == true){
            return $this->ResponseBody(Student::where("studentroom_id", request()->room_id)->get());
        }
        if (request()->has("student_id") == true){
            return $this->ResponseBody(Student::where("id", request()->student_id)->get());
        }
        
        return $this->ResponseBody(Student::get());

    }

    public function GetStudentByStudent()
    {
        if (request()->has("room_id") == true){
            return $this->ResponseBody(Student::where("studentroom_id", request()->room_id)->get());
        }
        if (request()->has("student_id") == true){
            return $this->ResponseBody(Student::where("id", request()->student_id)->get());
        }
        return $this->ResponseMsgError("Please input room_id or student_id", 400);
    }

    public function CreateStudent()
    {
        if (request()->has(["room_id", "firstname", "lastname", "status"]) == false){
            return $this->ResponseMsgError("Please check input", 400);
        }
        $checkHaveIdRoom = Studentroom::where('id', request()->room_id)->first();
        if ($checkHaveIdRoom == null){
            return $this->ResponseMsgError("don't have room_id. please check input room_id.", 400);
        }

        Student::create([
            "studentroom_id" => request()->room_id,
            "firstname" => request()->firstname,
            "lastname" => request()->lastname,
            "nickname" => request()->nickname,
            "status" => request()->status,
        ]);

        return $this->ResponseBody(["message" => "Create Success"], 201, true);
        
    }
    
    public function UpdateStudent($id)
    {
        if (request()->has(["room_id", "firstname", "lastname", "status"]) == false){
            return $this->ResponseMsgError("Please check input", 400);
        }
        if ($id == null){
            return $this->ResponseMsgError("Please input id student", 400);
        }
        $checkHaveIdRoom = Studentroom::where('id', request()->room_id)->first();
        if ($checkHaveIdRoom == null){
            return $this->ResponseMsgError("don't have room_id. please check input room_id.", 400);
        }

        $student_item = Student::where("id", $id);
        $student_item->update([
            "studentroom_id" => request()->room_id,
            "firstname" => request()->firstname,
            "lastname" => request()->lastname,
            "nickname" => request()->nickname,
            "status" => request()->status,
        ]);
        return $this->ResponseBody($student_item->first());

    }

    public function DeleteStudent($id)
    {
        if ($id == null){
            return $this->ResponseMsgError("Please input id student", 400);
        }
        Student::where("id", $id)->delete();
        return $this->ResponseBody([], 204);
    }
    
}
