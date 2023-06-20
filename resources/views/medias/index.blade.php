@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <div class="d-flex align-items-baseline justify-content-between">
                <h2 class="mb-4 h5">{{ __('Medias') }}</h2>
                <a href="{{ route('medias.create') }}" type="button" class="btn btn-primary">Create Media</a>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="border-gray-200">{{ __('Name') }}</th>
                        <th class="border-gray-200">{{ __('User') }}</th>
                        <th class="border-gray-200">{{ __('Link') }}</th>
                        <th class="border-gray-200">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($medias as $media)
                        <tr>
                            <td><span class="fw-normal">{{ $media->name ?? '-' }}</span></td>
                            <td><span class="fw-normal">{{ $media->user->name }}</span></td>
                            <td>
                                <span class="fw-normal">
                                    <a href="{{ $media->file_url }}" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="{{ $media->file }}" target="_blank">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-link copy-icon" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Copy" data-clipboard-text="{{ $media->file_url }}"
                                        onclick="copyToClipBoard(this)">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <form class="mx-2" action="{{ route('medias.destroy', ['media' => $media->id]) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
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
                {{ $medias->links() }}
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        function copyToClipBoard(element) {
            var text = element.getAttribute("data-clipboard-text");

            console.log(text);

            navigator.clipboard.writeText(text);
        }
    </script>
@endsection
