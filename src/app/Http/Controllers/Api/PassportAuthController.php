<?php

namespace App\Http\Controllers\Api;

use App\Services\AuthService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PassportAuthController extends Controller {
    
    public function tokenByUserId(Request $request, AuthService $authService) {
        $validated = Validator::make($request->all(), [
            'user_id' => 'required|integer|exists:users,id',
        ])->validate();

        $data = $authService->giveTokenByUserId($validated['user_id']);
        return response()->json($data);
    }

    public function logout(Request $request, AuthService $authService) {
        $result = $authService->takeTokenAwayWhenLogout();
        return response()->json($result);
    }

    public function sessions(Request $request, AuthService $authService) {
        $user = $request->user();
        $tokens = $authService->getActiveSessions($user);

        return response()->json([
            'sessions' => $tokens
        ]);
    }

    public function revokeSession(Request $request, int $tokenId, AuthService $authService) {
        $user = $request->user();

        $authService->revokeSession($user, $tokenId);

        return response()->json(['message' => 'Session revoked successfully']);
    }
}
