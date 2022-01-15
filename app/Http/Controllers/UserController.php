<?php

namespace App\Http\Controllers;
Use Alert;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Image;
use App\Printer;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id')->get();
        if (session('success_message')) {
            Alert::success('Fantastico!', session('success_message'));
        }

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = User::create($request->all());

        $imageName = $user->id . '.' . 
        $request->file('image')->getClientOriginalExtension();

        $request->file('image')->move(
            base_path() . 'public/uploads/avatars/', $imageName
        );
        

        return redirect()->route('users.edit', $user->id)
            ->withSuccessMessage('Creaste el Usuario Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get();

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        if($request->hasFile('profile_image')){
            $avatar = $request->file('profile_image');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/images/' . $filename) );

            
            $user->profile_image = '/uploads/images/' . $filename;
            $user->save();
        }

        if($request->hasFile('firma')){
            $firma = $request->file('firma');
            $firmaname = time() . '.' . $firma->getClientOriginalExtension();
            Image::make($firma)->resize(300, 300)->save( public_path('/uploads/firmas/' . $firmaname) );

            
            $user->firma = $firmaname;
            $user->save();
        }


        $user->roles()->sync($request->get('roles'));

        

        return redirect()->route('users.index')
            ->withSuccessMessage('Actualizaste el Usuario Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->withSuccessMessage('Eliminaste el Usuario Correctamente');
    }

    public function update_avatar(Request $request){

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

    }
    public function exportPdf()
    {   
        $users = User::get();
        $pdf = PDF::loadView('pdf.users', compact('users'));
        return $pdf->download('user-list.pdf');
    }
}
