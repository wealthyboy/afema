@extends('admin.layouts.app')


@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">User Information</h5>

                    <div>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-light me-2">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-light">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                    </div>
                </div>

                <div class="card-body px-4">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th class="w-25 text-muted">Code</th>
                                <td>{{ $user->code }}</td>
                            </tr>

                            <tr>
                                <th class="text-muted">Name</th>
                                <td>{{ $user->name }} {{ $user->last_name }}</td>
                            </tr>

                            <tr>
                                <th class="text-muted">Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>

                            <tr>
                                <th class="text-muted">Phone Number</th>
                                <td>{{ $user->phone_number }}</td>
                            </tr>

                            <tr>
                                <th class="text-muted">Verified</th>
                                <td>
                                    @if($user->verified)
                                    <span class="badge bg-success">Verified</span>
                                    @else
                                    <span class="badge bg-secondary">Pending</span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th class="text-muted">Permission</th>
                                <td>{{ ucfirst($user->permission) }}</td>
                            </tr>

                            <tr>
                                <th class="text-muted">Type</th>
                                <td>{{ ucfirst($user->type) }}</td>
                            </tr>

                            {{-- Password is intentionally omitted ‑‑ never display it --}}
                        </tbody>
                    </table>
                </div>

                <div class="card-footer text-end bg-white">
                    <small class="text-muted">
                        Last updated {{ $user->updated_at->diffForHumans() }}
                    </small>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection