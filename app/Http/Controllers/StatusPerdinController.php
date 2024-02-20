<?php

namespace App\Http\Controllers;

use App\Models\DataPerdin;
use App\Models\StatusPerdin;
use Illuminate\Http\Request;

class StatusPerdinController extends Controller
{
    public function approve($id)
    {
        $statusPerdin = StatusPerdin::findOrFail($id);

        if ($statusPerdin->approve == '0') {
            return redirect()->route('data-perdin.index', 'tolak')->with('success', 'Status Perdin telah dinonaktifkan karena telah ditolak');
        }

        $statusPerdin->update(['approve' => 1]);
        return redirect()->route('data-perdin.show', $statusPerdin->data_perdin->slug)->with('success', 'Status Perdin berhasil diperbarui!');
    }

    public function tolak($id)
    {
        $statusPerdin = StatusPerdin::findOrFail($id);

        $validatedData = request()->validate([
            'alasan_tolak' => 'required',
        ]);

        $validatedData['approve'] = 0;

        $statusPerdin->update($validatedData);
        return redirect()->route('data-perdin.show', $statusPerdin->data_perdin->slug)->with('success', 'Status Perdin berhasil diperbarui!');
    }

    public function apiApprove(Request $request)
    {
        $id = $request->input('id');
        $status_id = DataPerdin::find($id)->status_id;

        if (StatusPerdin::find($status_id)->approve == '0') {
            return response()->json(['message' => 'Status Perdin telah dinonaktifkan karena telah ditolak'], 200);
        }

        StatusPerdin::where('id', $status_id)->update(['approve' => 1]);
        return response()->json(['message' => 'Status Perdin berhasil diapprove'], 200);
    }

    public function apiTolak(Request $request)
    {
        $id = $request->input('id');
        $alasan_tolak = $request->input('alasan_tolak');

        if (empty($alasan_tolak)) {
            return response()->json(['message' => 'alasan_tolak tidak boleh kosong'], 400);
        }

        $dataToUpdate = [
            'approve' => 0,
            'alasan_tolak' => $alasan_tolak,
        ];

        $status_id = DataPerdin::find($id)->status_id;
        StatusPerdin::where('id', $status_id)->update($dataToUpdate);

        return response()->json(['message' => 'Status Perdin berhasil ditolak'], 200);
    }
}
