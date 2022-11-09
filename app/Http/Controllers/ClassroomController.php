<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class ClassroomController extends Controller
{
    function show($id)
    {
        $result = Student::find($id);
        if ($result) {
            echo $result->first_name . " " . $result->last_name . " has the classes below:\n";
            return $result->classrooms;
        } else {
            return "There's no such student in the database.";
        }
    }
}
