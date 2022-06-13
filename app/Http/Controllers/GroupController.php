<?php

namespace App\Http\Controllers;

use App\Models\Group;

class GroupController extends Controller
{
    use AbstractControllerTrait;

    protected $folderName='Groups';
    protected $modelClass=Group::class;
    protected $routeName='groups';
    protected $validationRules;

    public function __construct()
    {
        $this->validationRules=[
            'name' => 'required',
        ];
    }
}
