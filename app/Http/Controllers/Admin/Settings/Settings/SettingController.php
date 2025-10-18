<?php

namespace App\Http\Controllers\Admin\Settings\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Branch;

class SettingController extends Controller
{
    // عرض صفحة الإعدادات
    public function index()
    {
        $branches = Branch::with('user')->get();
        $users = User::all();

        return view('admin.settings.setting.index', compact('branches', 'users'));
    }

    // // دوال CRUD للفروع
    // public function createBranch()
    // {
    //     return view('admin.settings.branches.create');
    // }

    // public function storeBranch(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'mobile' => 'required',
    //         'user_id' => 'nullable|exists:users,id'
    //     ]);

    //     Branch::create($request->all());

    //     return redirect()->route('admin.settings')->with('success', 'تم إضافة الفرع بنجاح');
    // }

    // public function editBranch(Branch $branch)
    // {
    //     $users = User::all();
    //     return view('admin.settings.branches.edit', compact('branch','users'));
    // }

    // public function updateBranch(Request $request, Branch $branch)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'mobile' => 'required',
    //         'user_id' => 'nullable|exists:users,id'
    //     ]);

    //     $branch->update($request->all());

    //     return redirect()->route('admin.settings')->with('success', 'تم تعديل الفرع بنجاح');
    // }

    // public function destroyBranch(Branch $branch)
    // {
    //     $branch->delete();
    //     return redirect()->route('admin.settings')->with('success', 'تم حذف الفرع بنجاح');
    // }

    // دوال CRUD للمستخدمين يمكن استخدام UserController الحالي
}
