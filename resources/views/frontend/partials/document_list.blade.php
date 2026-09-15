{{-- Expects $documents (collection with ->title, ->files, ->created_at) --}}
@if($documents->count())
    <div class="row gy-3">
        @foreach($documents as $doc)
            <div class="col-12">
                <div class="flex-between gap-16 flex-wrap p-24 bg-white rounded-12 border border-neutral-30">
                    <div class="flex-align gap-16">
                        <span class="w-52 h-52 bg-main-25 text-main-600 flex-center rounded-circle text-2xl flex-shrink-0">
                            <i class="ph-bold ph-file-pdf"></i>
                        </span>
                        <div>
                            <h6 class="mb-4">{{ $doc->title }}</h6>
                            <span class="text-neutral-500 text-sm">{{ $doc->created_at->format('d M, Y') }}</span>
                        </div>
                    </div>
                    <a href="{{ asset($doc->files) }}" target="_blank" class="btn btn-outline-main rounded-pill flex-align gap-8">
                        <i class="ph-bold ph-download-simple"></i> Download
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="text-center py-40">
        <p class="text-neutral-500 mb-0">No documents published yet. Please check back soon.</p>
    </div>
@endif
