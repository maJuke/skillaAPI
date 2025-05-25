<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Passport\Token;
use Laravel\Passport\RefreshToken;
use Illuminate\Database\Eloquent\Collection;

class AuthService {

    protected RefreshToken $refreshToken;

    /**
     * Give token to user when logged in by userId
     * @param int $userId
     * @return array{access_token: string, expires_at: mixed}
     */
    public function giveTokenByUserId(int $userId): array {
        $user = User::find($userId);

        if (!$user) {
            throw ValidationException::withMessages([
                'user_id' => ['User not found']
            ]);
        }

        $token = $user->createToken('access_token');

        return [
            'access_token' => $token->accessToken,
            'expires_at' => $token->token->expires_at,
        ];
    }

    /**
     * Take away token when logged out
     * @return array{message: string}
     */
    public function takeTokenAwayWhenLogout(): array {
        $token = Auth::user()->token();

        Token::where('id', $token->id)->update(['revoked' => true]);
        app(RefreshToken::class)->revokeRefreshTokensByAccessTokenId($token->id);
        
        return ['message' => 'Logged out successfully'];
    }

    /**
     * Summary of users sessions
     * @param \App\Models\User $user
     * @return Collection<int, Token>
     */
    public function getActiveSessions(User $user): Collection {
        return $user->tokens()->where('revoked', false)->get();
    }

    /**
     * Revoke exact session
     * @param \App\Models\User $user
     * @param int $tokenId
     * @param \Laravel\Passport\RefreshToken $refreshToken
     * @return void
     */
    public function revokeSession(User $user, int $tokenId): void {
        $token = $user->tokens()->findOrFail($tokenId);
        $token->revoke();
        $this->refreshToken->revokeRefreshTokensByAccessTokenId($token->id);
    }
}