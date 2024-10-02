<x-layout>
	<x-slot:title>
		Create Job
	</x-slot>
	<form method="POST" action="/jobs">
		@csrf
		<div class="space-y-12">
			<div class="border-b border-gray-900/10 pb-12">
				<h2 class="text-base font-semibold leading-7 text-gray-900">Create a New Job</h2>
				<p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful detail from you.</p>
				{{-- @if($errors->any())
					<div class="my-2">
						<ul>
							@foreach ($errors->all() as $error)
							<li class="text-red-500 italic">{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif --}}
				<div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
					<x-form-field class="sm:col-span-4">
						<x-form-label for="title">Title</x-form-label>
						<x-form-input name="title" id="title" placeholder="Web Developer" required />
						<x-form-error name='title' />
					</x-form-field>
					<x-form-field class="sm:col-span-4">
						<x-form-label for="salary">Job Salary (RM)</x-form-label>
						<x-form-input name="salary" id="title" placeholder="500000" required />
						<x-form-error name='salary' />
					</x-form-field>
				</div>
			</div>
		</div>
		<div class="mt-6 flex items-center justify-end gap-x-6">
			<x-form-danger-button>Cancel</x-form-danger-button>
			<x-form-primary-button>Save</x-form-primary-button>
		</div>
	</form>
</x-layout>