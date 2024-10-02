<x-layout>
	<x-slot:title>
			Jobs Board
	</x-slot>
	<div class="space-y-4">
		@foreach ($jobs as $job)
			<a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
				<div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
				<div>
					<h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
				</div>
				<small class="text-sm font-thin">Salary: RM{{ $job['salary'] }}</small>
			</a>
		@endforeach
		<div>
			{{ $jobs->links() }}
		</div>
	</div>
</x-layout>