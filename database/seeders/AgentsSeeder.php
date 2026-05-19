<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class AgentsSeeder extends Seeder
{
    public function run(): void
    {
        $category = config('agents.category', env('AGENTS_CATEGORY', 'Agent'));

        Product::insertOrIgnore([
            [
                'name'            => 'Bid & Tender Response',
                'product_code'    => 'AGNT-BTR-01',
                'vendor'          => 'ApiSpi',
                'category'        => $category,
                'description'     => 'Automates government RFQ/RFT responses, selection criteria, and capability statements. Cuts response time from days to hours with structured, compliant output ready for submission.',
                'price'           => 149.00,
                'duration_months' => 12,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'name'            => 'Security & IRAP Readiness',
                'product_code'    => 'AGNT-SIR-01',
                'vendor'          => 'ApiSpi',
                'category'        => $category,
                'description'     => 'Guides organisations through Essential Eight, ISM, PSPF, IRAP, ISO 27001, and cloud security frameworks. Generates gap assessments, remediation plans, and evidence packs.',
                'price'           => 199.00,
                'duration_months' => 12,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'name'            => 'Digital Avatar & Executive Clone',
                'product_code'    => 'AGNT-DAE-01',
                'vendor'          => 'ApiSpi',
                'category'        => $category,
                'description'     => 'AI-powered professional avatars for executives, consultants, and trainers with voice cloning. Deliver personalised video messages, training content, and client briefings at scale.',
                'price'           => 299.00,
                'duration_months' => 12,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'name'            => 'Contract Review & Red-Flagging',
                'product_code'    => 'AGNT-CRF-01',
                'vendor'          => 'ApiSpi',
                'category'        => $category,
                'description'     => 'Reviews contracts for risky clauses, missing terms, and compliance issues. Highlights red flags with plain-English summaries and suggests standard remediation language.',
                'price'           => 129.00,
                'duration_months' => 12,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'name'            => 'Meeting Minutes & Action Items',
                'product_code'    => 'AGNT-MMA-01',
                'vendor'          => 'ApiSpi',
                'category'        => $category,
                'description'     => 'Transcribes meeting recordings and generates structured minutes, decision logs, and prioritised action items with owners and deadlines — ready to share in seconds.',
                'price'           => 79.00,
                'duration_months' => 12,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'name'            => 'Document Intelligence',
                'product_code'    => 'AGNT-DOC-01',
                'vendor'          => 'ApiSpi',
                'category'        => $category,
                'description'     => 'Extracts, classifies, and summarises key information from PDFs, reports, and scanned documents. Supports bulk ingestion with structured JSON output for downstream automation.',
                'price'           => 99.00,
                'duration_months' => 12,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
        ]);
    }
}
