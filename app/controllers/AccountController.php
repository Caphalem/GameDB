<?php
class AccountController extends BaseController {

    public function getcreate() {
        return View::make('account.create');
    }

    public function postcreate() {
        return 'Create something';
    }

}