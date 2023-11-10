<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view notices', ['only' => ['index']]);
        $this->middleware('permission:add notices', ['only' => ['create']]);
        $this->middleware('permission:add notices', ['only' => ['store']]);
        $this->middleware('permission:edit notices', ['only' => ['edit']]);
        $this->middleware('permission:update notices', ['only' => ['update']]);
        $this->middleware('permission:delete notices', ['only' => ['destroy']]);
    }
    public function index()
    {
        $notices = Notice::latest()->paginate();
        return view('admin.notices.index',compact('notices'));
    }

    public function create()
    {
        return view('admin.notices.create');
    }

    public function store(Request $request)
    {
        Notice::create($request->all());
        return redirect()->route('notices.index')->with('success','Notice created !!!');
    }

    public function edit(Notice $notice)
    {
        return view('admin.notices.edit',compact('notice'));
    }

    public function update(Notice $notice, Request $request)
    {
        $notice->update($request->all());
        return redirect()->route('notices.index')->with('success','Notice updated !!!');
    }

    public function destroy(Notice $notice)
    {
        $notice->delete();
        return redirect()->route('notices.index')->with('success','Notice deleted !!!');
    }
}
