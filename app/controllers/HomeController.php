<?php
class HomeController extends BaseController {
    public function home() {
		return View::make('home');
	}

    public function postResults()

    {

        $query=Input::get('query');
        $games = Game::where('title', 'LIKE', '%'.$query.'%')->get();
        $t = 0;
        $r = 0;
        $p = 0;

        return View::make('results')->with('games', $games)->with('query', $query)->with('t', $t)->with('r', $r)
            ->with('p', $p);
    }

    public function orderByTitle()

    {
        $r = 0;
        $p = 0;
        $t = Input::get('t');
        $query=Input::get('query');
        if ($t == 0) {
            $games = Game::where('title', 'LIKE', '%' . $query . '%')->orderBy('title', 'ASC')->get();
            $t = 1;
        }
        else {
            $games = Game::where('title', 'LIKE', '%' . $query . '%')->orderBy('title', 'DESC')->get();
            $t = 0;
        }

        return View::make('results')->with('games', $games)->with('query', $query)->with('t', $t)->with('r', $r)
            ->with('p', $p);
    }

    public function orderByRelease()

    {
        $t = 0;
        $r = Input::get('r');
        $p = 0;

        $query=Input::get('query');
        if ($r == 0) {
            $games = Game::where('title', 'LIKE', '%' . $query . '%')->orderBy('release_date', 'ASC')->get();
            $r = 1;
        }
        else {
            $games = Game::where('title', 'LIKE', '%' . $query . '%')->orderBy('release_date', 'DESC')->get();
            $r = 0;
        }

        return View::make('results')->with('games', $games)->with('query', $query)->with('t', $t)->with('r', $r)
            ->with('p', $p);
    }

//    public function orderByPublisher()
//
//    {
//        $query=Input::get('query');
//        $t = 0;
//        $r = 0;
//        $p = Input::get('p');
//        if ($p == 0) {
//            $games = Game::where('games.title', 'LIKE', '%' . $query . '%')->join('publisher', 'games.publisher_id', '=', 'publisher.id')
//            ->orderBy('publisher.title', 'AS', 'publisher_title', 'ASC')->get();
//            $p = 1;
//        }
//        else {
//            $games = Game::where('games.title', 'LIKE', '%' . $query . '%')->join('publisher', 'games.publisher_id', '=', 'publisher.id')
//                ->orderBy('publisher.title', 'AS', 'publisher_title', 'DESC')->get();
//            $p = 0;
//        }
//
//        return View::make('results')->with('games', $games)->with('query', $query)->with('t', $t)->with('r', $r)
//            ->with('p', $p);
//    }
}
