<?php
class HomeController extends BaseController {
    public function home() {
		return View::make('home');
	}

    public function postResults()

    {
        $query=Input::get('query');
        $games = Game::where('title', 'LIKE', '%'.$query.'%')->get();

        return View::make('results')->with('games', $games);
    }


}
