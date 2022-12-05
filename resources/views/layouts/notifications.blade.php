<div id="notifications" class="fixed top-10 left-0 w-full text-center flex justify-center z-10 opacity-80">
    @if (session()->has('status'))
        @include('layouts.notification', ['message' => session('status')])
    @endif
</div>
