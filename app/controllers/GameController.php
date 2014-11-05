<?php

class GameController extends BaseController {

    public function showGameInfo($id) {
        $game = Game::find($id);
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
        return View::make('game.show')->with('game', $game)->with('fav', $fav);
    }

}