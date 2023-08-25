<?php
namespace App\Repositories\Interfaces;
/**
 * 
 */
Interface TaskRepositoryInterface
{
	
	public function allTask();
	public function storeTask($data);
	public function findTask($id);
	public function updateTask($data,$id);
	public function destroyTask($id);
	
}
?>