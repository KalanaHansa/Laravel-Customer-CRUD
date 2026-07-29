@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Customer Details</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr><th width="200">Name</th><td>{{ $customer->name }}</td></tr>
            <tr><th>Email</th><td>{{ $customer->email }}</td></tr>
            <tr><th>Phone</th><td>{{ $customer->phone ?? 'N/A' }}</td></tr>
            <tr><th>Address</th><td>{{ $customer->address ?? 'N/A' }}</td></tr>
            <tr><th>Status</th>
                <td>
                    <span class="badge bg-{{ $customer->status == 'active' ? 'success' : 'secondary' }}">
                        {{ ucfirst($customer->status) }}
                    </span>
                </td>
            </tr>
            <tr><th>Created At</th><td>{{ $customer->created_at->format('d M Y, h:i A') }}</td></tr>
        </table>
        <a href="{{ route('customers.index') }}" class="btn btn-primary">Back to List</a>
    </div>
</div>
@endsection