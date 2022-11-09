<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class StudentController extends Controller
{
    function show($id)
    {
        $result = Classroom::find($id);
        if ($result) {
            echo $result->name . " class is taken by the students below:\n";
            return $result->students;
        } else {
            return "There's no such classroom in the database.";
        }
    }
}
