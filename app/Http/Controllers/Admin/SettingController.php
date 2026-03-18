<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateSettingsRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit()
    {
        return view('admin.settings.edit', [
            'settings' => [
                'business_name' => Setting::getValue('business_name', 'My Business'),
                'phone' => Setting::getValue('phone'),
                'email' => Setting::getValue('email'),
                'address' => Setting::getValue('address'),
                'logo_path' => Setting::getValue('logo_path'),
            ],
        ]);
    }

    public function update(UpdateSettingsRequest $request)
    {
        $data = $request->validated();

        Setting::setValue('business_name', $data['business_name'] ?? '');
        Setting::setValue('phone', $data['phone'] ?? '');
        Setting::setValue('email', $data['email'] ?? '');
        Setting::setValue('address', $data['address'] ?? '');

        // Logo upload
        if ($request->hasFile('logo')) {
            // delete old
            $old = Setting::getValue('logo_path');
            if ($old) {
                Storage::disk('public')->delete($old);
            }

            // store in R2
            $path = $request->file('logo')->store('settings', 'r2');
            Setting::setValue('logo_path', $path);
        }

        return redirect()
            ->route('admin.settings.edit')
            ->with('status', 'Settings updated.');
    }
}
