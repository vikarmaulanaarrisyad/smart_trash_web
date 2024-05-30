<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();

        return view('setting.index', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $rules = [
            'nama_aplikasi' => 'required',
            'url_aplikasi' => 'required',
            'deskripsi_aplikasi' => 'required',
            'footer_aplikasi' => 'required',
            'interval' => 'required|numeric',
            'tipe_aplikasi' => 'required',
            'versi_aplikasi' => 'required',
            'versi_laravel' => 'required',
        ];

        if ($request->has('pills') && $request->pills == 'logo') {
            $rules = [
                'logo_aplikasi' => 'nullable|mimes:png,jpg,jpeg|max:2048',
                'favicon_aplikasi' => 'nullable|mimes:png,jpg,jpeg|max:2048',
                'logo_login' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            ];
        }


        $data = $request->except('logo_aplikasi', 'favicon_aplikasi', 'logo_login');

        if ($request->hasFile('logo_aplikasi') && $setting->logo_aplikasi) {
            if (Storage::disk('public')->exists($setting->logo_aplikasi)) {
                Storage::disk('public')->delete($setting->logo_aplikasi);
            }

            $data['logo_aplikasi'] = upload('setting', $request->file('logo_aplikasi'), 'setting');
        }

        if ($request->hasFile('favicon_aplikasi') && $setting->favicon_aplikasi) {
            if (Storage::disk('public')->exists($setting->favicon_aplikasi)) {
                Storage::disk('public')->delete($setting->favicon_aplikasi);
            }

            $data['favicon_aplikasi'] = upload('setting', $request->file('favicon_aplikasi'), 'setting');
        }

        if ($request->hasFile('logo_login') && $setting->logo_login) {
            if (Storage::disk('public')->exists($setting->logo_login)) {
                Storage::disk('public')->delete($setting->logo_login);
            }

            $data['logo_login'] = upload('setting', $request->file('logo_login'), 'setting');
        }

        $setting->update($data);

        if ($request->has('pills') && $request->pills == 'bank') {
            $setting->bank_setting()->attach($request->bank_id, $request->only('account', 'name', 'is_main'));
        }

        return back()->with([
            'message' => 'Pengaturan berhasil diperbarui',
            'success' => true
        ]);
    }
}
