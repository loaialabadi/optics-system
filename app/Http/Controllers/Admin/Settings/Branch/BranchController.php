<?php

namespace App\Http\Controllers\Admin\Settings\Branch;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::with('user')->get();
        return view('admin.settings.branches.index', compact('branches'));
    }

    public function create()
    {
        $users = User::where('role', 'branch')->get(); // المستخدمين من نوع branch فقط
        return view('admin.settings.branches.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:branches',
            'address' => 'required',
        ]);

        Branch::create($request->all());

        return redirect()->route('admin.branches.index')->with('success', 'تم إضافة الفرع بنجاح');
    }

    public function edit(Branch $branch)
    {
        $users = User::where('role', 'branch')->get();
        return view('admin.settings.branches.edit', compact('branch', 'users'));
    }

    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:branches,phone,' . $branch->id,
            'address' => 'required',
        ]);

        $branch->update($request->all());

        return redirect()->route('admin.branches.index')->with('success', 'تم تعديل الفرع بنجاح');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('admin.branches.index')->with('success', 'تم حذف الفرع بنجاح');
    }
}
