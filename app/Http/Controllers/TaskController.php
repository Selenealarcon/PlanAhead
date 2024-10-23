<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Space;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class TaskController extends BaseController
{
  use AuthorizesRequests, ValidatesRequests;

  /**
  * List tasks from space
  * @param int $spaceId id of space
  * @return \Illuminate\Contracts\View\View
  */
  function list($spaceId)
  {
    $tasks = Task::with('users')->where('space_id', $spaceId)->get();
    $space = Space::find($spaceId);

    $members = $space->getMembersSpace($spaceId);

    return view('task.list', ['tasks' => $tasks, 'space' => $space, 'members' => $members]);
  }

  /**
  * Create new task
  * @param object Request instance of the request object
  * @param int $spaceId id of the space
  * @return \Illuminate\Contracts\View\View or \Illuminate\Http\RedirectResponse
  */
  function new(Request $request, $spaceId)
  {
    $space = Space::find($spaceId);

    if ($request->isMethod('post')) {

      $validate = $request->validate([
        'name' => 'required|max:50',
        'description' => 'max:250'
      ]);

      $task = new Task;
      $task->name = $validate['name'];
      $task->description = $validate['description'];
      $task->type = $request->type;
      $task->date = $request->date;
      $task->status = "To be done";
      $task->space_id = $space->id;

      $task->save();

      $task->users()->attach(auth()->user()->id);

      $task->users()->sync($request->members);

      if ($request->has('items')) {
        foreach ($request->items as $itemName) {
          if (!empty($itemName)) {
            $item = new Item;
            $item->name = $itemName;
            $item->task_id = $task->id;
            $item->save();
            $task->items()->attach($item->id);
          }
        }
      }

      return redirect()->route('space', ['id' => $space->id]);
    }

    $items = Item::all();
    $members = $space->getMembersSpace($spaceId);

    return view('task.new', ['items' => $items, 'members' => $members, 'space' => $space]);
  }

  /**
  * Edit task
  * @param object Request instance of the request object
  * @param int $space_id id of the space
  * @param int $task_id id of the task
  * @return \Illuminate\Contracts\View\View or \Illuminate\Http\RedirectResponse
  */
  public function edit(Request $request, $space_id, $task_id)
  {
    $task = Task::find($task_id);
    $space = Space::find($space_id);

    $items = Item::where('task_id', $task->id)->get();

    if ($request->isMethod('post')) {

      if($request->name && $request->description){
        $validate = $request->validate([
          'name' => 'required|max:50',
          'description' => 'max:250'
        ]);
        $task->name = $validate['name'];
        $task->description = $validate['description'];
      }

      $task->type = $request->type ?? $task->type;
      $task->date = $request->date ?? $task->date;
      $task->status = $request->status ?? $task->status;
      $task->space_id = $space->id;

      $task->save();

      foreach ($items as $item) {
        $itemName = 'item_' . $item->id;
        $item->name = $request->$itemName ?? $item->name;
        $item->save();
      }

      $task->users()->sync($request->members ?? []);

      if ($request->has('items')) {
        foreach ($request->items as $itemName) {
          if (!empty($itemName)) {
            $item = new Item;
            $item->name = $itemName;
            $item->task_id = $task->id;
            $item->save();
            $task->items()->attach($item->id);
          }
        }
      }

      return redirect()->route('space', ['id' => $space->id]);
    }

    $members = $space->getMembersSpace($space_id);
    return view('task.edit', ['task' => $task, 'items' => $items, 'members' => $members, 'space' => $space, 'taskItems' => $items]);
  }

  /**
  * Delete task
  * @param int $space_id id of the space
  * @param int $task_id id of the task
  * @return \Illuminate\Http\RedirectResponse
  */
  function delete($space_id, $task_id)
  {
    $task = Task::find($task_id);

    if ($task->type === 'list') {
      $itemsToDelete = $task->items;
      $task->items()->detach();

      foreach ($itemsToDelete as $item) {
        $item->delete();
      }
    }

    $task->delete();

    return redirect()->route('space', ['id' => $space_id]);
  }

  /**
  * Filter tasks
  * @param object Request instance of the request object
  * @param int $spaceId id of the space
  * @return \Illuminate\Contracts\View\View 
  */
  public function filter(Request $request, $spaceId)
  {
    $status = $request->input('ftrStatus');
    $members = $request->input('ftrMember');
    $query = Task::where('space_id', $spaceId);

    if (!is_null($status)) {
      $query->whereIn('status', $status);
    }

    if (!is_null($members)) {
      $query->whereHas('users', function ($query) use ($members) {
        $query->whereIn('users.id', $members);
      });
    }

    $space = Space::find($spaceId);

    $spaceMembers = $space->users;

    return view('task.list', ['tasks' => $query->get(), 'space' => $space, 'members' => $spaceMembers]);
  }

  /**
  * Delete item from a task
  * @param int $space_id id of the space
  * @param int $task_id id of the task
  * @param int $item_id id of the item
  * @return \Illuminate\Http\RedirectResponse
  */
  function deleteItem($space_id, $task_id, $item_id)
  {

    $task = Task::find($task_id);
    $item = Item::find($item_id);

    $task->items()->detach($item_id);
    $item->delete();

    return redirect()->back();
  }
}
