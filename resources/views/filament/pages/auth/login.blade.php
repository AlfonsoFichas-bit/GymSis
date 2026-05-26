<x-filament-panels::page.simple>
    <div x-data="{ tab: 'login' }">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 2rem; width: 100%;">
            <div>
                <x-filament::button 
                    x-show="tab === 'login'" 
                    class="w-full" 
                    type="button" 
                    icon="heroicon-m-arrow-right-on-rectangle"
                >
                    Iniciar Sesión
                </x-filament::button>
                <x-filament::button 
                    x-show="tab !== 'login'" 
                    x-cloak
                    color="gray" 
                    outlined 
                    class="w-full" 
                    type="button" 
                    x-on:click="tab = 'login'; $wire.switchToLogin()" 
                    icon="heroicon-m-arrow-right-on-rectangle"
                >
                    Iniciar Sesión
                </x-filament::button>
            </div>
            
            <div>
                <x-filament::button 
                    x-show="tab === 'register'" 
                    x-cloak
                    class="w-full" 
                    type="button" 
                    icon="heroicon-m-user-plus"
                >
                    Registrarse
                </x-filament::button>
                <x-filament::button 
                    x-show="tab !== 'register'" 
                    color="gray" 
                    outlined 
                    class="w-full" 
                    type="button" 
                    x-on:click="tab = 'register'; $wire.switchToRegister()" 
                    icon="heroicon-m-user-plus"
                >
                    Registrarse
                </x-filament::button>
            </div>
        </div>

        <div x-show="tab === 'login'">
            {{ $this->content }}
        </div>

        <div x-show="tab === 'register'" x-cloak>
            <form wire:submit.prevent="register" class="space-y-6">

                <x-filament-forms::field-wrapper label="Nombre" id="register-name" required :statePath="'registerData.name'">
                    <x-filament::input.wrapper :valid="! $errors->has('name')">
                        <x-filament::input
                            type="text"
                            id="register-name"
                            wire:model.blur="registerData.name"
                            required
                            autocomplete="name"
                        />
                    </x-filament::input.wrapper>
                </x-filament-forms::field-wrapper>

                <x-filament-forms::field-wrapper label="Email" id="register-email" required :statePath="'registerData.email'">
                    <x-filament::input.wrapper :valid="! $errors->has('email')">
                        <x-filament::input
                            type="email"
                            id="register-email"
                            wire:model.blur="registerData.email"
                            required
                            autocomplete="email"
                        />
                    </x-filament::input.wrapper>
                </x-filament-forms::field-wrapper>

                <x-filament-forms::field-wrapper label="Contraseña" id="register-password" required :statePath="'registerData.password'">
                    <x-filament::input.wrapper :valid="! $errors->has('password')">
                        <x-filament::input
                            type="password"
                            id="register-password"
                            wire:model.blur="registerData.password"
                            required
                            autocomplete="new-password"
                        />
                    </x-filament::input.wrapper>
                </x-filament-forms::field-wrapper>

                <x-filament-forms::field-wrapper label="Confirmar Contraseña" id="register-password-confirmation" required :statePath="'registerData.password'">
                    <x-filament::input.wrapper :valid="! $errors->has('password')">
                        <x-filament::input
                            type="password"
                            id="register-password-confirmation"
                            wire:model.blur="registerData.password_confirmation"
                            required
                            autocomplete="new-password"
                        />
                    </x-filament::input.wrapper>
                </x-filament-forms::field-wrapper>

                <x-filament-forms::field-wrapper label="CI" id="register-ci" :statePath="'registerData.ci'">
                    <x-filament::input.wrapper :valid="! $errors->has('ci')">
                        <x-filament::input
                            type="text"
                            id="register-ci"
                            wire:model.blur="registerData.ci"
                            autocomplete="off"
                        />
                    </x-filament::input.wrapper>
                </x-filament-forms::field-wrapper>

                <x-filament-forms::field-wrapper label="Teléfono" id="register-phone" :statePath="'registerData.phone'">
                    <x-filament::input.wrapper :valid="! $errors->has('phone')">
                        <x-filament::input
                            type="text"
                            id="register-phone"
                            wire:model.blur="registerData.phone"
                            autocomplete="tel"
                        />
                    </x-filament::input.wrapper>
                </x-filament-forms::field-wrapper>

                <x-filament-forms::field-wrapper label="Dirección" id="register-address" :statePath="'registerData.address'">
                    <x-filament::input.wrapper :valid="! $errors->has('address')">
                        <x-filament::input
                            type="text"
                            id="register-address"
                            wire:model.blur="registerData.address"
                            autocomplete="street-address"
                        />
                    </x-filament::input.wrapper>
                </x-filament-forms::field-wrapper>

                <x-filament-forms::field-wrapper label="Fecha de Nacimiento" id="register-birth-date" :statePath="'registerData.birth_date'">
                    <x-filament::input.wrapper :valid="! $errors->has('birth_date')">
                        <x-filament::input
                            type="date"
                            id="register-birth-date"
                            wire:model.blur="registerData.birth_date"
                        />
                    </x-filament::input.wrapper>
                </x-filament-forms::field-wrapper>

                <div class="fi-simple-page-button-group flex flex-wrap items-center gap-3" style="margin-top: 2rem;">
                    <x-filament::button type="submit" class="w-full">
                        Registrarse
                    </x-filament::button>
                </div>
            </form>
        </div>
    </div>
</x-filament-panels::page.simple>
