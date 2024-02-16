<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Footer;
use App\Http\Resources\FooterResource;

class FooterController extends Controller
{
    public function edit(): Response {
        $footers = Footer::all();
        $formattedFooters = FooterResource::collection($footers);
        return Inertia::render('Admin/Footer/Index', ['footers' => $formattedFooters]);
    }

    public function updateFooters(Request $request) {
        $footersData = $request->input('footers');

        foreach ($footersData as $footerData) {
            $footer = Footer::findOrFail($footerData['id']);
            if ($footer) {
                $footer->update([
                    'nama_halaman' => $footerData['nama_halaman'],
                    'link_url' => $footerData['link_url'],
                ]);
            }
        }

        return back();
    }
}
