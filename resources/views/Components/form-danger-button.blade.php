<button {{ $attributes->merge([
	'type'=>'button',
	'class' => "text-sm font-semibold leading-6 text-gray-900"
]) }}>{{ $slot }}</button>