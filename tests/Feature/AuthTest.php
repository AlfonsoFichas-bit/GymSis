use App\Models\User;
use App\Filament\Pages\Auth\Login;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('blocks inactive users from logging in', function () {
    $user = User::factory()->create([
        'status' => false,
        'password' => bcrypt('password'),
    ]);

    Livewire::test(Login::class)
        ->fillForm([
            'email' => $user->email,
            'password' => 'password',
        ])
        ->call('authenticate')
        ->assertHasFormErrors(['data.email']);
});

it('allows active users to log in', function () {
    $user = User::factory()->create([
        'status' => true,
        'password' => bcrypt('password'),
    ]);

    Livewire::test(Login::class)
        ->fillForm([
            'email' => $user->email,
            'password' => 'password',
        ])
        ->call('authenticate')
        ->assertHasNoFormErrors();
});
