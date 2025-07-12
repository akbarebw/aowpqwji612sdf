<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Stevenmaguire\OAuth2\Client\Provider\Keycloak;

class KeycloakLoginController extends Controller
{
    protected $provider;

    public function __construct()
    {
        $this->provider = new Keycloak([
            'authServerUrl' => config('services.keycloak.base_url'),
            'realm' => config('services.keycloak.realm'),
            'clientId' => config('services.keycloak.client_id'),
            'clientSecret' => config('services.keycloak.client_secret'),
            'redirectUri' => config('services.keycloak.redirect'),
            'scope' => 'profile email openid'
        ]);
    }

    public function redirectToKeycloak()
    {
        // Generate the authorization URL and redirect the user
        $authorizationUrl = $this->provider->getAuthorizationUrl([
            'scope' => 'profile email openid',
            'prompt' => 'login'  // Forces Keycloak to ask for login again
        ]);

        session(['oauth2state' => $this->provider->getState()]);

        return redirect()->away($authorizationUrl);
    }

    public function handleKeycloakCallback(Request $request)
    {
        // Verify the state to prevent CSRF attacks

        // dd($request->all());
        $state = $request->get('state');
        if (empty($state) || $state !== session('oauth2state')) {
            session()->forget('oauth2state');
            return redirect('/login')->withErrors(['error' => 'Invalid state']);
        }

        // try {
        // Get the access token using the authorization code
        $token = $this->provider->getAccessToken('authorization_code', [
            'code' => $request->input('code')
        ]);

        // Retrieve user details from Keycloak
        $user = $this->provider->getResourceOwner($token);
        $userDetails = $user->toArray();

        // Find or create a user in your database
        $existingUser = User::where('email', $userDetails['email'])->first();

        if (!$existingUser) {
            $existingUser = User::create([
                'id' => $userDetails['sub'],
                // 'credentials' => $userDetails['upn'],
                'name' => $userDetails['name'],
                'email' => $userDetails['email'],
                // 'username' => $userDetails['name'], // Use preferred_username as username
                'password' => bcrypt('12345'), // No password needed for SSO

                // Add other fields as needed
            ]);

            // set role Mahasiswa
            // $existingUser->assignRole('mahasiswa');
        }

        // Store Keycloak tokens in session
        session([
            'keycloak_token' => [
                'access_token' => $token->getToken(),
                'refresh_token' => $token->getRefreshToken(),
                'id_token' => $token->getValues()['id_token'] // Store the ID Token
            ]
        ]);

        // Log the user in
        Auth::login($existingUser, true);

        // Auth::loginUsingId($existingUser->id);
        // return redirect()->intended('/dashboard')->with('login_success', true);
        // Cek role dan arahkan ke halaman sesuai
        if ($existingUser->hasRole('dosen')) {
            return redirect()->route('dosen.penilaian'); // ini route Livewire dosen
        } elseif ($existingUser->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        // Default fallback
        return redirect('/dashboard')->with('login_success', true);


        // } catch (\Exception $e) {
        //     return redirect('/dashboard')->withErrors(['error' => 'Authentication failed: ' . $e->getMessage()]);
        // }
    }

    public function logout(Request $request)
    {
        $keycloakLogoutUrl = config('services.keycloak.base_url')
            . '/realms/' . config('services.keycloak.realm')
            . '/protocol/openid-connect/logout';

        $idToken = session('keycloak_token')['id_token'] ?? null;

        $logoutUrl = $keycloakLogoutUrl
            . '?post_logout_redirect_uri=' . urlencode(route('login'))
            . '&client_id=' . config('services.keycloak.client_id');

        if ($idToken) {
            $logoutUrl .= '&id_token_hint=' . $idToken;
        }

        // Bersihkan session Laravel
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session()->forget('keycloak_token');

        return redirect()->away($logoutUrl);
    }
}
