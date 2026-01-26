<x-layout>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

    <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>

        <label for="password" class="form-label">New Password</label>
        <input type="password" class="form-control" id="password" name="password" required>

        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>

        <button type="submit"  class="btn btn-primary mt-3">Reset Password</button>
    </form>
</x-layout>
