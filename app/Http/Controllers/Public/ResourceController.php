<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ResourceController extends Controller
{
    /**
     * Dedicated interactive BPO Cost & Savings Calculator page.
     */
    public function calculator(): View
    {
        return view('pages.resources.calculator', [
            'title' => 'BPO Cost Calculator & ROI Modeling | NileBridge Global Services',
        ]);
    }

    /**
     * Comprehensive Enterprise BPO & Offshoring Guide.
     */
    public function bpoGuide(): View
    {
        return view('pages.resources.bpo-guide', [
            'title' => 'The Enterprise Guide to Offshoring & BPO in East Africa (2026) | NileBridge',
        ]);
    }

    /**
     * Enterprise Client Case Studies & Verified Results.
     */
    public function caseStudies(): View
    {
        return view('pages.resources.case-studies', [
            'title' => 'Client Case Studies & Verified ROI Metrics | NileBridge Global Services',
        ]);
    }

    /**
     * Strategic Insights, Research & Whitepapers.
     */
    public function insights(): View
    {
        return view('pages.resources.insights', [
            'title' => 'Industry Insights, BPO Research & Market Analysis | NileBridge Global Services',
        ]);
    }
}

