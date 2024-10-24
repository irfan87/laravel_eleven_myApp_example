<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);
        // $jobs = Job::with('employer')->cursorPaginate(3);

        return view("jobs.index", [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store()
    {
        // validation...
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'numeric', 'min:100']
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        return redirect('/jobs');
    }

    public function show(Job $job)
    {
        // $job = Job::find($id);

        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Job $job)
    {
        // $job = Job::find($id);

        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        // validate the request
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'numeric']
        ]);

        // authorize - soon =)

        // update the job and persist
        // $job = Job::findOrFail($id);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        // redirect to the job detail
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        // authorize - coming soon....
        // delete the job
        // $job = Job::findOrFail($id);

        $job->delete();

        // Job::findOrFail($id)->delete();

        // redirect 
        return redirect('/jobs');
    }
}
