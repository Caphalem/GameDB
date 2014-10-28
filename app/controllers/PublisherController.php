<?php

/**
 * Created by PhpStorm.
 * User: Mantas
 * Date: 28/10/14
 * Time: 12:52
 */
class PublisherController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $publishers = Publisher::all();
        return View::make('publisher/index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // Show the create publisher form.
        return View::make('publisher/create');
    }

    public function handleCreate()
    {
        // Handle create form submission.
        $publisher = new Publisher;
        $publisher->title = Input::get('title');
        $publisher->description = Input::get('description');
        $publisher->save();
        return Redirect::action('PublisherController@index');
    }

    public function edit(Publisher $publisher)
    {
        // Show the edit form.
        return View::make('publisher/edit', compact('publisher'));
    }

    public function handleEdit()
    {
        // Handle edit form submission.
        $publisher = Publisher::findOrFail(Input::get('id'));
        $publisher->title = Input::get('title');
        $publisher->description = Input::get('description');
        $publisher->save();
        return Redirect::action('PublisherController@index');
    }

    public function delete(Publisher $publisher)
    {
        // Show delete confirmation page.
        return View::make('publisher/delete', compact('publisher'));
    }

    public function handleDelete()
    {
        // Handle the delete confirmation.
        $id = Input::get('publisher');
        $publisher = Publisher::findOrFail($id);
        $publisher->delete();
        return Redirect::action('PublisherController@index');
    }
}