<?php

/**
 * Created by PhpStorm.
 * User: Mantas
 * Date: 28/10/14
 * Time: 16:19
 */
class DeveloperController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $developers = Developer::all();
        return View::make('developer/index', compact('developers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // Show the create developer form.
        return View::make('developer/create');
    }

    public function handleCreate()
    {
        // Handle create form submission.
        $developer = new Developer;
        $developer->title = Input::get('title');
        $developer->description = Input::get('description');
        $developer->save();
        return Redirect::action('DeveloperController@index');
    }

    public function edit(Developer $developer)
    {
        // Show the edit form.
        return View::make('developer/edit', compact('developer'));
    }

    public function handleEdit()
    {
        // Handle edit form submission.
        $developer = Developer::findOrFail(Input::get('id'));
        $developer->title = Input::get('title');
        $developer->description = Input::get('description');
        $developer->save();
        return Redirect::action('DeveloperController@index');
    }

    public function delete(Developer $developer)
    {
        // Show delete confirmation page.
        return View::make('developer/delete', compact('developer'));
    }

    public function handleDelete()
    {
        // Handle the delete confirmation.
        $id = Input::get('developer');
        $developer = Developer::findOrFail($id);
        $developer->delete();
        return Redirect::action('DeveloperController@index');
    }
}