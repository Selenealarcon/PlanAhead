<?php

namespace App\Http\Controllers;

use App\Models\Space;
use App\Models\Task;
use App\Models\User;
use File;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpaceController extends BaseController
{
  use AuthorizesRequests, ValidatesRequests;

  /**
  * List all spaces
  * @return \Illuminate\Contracts\View\View 
  */
  function list()
  {
    $userId = auth()->user()->id;

    $spaces = Space::getSpaces($userId);

    return view('space.list', ['spaces' => $spaces]);
  }

  /**
  * Create a new space
  * @param object Request instance of the request object
  * @return \Illuminate\Contracts\View\View or \Illuminate\Http\RedirectResponse
  */
  function new(Request $request)
  {
    if ($request->isMethod('post')) {

      $validate = $request->validate([
        'name' => 'required|max:50',
        'description' => 'max:250'
      ]);

      $space = new Space;
      $space->name = $validate['name'];
      $space->description = $validate['description'];

      $space->save();

      if ($request->file('photo')) {
        $file = $request->file('photo');
        $filename = $request->id . '_photo.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/photos'), $filename);
        $space->photo = $filename;
      }

      if ($request->file('wallpaper')) {
        $file = $request->file('wallpaper');
        $filename = $request->id . '_wallpaper.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/wallpapers'), $filename);
        $space->wallpaper = $filename;
      }

      $space->save();

      $space->users()->attach(auth()->user()->id, ['administrator' => true]);

      $emails = $request->input('members', []);

      foreach ($emails as $email) {
        $user = User::where('email', $email)->first();
        if ($user) {
          $space->users()->attach($user->id, ['administrator' => false]);
        }
      }

      return redirect()->route('space_list');
    }

    $members = User::all();
    $tasks = Task::all();

    return view('space.new', ['tasks' => $tasks, 'members' => $members]);
  }

  /**
  * Edit space
  * @param object Request instance of the request object
  * @param int $spaceId id of the space
  * @return \Illuminate\Http\RedirectResponse
  */
  function edit(Request $request, $spaceId)
  {

    $space = Space::find($spaceId);

    if (!$space->users()->where('space_user.user_id', Auth::id())->where('space_user.administrator', 1)->exists()) {
      return redirect()->route('space_list');
    }

    if ($request->isMethod('post')) {

      $validate = $request->validate([
        'name' => 'max:50',
        'description' => 'max:250'
      ]);

      $space->name = $validate['name'] ?? $space->name;
      $space->description = $validate['description'];

      if ($request->file('photo')) {
        $file = $request->file('photo');
        $filename = $space->id . '_photo.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/photos'), $filename);
        $space->photo = $filename;
      }

      if ($request->file('wallpaper')) {
        $file = $request->file('wallpaper');
        $filename = $space->id . '_wallpaper.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/wallpapers'), $filename);
        $space->wallpaper = $filename;
      }

      if (isset($request->deletePhoto)) {
        File::delete(public_path('images/photos/' . $space->photo));
        $space->photo = null;
      }

      if (isset($request->deleteWallpaper)) {
        File::delete(public_path('images/wallpapers/' . $space->wallpaper));
        $space->wallpaper = null;
      }

      $space->save();

      $members = $space->users()->withPivot('administrator')->get();

      foreach ($members as $member) {
        $adminStatus = $request->input('admin_status_' . $member->id);
        $space->users()->updateExistingPivot($member->id, ['administrator' => $adminStatus]);
      }

      $emails = $request->input('members', []);
      $nonExistentUsers = [];
      foreach ($emails as $email) {
        $user = User::where('email', $email)->first();
        if ($user) {
          if (!$space->users()->where('user_id', $user->id)->exists()) {
            $space->users()->attach($user->id, ['administrator' => false]);
          }
        } else {
          $nonExistentUsers[] = $email;
        }
      }
      $nonExistentUsers = array_filter($nonExistentUsers);


      if (!empty($nonExistentUsers)) {
        session()->flash('nonExistentUsers', $nonExistentUsers);
      }

      return redirect()->route('space_list');
    }

    $members = $space->users()->withPivot('administrator')->get();
    $tasks = Task::all();

    return view('space.edit', ['space' => $space, 'tasks' => $tasks, 'members' => $members]);
  }

  /**
  * Delete member of the space
  * @param int $spaceId id of the space
  * @param int $userId id of the user
  * @return \Illuminate\Http\RedirectResponse
  */
  function deleteMember($spaceId, $userId)
  {
    $space = Space::find($spaceId);
    $space->users()->detach($userId);

    return redirect()->back();
  }

  /**
  * Delete space
  * @param int $id id of the space
  * @return \Illuminate\Http\RedirectResponse
  */
  function delete($id)
  {
    $space = Space::find($id);

    File::delete(public_path('images/photos/' . $space->photo));
    $space->photo = null;

    File::delete(public_path('images/wallpapers/' . $space->wallpaper));
    $space->wallpaper = null;

    $space->delete();

    return redirect()->route('space_list');
  }

  /**
  * Change the type of the member
  * @param object Request instance of the request object
  */
  public function changeMemberType(Request $request)
  {
    $spaceId = $request->input('spaceId');
    $userId = $request->input('userId');
    $newTypeMember = $request->input('typeMember');

    $space = Space::find($spaceId);

    $space->users()->updateExistingPivot($userId, ['administrator' => ($newTypeMember == 'admin') ? 1 : 0]);

  }

  /**
  * Validate if email exist
  * @param object Request instance of the request object
  * @return \Illuminate\Http\Response
  */
  public function emailExists(Request $request)
  {
    $email = $request->input('email');
    $user = User::where('email', $email)->first();

    if ($user) {
      return response()->json(['exists' => true]);
    } else {
      return response()->json(['exists' => false]);
    }
  }
}
