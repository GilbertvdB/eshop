<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use UploadAble;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $pageTitle = 'Settings';
        $pageDescription = 'Manage Settings';
        return view('admin.settings.index', compact('pageTitle', 'pageDescription'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $keys = $request->except('_token');

            foreach ($keys as $key => $value)
            {
                Setting::set($key, $value);
            }

        return back()->with('success', 'Settings updated successfully.');
        // return redirect()->route('admin.settings')->with('success', 'Settings updated successfully.');
        // return $this->index();

        // return redirect()->to(url()->previous())->with('success', 'Resource updated successfully.');
    }
}

