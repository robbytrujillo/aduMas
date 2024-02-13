<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAduanRequest;
use App\Http\Resources\AduanResource;
use App\Http\Resources\AduanWithLastStatusResource;
use Illuminate\Http\Request;
use App\Models\Aduan;
use App\Models\User;
use App\Models\AduanStatus;
use Inertia\Inertia;
use Inertia\Response;
use App\Services\FooterService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AduanController extends Controller
{
    public function index(): Response {
        $perPage = request('perPage') ?: 5;

    // Mengambil ID pengguna yang sedang login
    // $userId = Auth::id();

    $aduans = Aduan::with('user', 'tags', 'status')
        ->where('user_id', $userId)
        ->when(request('search'), function ($query, $search) {
            $query->where('title', 'like', "%($search)");
        })
        ->paginate($perPage)
        ->appends(request()->query());

    $aduans = AudanWithLastStatusResource::collection($aduans);

    $filters = request()->only(['search', 'perPage']);

    return Inertia::render('Admin/Aduan/UserIndex', compact('aduans', 'filters'));
    }

    public function indexUser():Response 
    {
        $perPage = request('perPage') ?: 5;

        // Mengambil ID pengguna yang sedang login
        $userId = Auth::id();

        $aduans = Aduan::with('user', 'tags', 'status')
        ->where('user_id', $userId)
        ->when(request('search'), function ($query, $search) {
            $query->where('title', 'like', "%($search)");
        })
        ->paginate($perPage)
        ->appends(request()->query());

        $aduans = AudanWithLastStatusResource::collection($aduans);

        $filters = request()->only(['search', 'perPage']);

        return Inertia::render('Admin/Aduan/UserIndex', compact('aduans', 'filters'));
    }
    
    public function edit(Aduan $aduan): Response {
        $this->authorize('update', $aduan);
        return Inertia::render('Admin/Aduan/Edit', [
            'aduan' => new AduanResource($aduan)
        ]);
    }

    public function store(StoreAduanRequest $request) {
        $validated = $request->validated();
        $image = $request->file('image');
        $image->storeAs('public/aduan', $image->hashName());
        $uniqueId = 'LB' . substr(uniqid(), 7, 4);
        $aduan = Aduan::create(array_merge($validated, [
            'image' => $image->hashName(),
            'slug' => $slug,
            'kecamatan' => $request->selectedDistricName,
            'id_kecamatan'=> $request->selectedDistric,
            'title' => $request->title,
            'user_id' => auth()->user()->id,
            'desa_kelurahan' => $request->selectedVillageName,
            'isi_aduan' => $request->isi_aduan,
        ]));
        AduanStatus::create([
            'aduan_id' => $aduan->id,
            'status' => "Belum Ditangani",
            'user_id' => auth()->user()->id,
            'daftar_desa' => $validated['selectedVillageName'],
            'keterangan' => 'Laporan sudah diterima dan akan diteruskan kepada petugas desa bersangkutan'
        ]);
        $aduan->tags()->attach($validated['tags']);
        return back();
    }

    public function updateStatus(Request $request, $id) {
        $request->validate([
            'status' => 'required|in:Belum Ditangani,Verivikasi,Diproses,Selesai',
            'selectedVillage' => 'required',
            'keterangan' => 'nullable',   
        ]);

        AduanStatus::created([
            'aduan_id' => $id,
            'user_id' => auth()->user()->id,
            'status' => $request->status,
            'daftar_desa' => $request->selectedVillage,
            'keterangan' => $request->input('keterangan', '-'),
        ]);
        return to_route('aaduan.index');
    }

    public function show($slug) {
        $aduan = Aduan::with('user', 'status', 'tags')->where('slug', $slug)->first();
        foreach ($aduan->status as $status) {
            $user = User::find($status->user_id);
            $status->user = $user;
        }

        if ($aduan) {
            $popularAduans = Aduan::orderBy('created_at', 'desc')
                ->whereNotIn('id', [$aduan->id])
                ->take(4)
                ->get();
            $footerData = FooterService::getFooterData();
            return Inertia::render('Aduan/Detail', [
                'aduan' => new AduanResource($aduan),
                'popularAduans' => AduanResource::collection($popularAduans),
                'footerData' => $footerData,
            ]);
        } else {

        }
    }

    public function destroy(Aduan $aduan) {
        $this->authorize('delete', $aduan);
        $aduan->delete();
        return back();
    }
}