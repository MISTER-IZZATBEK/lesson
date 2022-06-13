<?php

namespace App\Http\Controllers;

use App\Models\Teacher;


class TeacherController extends Controller
{

    use AbstractControllerTrait;

    protected $folderName='Teachers';
    protected $modelClass=Teacher::class;
    protected $routeName='teachers';
    protected $validationRules;

    public function __construct()
    {
        $this->validationRules=[
            'first_name' => 'required',
            'birthday' => 'required',
            'specialty' => 'required',
        ];
    }
}
