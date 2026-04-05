<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
    // eager loading
        $members = Member::with('family')->get();
        return view('members.index', compact('members'));
    }

    public function majelis()
    {
        $majelis = Member::whereNotNull('posisi_jabatan')
                        ->where('posisi_jabatan', '!=', '-')
                        ->orderBy('nama_pertama', 'asc')
                        ->get();

        return view('members.list_majelis', compact('majelis'));
    }

    public function pelkat()
    {
        $members = Member::whereNotNull('pengurus_pelkat')
                        ->orderBy('pengurus_pelkat')
                        ->get();

        $pelkatGroups = $members->groupBy('pengurus_pelkat');

        return view('members.list_pelkat', compact('pelkatGroups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        #$families = Family::all();
        #return view('members.create', compact('families'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* $validated = $request->validate([
            'family_id'     => 'required|exists:families,id',
            'no_induk'      => 'required|unique:members',
            'nama_pertama'  => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'nullable|date',
            // Validasi Enum: S atau B
            'status_baptis' => 'nullable|in:S,B',
            'status_sidi'   => 'nullable|in:S,B',
        ]);

        Member::create($validated);

        return redirect()->route('members.index')->with('success', 'Anggota berhasil didaftarkan!'); */
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        $member->load('family');
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
