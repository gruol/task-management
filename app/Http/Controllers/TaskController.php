<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use  GuzzleHttp\Client;
use App\Models\Task;
use DB;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $TaskRepository;
    public function   __construct(TaskRepositoryInterface $TaskRepository){ // injectng interface in controller constructor
        $this->taskRepository = $TaskRepository;
    }

    public function index()
    {
        $tasks = $this->taskRepository->allTask();
        return view('tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request)
    {
        try {
            $validated = $request->validated(); // validate data  
            $this->taskRepository->storeTask($validated );
            return redirect()->route('tasks.index')->with('success','Task Created Successfully.');
        } catch (Exception $e) {

        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {

     $task =  $this->taskRepository->findTask($id );
     return view('tasks.show',compact('task'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
     $task =  $this->taskRepository->findTask($id );
     return view('tasks.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request,$id)
    {
        $validated = $request->validated(); // validate data  
        $this->taskRepository->updateTask($validated ,$id);
        return redirect()->route('tasks.index')->with('success','Task Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $this->taskRepository->destroyTask($id);
        return redirect()->route('tasks.index')->with('success','Task Deleted Successfully.');
    }
    // public function test()
    // {
   //      DB::beginTransaction();
   //      try {
   //          $client     = new  Client();
   //          $responce   = $client->get(env('APIURL')); 
   //          $status     = $responce->getStatusCode();
   //          $tasks      = json_decode($responce->getBody(),true);

   //          if ($status == 200) { // check api responce status
   //              if (count($tasks)) {
   //                 foreach ($tasks as $key => $task) {
   //                     $task = Task::updateOrCreate([
   //                      'api_id' => $task['id']
   //                  ], [
   //                      'title' => substr($task['title'], 0,10), // i am consider title first 10 char as a title 
   //                      'description' => $task['title'], // i am consider title  as a description 
   //                      'status' => ($task['completed'] == true ? "completed" : "pending"),
   //                  ]);
   //                 }
   //             }
   //         }
   //         DB::commit();
   //     } catch (Exception $e) {


   //     }
   // }
}
