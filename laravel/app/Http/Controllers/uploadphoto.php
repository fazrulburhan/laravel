<?php

use Illuminate\Support\Facades\Storage;

{
    $user = User::findOrFail($id);

    $request->validate([
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($user->foto) {
            Storage::delete($user->foto);
        }

        // Simpan foto baru
        $path = $request->file('foto')->store('public/profiles');
        $user->foto = $path;
    }

    // Update data lainnya
    $user->update($request->except('foto'));

    return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui!');
}
