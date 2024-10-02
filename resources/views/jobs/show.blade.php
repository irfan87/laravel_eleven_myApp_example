<x-layout>
	<x-slot:title>
		Job
	</x-slot>
	<p>
		<h1 class="font-bold text-lg">{{ $job->title }}</h1>
		<strong>Salary: RM{{ $job->salary }} per year</strong>
	</p>
	<p class="mt-6">
		<x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
	</p>
</x-layout>