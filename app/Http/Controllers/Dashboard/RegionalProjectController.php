<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegionalProject\StoreRequest;
use App\Models\County;
use App\Models\ProjectCategory;
use App\Models\RegionalProject;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RegionalProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = RegionalProject::where('organization_id', auth()->user()->organization_id)->paginate(16)->withQueryString();

        return Inertia::render('AdminOng/Projects/Projects', [
            'query' => $projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('AdminOng/Projects/AddRegionalProject', [
            'counties' => $this->getCounties(),
            'projectCategories' => $this->getProjectCategories(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $project = (new ProjectService(RegionalProject::class))->create($data);
        $project->addAllMediaFromRequest()->each(function ($fileAdder) {
            $fileAdder->toMediaCollection('regionalProjectFiles');
        });

        return redirect()->route('dashboard.projects.edit', $project->id)->with('success', 'Project created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegionalProject $project)
    {
//        $this->authorize('view', $project);
        $project->load('media');

        return Inertia::render('AdminOng/Projects/EditRegionalProject', [
            'project' => $project,
            'counties' => County::get(['name', 'id']),
            'projectCategories' => ProjectCategory::get(['name', 'id']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegionalProject $project)
    {
//        $this->authorize('editAsNgo', $project);;
        if ($request->has('counties')) {
            $project->counties()->sync(collect($request->get('counties'))->pluck('id'));
        }
        $project->update($request->all());

        return redirect()->back()
            ->with('success', 'Project updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function changeStatus(Request $request, string $id)
    {
        try {
            (new ProjectService(RegionalProject::class))->changeStatus($id, $request->get('status'));
        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage());
        }

        return redirect()->back()->with('success', 'Project status changed.');
    }
}
