<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a dashboard of the stock.
     *
     * @return \Illuminate\Http\Response
     */
    public function stock()
    {
        try {
            $dummy = 170;

            return view("dashboard.stock", [
                'dummy' => $dummy
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
 
    /**
     * Display a dashboard of the inbound.
     *
     * @return \Illuminate\Http\Response
     */
    public function inbound()
    {
        try {
            return view("dashboard.inbound");
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
 
    /**
     * Display a dashboard of the outbound.
     *
     * @return \Illuminate\Http\Response
     */
    public function outbound()
    {
        try {
            return view("dashboard.outbound");
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
 
    /**
     * Display a dashboard of the build.
     *
     * @return \Illuminate\Http\Response
     */
    public function build()
    {
        try {
            return view("dashboard.build");
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
 
    /**
     * Display a dashboard of the warehouse.
     *
     * @return \Illuminate\Http\Response
     */
    public function warehouse()
    {
        try {
            return view("dashboard.warehouse");
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
}
