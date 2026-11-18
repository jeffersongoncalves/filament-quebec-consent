<?php

namespace JeffersonGoncalves\Filament\QuebecConsent\Support;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use InvalidArgumentException;
use JeffersonGoncalves\QuebecConsent\ConsentManager;
use JeffersonGoncalves\QuebecConsent\Enums\ConsentAction;
use JeffersonGoncalves\QuebecConsent\Models\ConsentRecord;

class Labels
{
    public static function subject(ConsentRecord $record): string
    {
        $type = $record->getAttribute('subject_type');

        if (is_string($type)) {
            return class_basename(Model::getActualClassNameForMorph($type)).' #'.$record->getAttribute('subject_id');
        }

        // The anonymous id identifies a browser: show enough to tell visitors apart.
        return __('filament-quebec-consent::filament-quebec-consent.visitor').' '.Str::limit((string) $record->getAttribute('anonymous_id'), 8);
    }

    public static function action(string $action): string
    {
        return __("filament-quebec-consent::filament-quebec-consent.action.{$action}");
    }

    public static function actionColor(string $action): string
    {
        return $action === 'granted' ? 'success' : 'danger';
    }

    /**
     * A record given for older terms than the purpose's current version no longer counts as consent.
     */
    public static function isOutdated(ConsentRecord $record): bool
    {
        if ($record->action !== ConsentAction::Granted) {
            return false;
        }

        try {
            $current = app(ConsentManager::class)->currentVersion($record->purpose);
        } catch (InvalidArgumentException) {
            return false; // purpose removed from the config since then
        }

        return $current !== null && $record->version !== $current;
    }

    /**
     * @return array<string, string>
     */
    public static function distinct(string $column): array
    {
        return ConsentRecord::query()->whereNotNull($column)->distinct()->orderBy($column)->pluck($column, $column)->all();
    }
}
