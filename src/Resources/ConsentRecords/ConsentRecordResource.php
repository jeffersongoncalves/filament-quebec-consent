<?php

namespace JeffersonGoncalves\Filament\QuebecConsent\Resources\ConsentRecords;

use BackedEnum;
use Filament\Actions\ViewAction;
use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Panel;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use JeffersonGoncalves\Filament\QuebecConsent\QuebecConsentPlugin;
use JeffersonGoncalves\Filament\QuebecConsent\Resources\ConsentRecords\Pages\ListConsentRecords;
use JeffersonGoncalves\Filament\QuebecConsent\Resources\ConsentRecords\Pages\ViewConsentRecord;
use JeffersonGoncalves\Filament\QuebecConsent\Support\Labels;
use JeffersonGoncalves\QuebecConsent\Enums\ConsentAction;
use JeffersonGoncalves\QuebecConsent\Models\ConsentRecord;

/**
 * Read-only: the ledger is append-only, consents are recorded by the application, never edited here.
 */
class ConsentRecordResource extends Resource
{
    protected static ?string $model = ConsentRecord::class;

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('subject')
                            ->label(__('filament-quebec-consent::filament-quebec-consent.fields.subject'))
                            ->state(fn (ConsentRecord $record): string => Labels::subject($record)),
                        TextEntry::make('purpose')
                            ->label(__('filament-quebec-consent::filament-quebec-consent.fields.purpose'))
                            ->badge(),
                        TextEntry::make('action')
                            ->label(__('filament-quebec-consent::filament-quebec-consent.fields.action'))
                            ->formatStateUsing(fn (BackedEnum $state): string => Labels::action($state->value))
                            ->badge()
                            ->color(fn (BackedEnum $state): string => Labels::actionColor($state->value)),
                        TextEntry::make('version')
                            ->label(__('filament-quebec-consent::filament-quebec-consent.fields.version'))
                            ->placeholder('-')
                            ->color(fn (ConsentRecord $record): ?string => Labels::isOutdated($record) ? 'warning' : null),
                        TextEntry::make('created_at')
                            ->label(__('filament-quebec-consent::filament-quebec-consent.fields.created_at'))
                            ->dateTime(),
                        TextEntry::make('expires_at')
                            ->label(__('filament-quebec-consent::filament-quebec-consent.fields.expires_at'))
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('source')
                            ->label(__('filament-quebec-consent::filament-quebec-consent.fields.source'))
                            ->placeholder('-'),
                        TextEntry::make('ip_address')
                            ->label(__('filament-quebec-consent::filament-quebec-consent.fields.ip_address'))
                            ->placeholder('-'),
                        TextEntry::make('user_agent')
                            ->label(__('filament-quebec-consent::filament-quebec-consent.fields.user_agent'))
                            ->placeholder('-')
                            ->columnSpanFull(),
                        KeyValueEntry::make('metadata')
                            ->label(__('filament-quebec-consent::filament-quebec-consent.fields.metadata'))
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->label(__('filament-quebec-consent::filament-quebec-consent.fields.created_at'))
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('subject')
                    ->label(__('filament-quebec-consent::filament-quebec-consent.fields.subject'))
                    ->state(fn (ConsentRecord $record): string => Labels::subject($record)),
                TextColumn::make('purpose')
                    ->label(__('filament-quebec-consent::filament-quebec-consent.fields.purpose'))
                    ->badge()
                    ->searchable(),
                TextColumn::make('action')
                    ->label(__('filament-quebec-consent::filament-quebec-consent.fields.action'))
                    ->formatStateUsing(fn (BackedEnum $state): string => Labels::action($state->value))
                    ->badge()
                    ->color(fn (BackedEnum $state): string => Labels::actionColor($state->value)),
                TextColumn::make('version')
                    ->label(__('filament-quebec-consent::filament-quebec-consent.fields.version'))
                    ->placeholder('-')
                    ->color(fn (ConsentRecord $record): ?string => Labels::isOutdated($record) ? 'warning' : null)
                    ->tooltip(fn (ConsentRecord $record): ?string => Labels::isOutdated($record) ? __('filament-quebec-consent::filament-quebec-consent.outdated') : null),
                TextColumn::make('expires_at')
                    ->label(__('filament-quebec-consent::filament-quebec-consent.fields.expires_at'))
                    ->date()
                    ->placeholder('-')
                    ->toggleable(),
                TextColumn::make('source')
                    ->label(__('filament-quebec-consent::filament-quebec-consent.fields.source'))
                    ->placeholder('-')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                SelectFilter::make('purpose')
                    ->label(__('filament-quebec-consent::filament-quebec-consent.fields.purpose'))
                    ->options(fn (): array => Labels::distinct('purpose')),
                SelectFilter::make('version')
                    ->label(__('filament-quebec-consent::filament-quebec-consent.fields.version'))
                    ->options(fn (): array => Labels::distinct('version')),
                SelectFilter::make('action')
                    ->label(__('filament-quebec-consent::filament-quebec-consent.fields.action'))
                    ->options(collect(ConsentAction::cases())->mapWithKeys(fn (ConsentAction $action): array => [$action->value => Labels::action($action->value)])->all()),
                TernaryFilter::make('visitors')
                    ->label(__('filament-quebec-consent::filament-quebec-consent.filters.visitors'))
                    ->queries(
                        true: fn (Builder $query): Builder => $query->whereNotNull('anonymous_id'),
                        false: fn (Builder $query): Builder => $query->whereNull('anonymous_id'),
                    ),
            ])
            ->recordActions([
                ViewAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListConsentRecords::route('/'),
            'view' => ViewConsentRecord::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getModelLabel(): string
    {
        return __('filament-quebec-consent::filament-quebec-consent.resource.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-quebec-consent::filament-quebec-consent.resource.plural_label');
    }

    public static function getNavigationGroup(): ?string
    {
        return QuebecConsentPlugin::get()->getNavigationGroup();
    }

    public static function getNavigationSort(): ?int
    {
        return QuebecConsentPlugin::get()->getNavigationSort();
    }

    public static function getNavigationIcon(): string|BackedEnum|null
    {
        return QuebecConsentPlugin::get()->getNavigationIcon();
    }

    public static function getSlug(?Panel $panel = null): string
    {
        return QuebecConsentPlugin::get()->getSlug();
    }
}
