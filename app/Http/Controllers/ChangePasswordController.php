<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
  //
  public function index($id)
  {
    return view('mail.formchange', compact('id'));
  }
  public function changePassword(Request $request, $id)
  {
    $request->validate([
      'new_password' => ['required', 'max:12', 'min:8'],
      'confirm_password' => ['required', 'max:12', 'min:8']
    ]);
    $decodedId = base64_decode($id);
    $user = User::find($decodedId);
    //dd($user);
    if ($request->new_password == $request->confirm_password) {
      $user->password = Hash::make($request->new_password);
    } else {
      return back()->with('fail', 'erreur dans la confirmation');
    }
    return redirect('/');
  }
}
