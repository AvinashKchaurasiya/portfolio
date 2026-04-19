<?php

namespace App\Support;

use Illuminate\Support\Facades\Config;
use JsonException;

final class ProjectRef
{
    public static function encode(int $id): string
    {
        $payload = json_encode(['i' => $id], JSON_THROW_ON_ERROR);
        $mac = hash_hmac('sha256', $payload, self::signingKey(), true);

        return rtrim(strtr(base64_encode($payload."\0".$mac), '+/', '-_'), '=');
    }

    /**
     * @return int|null Project id, or null if invalid
     */
    public static function decode(string $ref): ?int
    {
        $ref = trim($ref);
        if ($ref === '') {
            return null;
        }

        if (ctype_digit($ref)) {
            return (int) $ref;
        }

        $b64 = strtr($ref, '-_', '+/');
        $pad = strlen($b64) % 4;
        if ($pad !== 0) {
            $b64 .= str_repeat('=', 4 - $pad);
        }

        $raw = base64_decode($b64, true);
        if ($raw === false || ! str_contains($raw, "\0")) {
            return null;
        }

        [$payload, $mac] = explode("\0", $raw, 2);
        if ($payload === '' || $mac === '') {
            return null;
        }

        $expected = hash_hmac('sha256', $payload, self::signingKey(), true);
        if (! hash_equals($expected, $mac)) {
            return null;
        }

        try {
            $data = json_decode($payload, true, 2, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            return null;
        }

        if (! is_array($data) || ! array_key_exists('i', $data)) {
            return null;
        }

        if (! is_int($data['i']) && ! is_numeric($data['i'])) {
            return null;
        }

        return (int) $data['i'];
    }

    private static function signingKey(): string
    {
        return hash('sha256', (string) Config::get('app.key'), true);
    }
}
