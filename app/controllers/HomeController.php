<?php
class HomeController extends BaseController {
    public function home() {
		return View::make('home');
	}

    public function postResults()

    {

        $query=Input::get('query');
        $games = Game::where('title', 'LIKE', '%'.$query.'%')->get();
        $t = 2;
        $r = 2;
        $p = 2;
        $d = 2;

        return View::make('results')->with('games', $games)->with('query', $query)->with('t', $t)->with('r', $r)
            ->with('p', $p)->with('d', $d);
    }

    public function orderByTitle()

    {
        $r = 2;
        $p = 2;
        $t = Input::get('t');
        $d = 2;
        $query=Input::get('query');
        if ($t <> 1) {
            $games = Game::where('title', 'LIKE', '%' . $query . '%')->orderBy('title', 'ASC')->get();
            $t = 1;
        }
        else {
            $games = Game::where('title', 'LIKE', '%' . $query . '%')->orderBy('title', 'DESC')->get();
            $t = 0;
        }

        return View::make('results')->with('games', $games)->with('query', $query)->with('t', $t)->with('r', $r)
            ->with('p', $p)->with('d', $d);
    }

    public function orderByRelease()

    {
        $t = 2;
        $r = Input::get('r');
        $p = 2;
        $d = 2;
        $query=Input::get('query');
        if ($r <> 1) {
            $games = Game::where('title', 'LIKE', '%' . $query . '%')->orderBy('release_date', 'ASC')->get();
            $r = 1;
        }
        else {
            $games = Game::where('title', 'LIKE', '%' . $query . '%')->orderBy('release_date', 'DESC')->get();
            $r = 0;
        }

        return View::make('results')->with('games', $games)->with('query', $query)->with('t', $t)->with('r', $r)
            ->with('p', $p)->with('d', $d);
    }

    public function orderByPublisher()

    {
        $query=Input::get('query');
        $t = 2;
        $r = 2;
        $p = Input::get('p');
        $d = 2;
        if ($p <> 1) {
            $games = Game::select('games.title', 'games.publisher_id', 'games.developer_id', 'games.release_date', 'publisher.id', 'publisher.title AS pub_title')
                ->where('games.title', 'LIKE', '%' . $query . '%')->join('publisher', 'games.publisher_id', '=', 'publisher.id')
            ->orderBy('pub_title', 'ASC')->get();
            $p = 1;
        }
        else {
            $games = Game::select('games.title', 'games.publisher_id', 'games.developer_id', 'games.release_date', 'publisher.id', 'publisher.title AS pub_title')
                ->where('games.title', 'LIKE', '%' . $query . '%')->join('publisher', 'games.publisher_id', '=', 'publisher.id')
                ->orderBy('pub_title', 'DESC')->get();
            $p = 0;
        }

        return View::make('results')->with('games', $games)->with('query', $query)->with('t', $t)->with('r', $r)
            ->with('p', $p)->with('d', $d);
    }

    public function orderByDeveloper()

    {
        $query=Input::get('query');
        $t = 2;
        $r = 2;
        $p = 2;
        $d = Input::get('d');
        if ($d <> 1) {
            $games = Game::select('games.title', 'games.publisher_id', 'games.developer_id', 'games.release_date', 'developers.id', 'developers.title AS dev_title')
                ->where('games.title', 'LIKE', '%' . $query . '%')->join('developers', 'games.developer_id', '=', 'developers.id')
                ->orderBy('dev_title', 'ASC')->get();
            $d = 1;
        }
        else {
            $games = Game::select('games.title', 'games.publisher_id', 'games.developer_id', 'games.release_date', 'developers.id', 'developers.title AS dev_title')
                ->where('games.title', 'LIKE', '%' . $query . '%')->join('developers', 'games.developer_id', '=', 'developers.id')
                ->orderBy('dev_title', 'DESC')->get();
            $d = 0;
        }

        return View::make('results')->with('games', $games)->with('query', $query)->with('t', $t)->with('r', $r)
            ->with('p', $p)->with('d', $d);
    }

}
