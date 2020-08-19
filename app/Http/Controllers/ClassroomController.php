<?php

namespace App\Http\Controllers;

use App\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function GetClassroom()
    {
        if (request()->has("classname") == true){
            return $this->ResponseBody(Classroom::where("classname", request()->classname)->first());
        }
        else if (request()->has("classroom_id") == true){
            return $this->ResponseBody(Classroom::where("id", request()->classroom_id)->first());
        }
        return $this->ResponseBody(Classroom::get());
    }

    public function GetClassroomStudentroomAndStudent()
    {
        $result = Classroom::get();
        foreach ($result as $key => $value) {
            foreach ($value->studentroom as $keyroom => $valueroom) {
                $valueroom->student;
            }
        }

        return $this->ResponseBody($result);
        
    }

    public function SearchClassroomSoGetListStudentroom()
    {
        if (request()->has("classname") == false){
            return $this->ResponseMsgError("Please input name class", 400);
        }

        $searchClassroom = Classroom::where("classname", request()->classname)->first();
        if (request()->has("isnotShow_list_studentroom") == true){
            return $this->ResponseBody($searchClassroom);
        }
        
        $listStudentroom = $searchClassroom->studentroom;
        if (request()->has("studentroom") == true){
            return $this->ResponseBody($listStudentroom->where("room", request()->studentroom));
        }
        return $this->ResponseBody($listStudentroom);
    }

    public function CreateClassroom()
    {
        if (request()->has("classname") == false){
            return $this->ResponseMsgError("Please input name class", 400);
        }

        if (request()->classname == null || request()->classname == ""){
            return $this->ResponseMsgError("Please input name class", 400);
        }
        
        Classroom::create([
            "classname" => request()->classname
        ]);

        return $this->ResponseBody(["message" => "Create Success"], 201, true);

    }

    public function UpdateClassroom($id)
    {
        if (request()->has(["classname"]) == false){
            return $this->ResponseMsgError("Please input name class", 400);
        }
        if ($id == null){
            return $this->ResponseMsgError("Please input id classroom", 400);
        }

        $classroom_item = Classroom::where('id', $id);
        $classroom_item->update([
            "classname" => request()->classname
        ]);
        
        return $this->ResponseBody($classroom_item->first());
        
    }

    public function DeleteClassroom($id)
    {
        if ($id == null){
            return $this->ResponseMsgError("Please input id classroom", 400);
        }
        Classroom::where("id", $id)->delete();
        return $this->ResponseBody("", 204, true);
        
    }
    
}
