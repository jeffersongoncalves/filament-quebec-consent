<?php

use JeffersonGoncalves\Filament\QuebecConsent\QuebecConsentPlugin;
use JeffersonGoncalves\Filament\QuebecConsent\Resources\ConsentRecords\ConsentRecordResource;
use JeffersonGoncalves\Filament\QuebecConsent\Resources\ConsentRecords\Pages\ListConsentRecords;
use JeffersonGoncalves\Filament\QuebecConsent\Resources\ConsentRecords\Pages\ViewConsentRecord;
use JeffersonGoncalves\Filament\QuebecConsent\Support\Labels;
use JeffersonGoncalves\Filament\QuebecConsent\Tests\Fixtures\TestUser;
use JeffersonGoncalves\QuebecConsent\Facades\QuebecConsent;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = TestUser::create(['name' => 'Maria', 'email' => 'maria@example.com']);

    $this->actingAs($this->user);
});

it('lists users and visitors consents', function () {
    $granted = QuebecConsent::grant($this->user, 'marketing', source: 'signup');
    $visitor = QuebecConsent::revoke('3f2b9c1e-visitor', 'cookies');

    Livewire::test(ListConsentRecords::class)
        ->assertSuccessful()
        ->assertCanSeeTableRecords([$granted, $visitor])
        ->assertSee('TestUser #'.$this->user->getKey())
        ->assertSee('Visitor 3f2b9c1e...')
        ->assertSee('Granted')
        ->assertSee('Revoked');
});

it('filters by purpose, decision and visitors', function () {
    $marketing = QuebecConsent::grant($this->user, 'marketing');
    $cookies = QuebecConsent::revoke('visitor-1', 'cookies');

    Livewire::test(ListConsentRecords::class)
        ->filterTable('purpose', 'marketing')
        ->assertCanSeeTableRecords([$marketing])
        ->assertCanNotSeeTableRecords([$cookies]);

    Livewire::test(ListConsentRecords::class)
        ->filterTable('action', 'revoked')
        ->assertCanSeeTableRecords([$cookies])
        ->assertCanNotSeeTableRecords([$marketing]);

    Livewire::test(ListConsentRecords::class)
        ->filterTable('visitors', true)
        ->assertCanSeeTableRecords([$cookies])
        ->assertCanNotSeeTableRecords([$marketing]);
});

it('shows the proof of consent', function () {
    $record = QuebecConsent::grant($this->user, 'marketing', version: '2026-01', source: 'signup', metadata: ['campaign' => 'black-friday']);

    Livewire::test(ViewConsentRecord::class, ['record' => $record->getKey()])
        ->assertSuccessful()
        ->assertSee('marketing')
        ->assertSee('2026-01')
        ->assertSee('signup')
        ->assertSee('black-friday');
});

it('flags grants given for older terms', function () {
    config()->set('quebec-consent.purposes', ['marketing' => ['version' => '2026-01']]);
    $old = QuebecConsent::grant($this->user, 'marketing');

    config()->set('quebec-consent.purposes', ['marketing' => ['version' => '2026-11']]);
    $current = QuebecConsent::grant($this->user, 'marketing');

    expect(Labels::isOutdated($old))->toBeTrue()
        ->and(Labels::isOutdated($current))->toBeFalse()
        ->and(Labels::isOutdated(QuebecConsent::revoke($this->user, 'marketing')))->toBeFalse();
});

it('is read-only and applies the fluent plugin options', function () {
    QuebecConsentPlugin::get()->navigationGroup('QUEBEC')->slug('consent-ledger');

    expect(ConsentRecordResource::canCreate())->toBeFalse()
        ->and(ConsentRecordResource::getPages())->toHaveKeys(['index', 'view'])->not->toHaveKey('edit')
        ->and(ConsentRecordResource::getNavigationGroup())->toBe('QUEBEC')
        ->and(ConsentRecordResource::getSlug())->toBe('consent-ledger');
});
