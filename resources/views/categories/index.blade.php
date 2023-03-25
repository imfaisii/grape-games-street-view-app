@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <div class="d-flex align-items-baseline justify-content-between">
                <h2 class="mb-4 h5">{{ __('Categories') }}</h2>
                <a href="{{ route('categories.create') }}" type="button" class="btn btn-primary">Create Category</a>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="border-gray-200">{{ __('Name') }}</th>
                        <th class="border-gray-200">{{ __('No. of locations') }}</th>
                        <th class="border-gray-200">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td><span class="fw-normal">{{ $category->name }}</span></td>
                            <td><span class="fw-normal">{{ $category->locations_count }}</span></td>
                            <td>
                                <div class="d-flex">
                                    <form class="mx-2" action="{{ route('categories.destroy', ['category' => $category->id]) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    <a href="{{ route('categories.edit', ['category' => $category->id]) }}"
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
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
