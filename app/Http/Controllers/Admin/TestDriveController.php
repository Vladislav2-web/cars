<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TestDrive;
use App\Notifications\TestDriveStatusChanged;
use Illuminate\Http\Request;

class TestDriveController extends Controller
{
    public function index()
    {
        $requests = TestDrive::with('car')->latest()->paginate(15);

        return view('admin.test-drives', compact('requests'));
    }

    public function updateStatus(Request $request, TestDrive $testDrive)
    {
        $data = $request->validate([
            'status' => ['required', 'in:approved,rejected'],
            'admin_comment' => ['nullable', 'string', 'max:500'],
        ]);

        $testDrive->update($data);

        if ($testDrive->user) {
            $testDrive->user->notify(new TestDriveStatusChanged($testDrive));
        }

        return back()->with('success', 'Заявка №' . $testDrive->id . ' обновлена, клиент уведомлён.');
    }
}