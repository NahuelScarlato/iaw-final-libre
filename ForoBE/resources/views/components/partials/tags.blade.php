@if (!empty($element->tags) && count($element->tags) > 0)
    <div class="text-start row gx-1 gy-1">
        @foreach ($element->tags as $index => $tag)
            <div class="col-auto xs-6 md-1 lg-3">
                @if (is_string($tag))
                    <span class="badge rounded-pill bg-warning">{{ $tag }}</span>
                @endif
            </div>
        @endforeach
    </div>
@endif
