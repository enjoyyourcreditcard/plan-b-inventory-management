<?php

namespace App\Http\Controllers;

use App\Services\BuildService;
use App\Services\PartService;
use Illuminate\Http\Request;

class BuildController extends Controller
{
    public function __construct(BuildService $buildService, PartService $partService)
    {
        $this->buildService = $buildService;
        $this->partService = $partService;
    }

    public function index(){
        $build =  $this->buildService->handleAllBuild();
        $part = $this->partService->handleAllPart();
        $buildString = $this->buildService->handleArrayToStringBuild();
        return view('builds.build', [
            'build' => $build,
            'part' => $part,
            'buildString' => $buildString,
            'groupedBuild' => $build->groupBy('name')
        ]);
    }

    public function store(Request $request){
        $this->buildService->handleStoreBuild($request);
        return redirect('build');
    }

    public function update(Request $request, $id){
        $build = $this->buildService->handleUpdateBuild($request, $id);
        // return redirect('/build', compact('build'));
        return redirect()->back();
    }

    public function delete($id){
        $this->buildService->handleDeleteBuild($id);
        return redirect('build');

    }
}
