@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <div class="d-flex align-items-baseline justify-content-between">
                <h2 class="mb-4 h5">{{ __('Locations') }}</h2>
                <a href="{{ route('locations.create') }}" type="button" class="btn btn-primary">Create Location</a>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="border-gray-200">{{ __('Title') }}</th>
                        <th class="border-gray-200">{{ __('Is Favorite?') }}</th>
                        <th class="border-gray-200">{{ __('Country') }}</th>
                        <th class="border-gray-200">{{ __('Category') }}</th>
                        <th class="border-gray-200">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($locations as $location)
                        <tr>
                            <td><span class="fw-normal">{{ $location->Title }}</span></td>
                            <td>
                                <span class="fw-normal">
                                    @if ($location->isFav)
                                        <span class="badge bg-success">Yes</span>
                                    @else
                                        <span class="badge bg-danger">No</span>
                                    @endif
                                </span>
                            </td>
                            <td><span class="fw-normal">{{ "{$location->city}, {$location->country}" }}</span></td>
                            <td><span class="fw-normal">{{ $location?->category?->name ?? 'Not found' }}</span></td>
                            <td>
                                <div class="d-flex">
                                    <form class="mx-2"
                                        action="{{ route('locations.destroy', ['location' => $location->id]) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    <a href="{{ route('locations.edit', ['location' => $location->id]) }}"
                                        class="btn btn-info btn-sm">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="6">No records found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div
                class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
                {{ $locations->links() }}
            </div>
        </div>
    </div>
@endsection
