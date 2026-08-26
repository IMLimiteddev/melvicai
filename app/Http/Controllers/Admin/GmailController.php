<?php

namespace App\Http\Controllers\Admin;

use Google\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GmailController extends Controller
{
    public function connect()
    {
        $client = new Client();

        $client->setClientId(
            config('services.gmail.client_id')
        );

        $client->setClientSecret(
            config('services.gmail.client_secret')
        );

        $client->setRedirectUri(
            config('services.gmail.redirect')
        );

        // Permission to read and modify Gmail messages.
        $client->setScopes([
            'https://www.googleapis.com/auth/gmail.modify'
        ]);

        // Ask Google to return a refresh token.
        $client->setAccessType('offline');

        // Ask for consent so Google shows the permission screen.
        $client->setPrompt('consent');

        return redirect()->away(
            $client->createAuthUrl()
        );
    }

    public function callback(Request $request)
    {
        if (!$request->has('code')) {
            return response()->json([
                'message' => 'Google authorization failed.',
                'error' => $request->get('error'),
            ], 400);
        }

        $client = new Client();

        $client->setClientId(
            config('services.gmail.client_id')
        );

        $client->setClientSecret(
            config('services.gmail.client_secret')
        );

        $client->setRedirectUri(
            config('services.gmail.redirect')
        );

        $client->setScopes([
            'https://www.googleapis.com/auth/gmail.modify'
        ]);

        $token = $client->fetchAccessTokenWithAuthCode(
            $request->code
        );

        if (isset($token['error'])) {
            return response()->json([
                'message' => 'Unable to get Gmail access token.',
                'error' => $token,
            ], 400);
        }

        // For the first test, temporarily save the token.
        file_put_contents(
            storage_path('app/google/gmail-token.json'),
            json_encode($token, JSON_PRETTY_PRINT)
        );

        return response()->json([
            'message' => 'Gmail connected successfully.',
        ]);
    }
}
