<?php

class GameController extends \BaseController {
    public function showGameInfo($id) {
        $game = Game::find($id);
        $reviews = $game->reviews()->with('user')->orderBy('created_at','desc')->paginate(10);
        $fav = -1;
        if (Auth::check()) {
            $user = Auth::user()->id;
            $fav = DB::table('games')
                ->join('favorite_games', 'games.id', '=', 'favorite_games.game_id')
                ->join('users', 'users.id', '=', 'favorite_games.user_id')
                ->where('users.id', '=', $user)
                ->where('games.id', '=', $id)
                ->select('games.id')
                ->count();
        }
        return View::make('game.show')->with('game', $game)->with('fav', $fav)->with('reviews', $reviews);
    }

    public function addGameToList($user, $game) {
        $g = Game::find($game);
        $u = User::find($user);
        FavoriteGame::create(array(
            'game_id' => $g->id,
            'user_id' => $u->id
        ));
        return Redirect::route('game-show', $game);
    }

    public function removeGameFromList($user, $game) {
        $g = Game::find($game);
        $u = User::find($user);
        $fg = FavoriteGame::where('user_id', '=', $u->id)->where('game_id', '=', $g->id);
        $fg->delete();
        return Redirect::route('game-show', $game);
    }

    public function removeFav($user, $game) {
        $g = Game::find($game);
        $u = User::find($user);
        $fg = FavoriteGame::where('user_id', '=', $u->id)->where('game_id', '=', $g->id);
        $fg->delete();
        return Redirect::route('favorite', $game);
    }
    public function editGameInfo($id) {
        $game = Game::find($id);
        $publishers = Publisher::all();
        $developers = Developer::all();
        $requirements = Requirements::all();
        return View::make('game.edit')
            ->with('game', $game)
            ->with('publishers', $publishers)
            ->with('developers', $developers)
            ->with('requirements', $requirements);
    }

    public function postEditGameInfo($id) {
        $validator = Validator::make(Input::all(),
            array(
                'title' => 'required',
                'publisher' => 'required',
                'developer' => 'required',
                'min' => 'required',
                'rec' => 'required',
                'metacritic_score' => 'required|min:1|max:10',
                'release_date' => 'required',
                'link_to_metacritic' => 'required',
                'description' => 'required'
            )
        );
        if($validator->fails()){
            return Redirect::route('game-edit', $id)
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $game = Game::find($id);
            $game->title = Input::get('title');
            $game->publisher_id = Input::get('publisher');
            $game->developer_id = Input::get('developer');
            $game->minimal_requirements_id = Input::get('min');
            $game->recomended_requirements_id = Input::get('rec');
            $game->metacritic_score = Input::get('metacritic_score');
            $game->release_date = Input::get('release_date');
            $game->link_to_metacritic = Input::get('link_to_metacritic');
            $game->description = Input::get('description');

            if($game->save()){
                return Redirect::route('game-show', $id)
                    ->with('global','Game information was successfully updated');
            }
        }
    }

    public function favorite() {
        $games = DB::table('games')
            ->join('favorite_games', 'games.id', '=', 'favorite_games.game_id')
            ->join('users', 'users.id', '=', 'favorite_games.user_id')
            ->where('users.id', '=', Auth::user()->id)
            ->select('games.id', 'games.title')
            ->get();
        return View::make('game.favorite')->with('games', $games);
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('game.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $developers = Developer::lists('title', 'id');
        $publishers = Publisher::lists('title', 'id');
        $requirements = Requirements::select(DB::raw
        ('concat (os," ",cpu," ",system_RAM," ",graphics_card," ",graphics_memory," ",hard_drive_space) as full_req,id'))
            ->lists('full_req', 'id');
        //$requirements = Requirements::lists('os', 'cpu', 'system_RAM', 'graphics_card', 'graphics_memory',
        //                                    'hard_drive_space', 'id');
        return View::make('game.create')->with('developers', $developers)->with('publishers', $publishers)
                                        ->with('requirements', $requirements);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $game = new Game;
        $game->title = Input::get('title');

        $day = Input::get('day');
        $month = Input::get('month');
        $year = Input::get('year');
        $date = array($year, $month, $day);
        $rdate = implode('-', $date);
        $game->release_date = $rdate;

        $game->link_to_metacritic = Input::get('metacritic_link');
        $game->description = Input::get('description');
        $game->publisher_id = Input::get('publishers');
        $game->developer_id = Input::get('developers');
        $game->minimal_requirements_id = Input::get('min_requirements');
        $game->recomended_requirements_id = Input::get('rec_requirements');

        $file = Input::file('box_art');
        $destinationPath = 'images/box_art';
        $filename = $file->getClientOriginalName();
        $game->box_art = $filename;
        Input::file('box_art')->move($destinationPath, $filename);

        $game->save();

        return Redirect::to('game/index');
        //publisher
        //developer
        //minimal requirements
        //recommended requirements
        //YYYY-MM-DD
	}

    public function handleShow($id)
    {
        $input = array(
            'content' => Input::get('content'),
            'rating' => Input::get('rating')
        );
// instantiate Rating model
        $review = new Review;
// Validate that the user's input corresponds to the rules specified in the review model
        $validator = Validator::make( $input, $review->getCreateRules());
// If input passes validation - store the review in DB, otherwise return to product page with error message
        if ($validator->passes()) {
            $review->storeReviewForGame($id, $input['content'], $input['rating']);
            return Redirect::to('game/show/'.$id.'#reviews-anchor')->with('review_posted',true);
        }
        return Redirect::to('game/show/'.$id.'#reviews-anchor')->withErrors($validator)->withInput();
    }


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function missingMethod($parameters = array())
    {
        //
    }

}
