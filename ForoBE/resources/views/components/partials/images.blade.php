@if (!empty($element->images) && count($element->images) > 0)
    <div>
        @foreach ($element->images as $index => $image)
            <div class="xs-6 lg-3 m-auto">
                @if (is_string($image))
                    <img class="xs-6 lg-3 img-fluid rounded mt-1 mb-2 mr-2" src="{{ $image }}" alt="cloudinary-{{ $index }}">
                @endif
            </div>
        @endforeach
    </div>
@endif
