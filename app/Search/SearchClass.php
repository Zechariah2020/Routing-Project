<?php

namespace App\Search;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SearchClass
{
    public function getById($id)
    {
        try {
            $result = Classroom::where('id', $id)->firstOrFail();
        } catch (ModelNotFoundException) {
            abort(404);
        }
        return $result;
    }
}
