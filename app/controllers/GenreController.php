<?php

/**
 * Created by PhpStorm.
 * User: Mantas
 * Date: 28/10/14
 * Time: 16:40
 */
class GenreController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $genres = Genre::all();
        return View::make('genre/index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // Show the create genre form.
        return View::make('genre/create');
    }

    public function handleCreate()
    {
        // Handle create form submission.
        $genre = new Genre;
        $genre->title = Input::get('title');
        $genre->description = Input::get('description');
        $genre->save();
        return Redirect::action('GenreController@index');
    }

    public function edit(Genre $genre)
    {
        // Show the edit form.
        return View::make('genre/edit', compact('genre'));
    }

    public function handleEdit()
    {
        // Handle edit form submission.
        $genre = Genre::findOrFail(Input::get('id'));
        $genre->title = Input::get('title');
        $genre->description = Input::get('description');
        $genre->save();
        return Redirect::action('GenreController@index');
    }

    public function delete(Genre $genre)
    {
        // Show delete confirmation page.
        return View::make('genre/delete', compact('genre'));
    }

    public function handleDelete()
    {
        // Handle the delete confirmation.
        $id = Input::get('genre');
        $genre = Genre::findOrFail($id);
        $genre->delete();
        return Redirect::action('GenreController@index');
    }
}

{

} 