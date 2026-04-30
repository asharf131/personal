<textarea {{ $attributes->merge([
    'class' => 'w-full border-gray-300 rounded mt-1'
]) }}>{{ $slot }}</textarea>