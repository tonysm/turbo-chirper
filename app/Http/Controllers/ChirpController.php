<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chirps.index', [
            'chirps' => Chirp::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chirps.create', [
            //
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:255'],
        ]);

        $chirp = $request->user()->chirps()->create($validated);

        if ($request->wantsTurboStream()) {
            return turbo_stream([
                turbo_stream($chirp, 'prepend'),
                turbo_stream()->update('create_chirp', view('chirps._form')),
                turbo_stream()->append('notifications', view('layouts.notification', [
                    'message' => __('Chirp created.'),
                ])),
            ]);
        }

        return redirect()
            ->route('chirps.index')
            ->with('status', __('Chirp created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Http\Response
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Http\Response
     */
    public function edit(Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        return view('chirps.edit', [
            'chirp' => $chirp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        $validated = $request->validate([
            'message' => ['required', 'string', 'max:255'],
        ]);

        $chirp->update($validated);

        if ($request->wantsTurboStream()) {
            return turbo_stream([
                turbo_stream($chirp),
                turbo_stream()->append('notifications', view('layouts.notification', [
                    'message' => __('Chirp updated.'),
                ])),
            ]);
        }

        return redirect()
            ->route('chirps.index')
            ->with('status', __('Chirp updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Chirp $chirp)
    {
        $this->authorize('delete', $chirp);

        $chirp->delete();

        if ($request->wantsTurboStream()) {
            return turbo_stream([
                turbo_stream($chirp),
                turbo_stream()->append('notifications', view('layouts.notification', [
                    'message' => __('Chirp deleted.'),
                ])),
            ]);
        }

        return redirect()
            ->route('chirps.index')
            ->with('status', __('Chirp deleted.'));
    }
}
