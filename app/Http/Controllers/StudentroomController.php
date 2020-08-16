<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Studentroom;
use Illuminate\Http\Request;

class StudentroomController extends Controller
{
    public function GetStudentRoom()
    {
        if (request()->has("room_name") == true){
            return $this->ResponseBody(Studentroom::where("room", request()->room_name)->get());
        }
        else if (request()->has("room_id") == true){
            return $this->ResponseBody(Studentroom::where("id", request()->room_id)->first());
        }
        return $this->ResponseBody(Studentroom::get());
    }
    
    public function CreateStudentRoom()
    {
        if (request()->has(["classroom_id", "room_name"]) == false){
            return $this->ResponseMsgError("please check input classroom_id and room_name.", 400);
        }
        $checkHaveClassroom_id = Classroom::where("id", request()->classroom_id)->first();
        if ($checkHaveClassroom_id == null){
            return $this->ResponseMsgError("don't have classroom_id. please check input classroom_id.", 400);
        }

        Studentroom::create([
            "classroom_id" => request()->classroom_id,
            "room" => request()->room_name
        ]);

        return $this->ResponseBody(["message" => "Create Success"], 201, true);
        
    }

    public function UpdateStudentRoom($id)
    {
        if (request()->has(["classroom_id", "room_name"]) == false){
            return $this->ResponseMsgError("please check input classroom_id and room_name.", 400);
        }
        if ($id == null){
            return $this->ResponseMsgError("Please input id studentroom", 400);
        }
        $checkHaveClassroom_id = Classroom::where("id", request()->classroom_id)->first();
        if ($checkHaveClassroom_id == null){
            return $this->ResponseMsgError("don't have classroom_id. please check input classroom_id.", 400);
        }

        $studentroom_item = Studentroom::where("id", $id);
        $studentroom_item->update([
            "classroom_id" => request()->classroom_id,
            "room" => request()->room_name
        ]);

        return $this->ResponseBody($studentroom_item->first());

    }

    public function DeleteStudentRoom($id)
    {
        if ($id == null){
            return $this->ResponseMsgError("Please input id studentroom", 400);
        }
        Studentroom::where("id", $id)->delete();
        return $this->ResponseBody([], 204);
    }
    
}
