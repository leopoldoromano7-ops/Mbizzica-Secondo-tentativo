@if (session('status'))
    <div>
        STATUS: {{ session('status') }}
    </div>
@endif


{{-- 2FA NON attiva --}}
@if (!auth()->user()->two_factor_secret)
    <form method="POST" action="/user/two-factor-authentication">
        @csrf
        <button type="submit" class="btn btn-primary mt-3">
            Abilita la 2FA
        </button>
    </form>
@endif


{{-- 2codice da digitare --}}
@if (auth()->user()->two_factor_secret && !auth()->user()->two_factor_confirmed_at)

    <p>Scansiona il QR code:</p>
    {!! auth()->user()->twoFactorQrCodeSvg() !!}

    <form method="POST" action="/user/confirmed-two-factor-authentication">
        @csrf
        <input type="text" name="code" placeholder="Codice 6 cifre" required autocomplete="one-time-code">

        <button type="submit" class="btn btn-primary mt-3">
            Conferma
        </button>
    </form>

@endif


{{-- 2FA attiva  --}}
@if (auth()->user()->two_factor_confirmed_at)

    <p class="mt-3"><strong>La 2FA è attiva</strong></p>

    <form method="POST" action="/user/two-factor-authentication">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger mt-2">
            Disabilita 2FA
        </button>
    </form>

@endif
