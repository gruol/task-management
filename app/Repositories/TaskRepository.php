<?php
	namespace  App\Repositories;
	use App\Models\Task;
	use App\Repositories\Interfaces\TaskRepositoryInterface;
	use DB;
	/**
	 * 
	 */
	class TaskRepository implements TaskRepositoryInterface
	{
		
		function __construct()
		{
			# code...
		}
		public function allTask()
		{
			try {
				return Task::get();
			} catch (Exception $e) {
				
			}
		}
		public function storeTask($data)
		{
			return Task::create($data);
		}
		public function findTask($id)
		{
			try {
				return Task::find($id);
			} catch (Exception $e) {
				
			}
		}
		public function updateTask($data,$id)
		{
			DB::beginTransaction();
			try {
				$task 				= Task::where('id',$id)->first();
				$task->title 		= $data['title'];
				$task->description 	= $data['description'];
				$task->status 		= $data['status'];

				if (isset($data['api_id'])) {
					$task->api_id 		= $data['status'];
				}
				$task->update();
				DB::commit();
			} catch (Exception $e) {
				DB::rollback();
			}
		}
		public function destroyTask($id)
		{
			DB::beginTransaction();
			try {
				$task 				= Task::find($id);
				$task->delete();
				DB::commit();
			} catch (Exception $e) {
				DB::rollback();
			}
		}
	}
?>