<?php

namespace App\Http\Controllers\Admin\ContactUs;

use App\Http\Controllers\Controller;
use App\Models\ClientRequest;
use Illuminate\Http\Request;

class ClientRequestController extends Controller
{
    public function index()
    {
        $clientRequests = ClientRequest::latest()->simplePaginate(10);

        return view('admin.contact_us.client_requests', compact('clientRequests'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:50',
            'company' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'preferred_date' => 'required|date',
            'role' => 'required|string|max:100',
            'preferred_time' => 'required',
        ]);

        ClientRequest::create($request->only([
            'full_name', 'email', 'telephone', 'company',
            'subject', 'preferred_date', 'role', 'preferred_time',
        ]));

        return redirect()->route('admin.clients_requests.index')
            ->with('success', __('Client request created successfully.'));
    }

    public function show(ClientRequest $clientRequest)
    {
        //
    }

    public function edit(ClientRequest $clientRequest)
    {
        //
    }

    public function update(Request $request, ClientRequest $clientRequest)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:50',
            'company' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'preferred_date' => 'required|date',
            'role' => 'required|string|max:100',
            'preferred_time' => 'required',
        ]);

        $clientRequest->update($request->only([
            'full_name', 'email', 'telephone', 'company',
            'subject', 'preferred_date', 'role', 'preferred_time',
        ]));

        return redirect()->route('admin.clients_requests.index')
            ->with('success', __('Client request updated successfully.'));
    }

    public function destroy(ClientRequest $clientRequest)
    {
        $clientRequest->delete();

        return redirect()->route('admin.clients_requests.index')
            ->with('success', __('Client request deleted successfully.'));
    }
}
