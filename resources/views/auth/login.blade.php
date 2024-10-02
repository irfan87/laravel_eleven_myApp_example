<x-layout>
	<x-slot:title>
		Log In
	</x-slot>
	<form method="POST" action="/login">
		@csrf
		<div class="space-y-12">
			<div class="border-b border-gray-900/10 pb-12">
				{{-- @if($errors->any())
					<div class="my-2">
						<ul>
							@foreach ($errors->all() as $error)
							<li class="text-red-500 italic">{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif --}}
				<div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
					<x-form-field class="sm:col-span-4">
						<x-form-label for="email">Email Address</x-form-label>
						<x-form-input name="email" id="email" type="email" placeholder="What is your email address?" required />
						<x-form-error name='email' />
					</x-form-field>
					<x-form-field class="sm:col-span-4">
						<x-form-label for="password">Password</x-form-label>
						<x-form-input name="password" id="password" type="password" required />
						<x-form-error name='password' />
					</x-form-field>
				</div>
			</div>
		</div>
		<div class="mt-6 flex items-center justify-end gap-x-6">
			<a href="/" class="text-sm font-semibold leading-6 text-gray-900">Home</a>
			<x-form-primary-button>Log In</x-form-primary-button>
		</div>
	</form>
</x-layout>