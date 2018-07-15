<?php

namespace App\Http\Controllers\Auth;

use App\Services\UserRepository;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubLoginController extends LoginController
{
    private $userRepository;

    /**
     * GithubLoginController constructor.
     * @param UserRepository $userRepository\
     */
    public function __construct(UserRepository $userRepository)
    {
        parent::__construct();

        $this->userRepository = $userRepository;
    }
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback()
    {
        $githubUser = Socialite::driver('github')->user();
        $user = $this->userRepository->firstOrCreateByEmail($githubUser);
        Auth::login($user);
        return redirect($this->redirectTo);
    }
}
