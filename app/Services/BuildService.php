<?php

namespace App\Services;

use App\Models\Build;
use App\Models\Part;
use Illuminate\Http\Request;

class BuildService{

    public function __construct(Build $build, Part $part)
    {
        $this->build = $build;
        $this->part = $part;
    }

    public function handleAllBuild(){
       $build = $this->build->with('part')->get();
       return($build);
    }

    public function handleStoreBuild(Request $request){
        $validatedData = $request->validate([
            'name' => 'required'
        ]);
        // $validatedData['part_id'];
        foreach($request->part_id as $part_id) {
            $validatedData['part_id'] = $part_id;
            $build = Build::create($validatedData);
        }
        return($build);
    }

    public function handleUpdateBuild(Request $request, $id){
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required'
        ]);
        $buildName = $this->build->where('id', $request->id)->first()->name;
        $builds = $this->build->where('name', $buildName)->get();
        foreach($builds as $build) {
            $build->delete();
        }
        foreach($request->part_id as $part_id) {
            $validatedData['part_id'] = $part_id; 
            $this->build->create($validatedData);
        }
        return('Build has been stored');
    }

    public function handleDeleteBuild($id){
        $buildName = $this->build::find($id)->name;
        $builds = $this->build->where('name', $buildName)->get();
        foreach($builds as $build){
            $build->delete();
        }
        return($builds);
    }

    public function handleArrayToStringBuild() {
        $builds = $this->build->with('part')->get()->groupBy('name');
        if (count($builds) == 0) {
            $buildString = '';
        }else{
            $array = [];
            foreach($builds as $key1 => $build) {
                foreach($build as $key2 => $data) {
                    $array[$key1][$key2] = $data->part_id;
                    $buildString[$key1] = implode(', ', $array[$key1]);
                }
            }
        }
        return($buildString);
    }
}