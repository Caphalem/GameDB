<?php

/**
 * Created by PhpStorm.
 * User: Mantas
 * Date: 28/10/14
 * Time: 17:16
 */
class RequirementsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $requirements = Requirements::all();
        return View::make('requirements/index', compact('requirements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // Show the create requirement form.
        return View::make('requirements/create');
    }

    public function handleCreate()
    {
        // Handle create form submission.
        $requirement = new Requirements;
        $requirement->os = Input::get('os');
        $requirement->cpu = Input::get('cpu');
        $requirement->system_RAM = Input::get('system_RAM');
        $requirement->graphics_card = Input::get('graphics_card');
        $requirement->graphics_memory = Input::get('graphics_memory');
        $requirement->hard_drive_space = Input::get('hard_drive_space');

        $requirement->save();
        return Redirect::action('RequirementsController@index');
    }


    public function edit(Requirements $requirement)
    {
        // Show the edit form.
        return View::make('requirements/edit', compact('requirement'));
    }

    public function handleEdit()
    {
        // Handle edit form submission.
        $requirement = Requirements::findOrFail(Input::get('id'));
        $requirement->os = Input::get('os');
        $requirement->cpu = Input::get('cpu');
        $requirement->system_RAM = Input::get('system_RAM');
        $requirement->graphics_card = Input::get('graphics_card');
        $requirement->graphics_memory = Input::get('graphics_memory');
        $requirement->hard_drive_space = Input::get('hard_drive_space');
        $requirement->save();
        return Redirect::action('RequirementsController@index');
    }


    public function delete(Requirements $requirement)
    {
        // Show delete confirmation page.
        return View::make('requirements/delete', compact('requirement'));
    }

    public function handleDelete()
    {
        // Handle the delete confirmation.
        $id = Input::get('requirement');
        $requirement = Requirements::findOrFail($id);
        $requirement->delete();
        return Redirect::action('RequirementsController@index');
    }

}