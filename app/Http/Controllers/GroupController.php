<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GroupController extends Controller
{
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

    public function index()
    {
        $items= $this->modelClass::all();
        return Inertia::render($this->folderName.'/Index', compact('items'));
    }
    public function create()
    {
        return Inertia::render($this->folderName.'/Create');
    }
    public function store(Request $request)
    {
        $data=$this->validate($request, $this->validationRules);
         $this->modelClass::create($data);
        return redirect()->route($this->routeName.'.index');
    }
    public function show($id)
    {
        $item= $this->modelClass::findOrFail($id);
        return view($this->routeName.'.show', compact('item'));
    }
    public function edit($id)
    {
        $item= $this->modelClass::findOrFail($id);
        return Inertia::render($this->folderName.'/Edit', compact('item'));
    }
    public function update(Request $request, $id)
    {
        $data=$this->validate($request, $this->validationRules);
         $this->modelClass::findOrFail($id)->update($data);
        return redirect()->route($this->routeName.'.index');
    }
    public function destroy($id)
    {
        $this->modelClass::findOrFail($id)->delete();
        return redirect()->route($this->routeName.'.index');
    }

}
