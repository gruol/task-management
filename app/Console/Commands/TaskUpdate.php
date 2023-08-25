<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use  GuzzleHttp\Client;
use App\Models\Task;
use DB;
class TaskUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command For Synchronize tasks periodically (every 5 minutes) by checking for new tasks in the API and updating existing ones based on their status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::beginTransaction();
        try {
            $client     = new  Client();
            $responce   = $client->get(env('APIURL'), ['verify' => false]);
            $status     = $responce->getStatusCode();
            $tasks      = json_decode($responce->getBody(),true);
            
            if ($status == 200) {
                if (count($tasks)) {
                   foreach ($tasks as $key => $task) {
                       $task = Task::updateOrCreate([
                        'api_id' => $task['id']
                    ], [
                        'title' => substr($task['title'], 0,10),
                        'description' => $task['title'],
                        'status' => ($task['completed'] == true ? "completed" : "pending"),
                    ]);
                   }
               }
           }
           DB::commit();
       } catch (Exception $e) {
        

       }
   }
}
