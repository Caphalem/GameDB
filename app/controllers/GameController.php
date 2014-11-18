<?php

class GameController extends \BaseController {
//    public function showGameInfo($id) {
//        $game = Game::find($id);
//        $fav = -1;
//        if (Auth::check()) {
//            $user = Auth::user()->id;
//            $fav = DB::table('games')
//                ->join('favorite_games', 'games.id', '=', 'favorite_games.game_id')
//                ->join('users', 'users.id', '=', 'favorite_games.user_id')
//                ->where('users.id', '=', $user)
//                ->where('games.id', '=', $id)
//                ->select('games.id')
//                ->count();
//        }
//        return View::make('game.show')->with('game', $game)->with('fav', $fav);
//    }

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
        return View::make('game.create');
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
        $game->publisher_id = Input::get('publisher_id');
        $game->developer_id = Input::get('developer_id');
        $game->minimal_requirements_id = Input::get('minimal_requirements_id');
        $game->recomended_requirements_id = Input::get('recommended_requirements_id');


        $game->box_art = 'uploads/' . Input::file('box_art')->getClientOriginalName();
        //$boxart = Input::file('box_art');
        //$filename = $boxart->GetClientOriginalName();

        //$path = public_path('public/img/'.$filename);
        //Image::make($boxart->getRealPath())->resize(200, 200)->save($path);
       // $game->box_art = 'public/img/'.$filename;

        $game->save();

        return Redirect::to('game.index');
        //publisher
        //developer
        //minimal requirements
        //recommended requirements
        //YYYY-MM-DD
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function show($id)
    {
        $game = Game::find($id);
        $fav = -1;
// Get all reviews that are not spam for the product and paginate them
        $reviews = $game->reviews()->with('user')->orderBy('created_at','desc')->paginate(10);
        return View::make('game.show', array('game'=> $game,'reviews'=>$reviews,'fav'=>$fav));
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
