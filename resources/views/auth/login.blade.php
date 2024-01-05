<x-app-layout>
    <form method="post">
        @csrf
        <div>
            <x-form-label for='email'>Email</x-form-label>
            <x-form-input type='email' name='email' id='email' old-value='email'/>
            <x-input-error name='email'></x-input-error>
        </div>
        <div>
            <x-form-label for='password'>Password</x-form-label>
            <x-form-input type='password' name='password' id='password'/>
            <x-input-error name='password'></x-input-error>
        </div>
        <x-alert-error></x-alert-error>
        <x-submit-button value="Login"></x-submit-button>
    </form>
</x-app-layout>