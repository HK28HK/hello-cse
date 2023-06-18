<?php

namespace App\Http\Services;

use App\Models\Star;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class StarService
{
    const storage_folder = 'public/stars';

    public static function store(array $fields, UploadedFile|array|null $file): Star
    {
        /**
         * @phpstan-ignore-next-line
         *
         * @link https://github.com/nunomaduro/larastan/issues/250
         */
        $fields['image_path'] = Storage::put(self::storage_folder, $file);

        /** @var Star|null */
        $star = Star::create($fields);

        if (! $star) {
            throw new \Exception('Failed to create resource');
        }

        return $star;
    }

    public static function update(Star $star, array $fields): bool
    {
        return $star->update($fields);
    }

    public static function destroy(Star $star): bool
    {
        return $star->delete();
    }
}
