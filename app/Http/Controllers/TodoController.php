<?php

namespace App\Http\Controllers;

/**
 * Description of TodoController
 *
 * @author james

 */
use App\Http\Controllers\ApiController;
use App\Transformers\TodoTransformer;
use Illuminate\Http\Request;
use App\Models\Todo;
use Auth;

class TodoController  extends ApiController{
    
    public function __construct() {
        $this->middleware('auth');
    }
    

    public function index()
    {
        $todos = Todo::all();
        return $this->collection($todos, new TodoTransformer());
    }
    
    public function store(Request $request)
    {
        $this->validate($request, 
                ['todo'=>'required', 'category'=>'required', 'description'=>'required']);
        if(Auth::User()->todo()->Create($request->all())){
            return response()->json(['status'=>'>success']);
        }
        else{
            return response()->json(['status'=>'>fail']);
        }
    }
    
    function show($id)
    {
        $todo = Todo::find($id);
        return response()->json($todo);
    }
    
    function update(Request $request, $id)
    {
        $this->validate($request, 
                ['todo'=>'required', 'category'=>'required', 'description'=>'required']);
        $todo = Todo::find($id);
        if($todo->fill($request->all())->save())
        {
            return response()->json(['status'=>'success']);
        }
        else
        {
            return response()->json(['status'=>'fail']);
        }
    }
    
    function destroy($id)
    {
        if(Todo::destroy($id))
        {
            return response()->json(['status'=>'success']);
        }
    }
}
