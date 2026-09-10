<!-- Section 9: Institutional Multi-Column Footer -->
<footer class="bg-navy-950 border-t border-navy-800 pt-16 pb-12 text-slate-400 text-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-navy-800">
            
            <!-- Brand & Corporate Identity -->
            <div class="lg:col-span-2">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-teal-400 to-amber-500 flex items-center justify-center shadow-lg shadow-teal-500/20">
                        <span class="text-navy-950 font-black text-sm">NB</span>
                    </div>
                    <span class="text-lg font-extrabold text-white tracking-tight">NileBridge Global Services</span>
                </div>
                <p class="text-slate-400 text-xs leading-relaxed max-w-sm mb-6">
                    Uganda's premier enterprise delivery center specializing in 24/7 Omnichannel Call Centers, Fintech & Payment Processing Operations, and dedicated remote engineering.
                </p>
                <div class="flex flex-wrap items-center gap-2 text-slate-400">
                    <span class="inline-flex items-center px-2.5 py-1 rounded bg-navy-900 border border-navy-800 text-[10px] font-mono text-amber-400 font-semibold">PCI-DSS Level 1</span>
                    <span class="inline-flex items-center px-2.5 py-1 rounded bg-navy-900 border border-navy-800 text-[10px] font-mono text-teal-400 font-semibold">SOC2 Type II</span>
                    <span class="inline-flex items-center px-2.5 py-1 rounded bg-navy-900 border border-navy-800 text-[10px] font-mono text-teal-400 font-semibold">GDPR Compliant</span>
                    <span class="inline-flex items-center px-2.5 py-1 rounded bg-navy-900 border border-navy-800 text-[10px] font-mono text-teal-400 font-semibold">ISO 27001</span>
                </div>
            </div>

            <!-- Solutions Column -->
            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-white mb-4">Core Divisions</h4>
                <ul class="space-y-2.5">
                    <li><a href="#services" class="hover:text-amber-400 transition">24/7 Call Center & BPO</a></li>
                    <li><a href="#services" class="hover:text-amber-400 transition">Fintech & Payment Processing</a></li>
                    <li><a href="#services" class="hover:text-teal-400 transition">Software & Cloud Engineering</a></li>
                    <li><a href="#services" class="hover:text-teal-400 transition">Finance & Accounting Ops</a></li>
                    <li><a href="#calculator" class="hover:text-amber-400 transition text-amber-400 font-semibold">ROI Calculator</a></li>
                </ul>
            </div>

            <!-- Global Hubs -->
            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-white mb-4">Global Operations</h4>
                <ul class="space-y-2.5">
                    <li><strong class="text-amber-400">Kampala, UG:</strong> Flagship BPO & Fintech Hub</li>
                    <li><strong class="text-slate-200">New York, US:</strong> Strategic Accounts</li>
                    <li><strong class="text-slate-200">London, UK:</strong> EMEA Operations</li>
                    <li><strong class="text-slate-200">Dubai, UAE:</strong> Capital Markets & MENA</li>
                </ul>
            </div>

            <!-- Governance & Auth -->
            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-white mb-4">Enterprise Portals</h4>
                <ul class="space-y-2.5">
                    <li><a href="{{ route('login') }}" class="hover:text-teal-400 transition">Client Operations Portal</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-teal-400 transition">Staff & Agent Workspace</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-teal-400 transition">Executive Administration</a></li>
                    <li><span class="text-slate-600">Enterprise SLA v4.2</span></li>
                </ul>
            </div>

        </div>

        <!-- Sub-Footer -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-slate-500 text-[11px]">
            <div>
                &copy; {{ date('Y') }} NileBridge Global Services Ltd. All rights reserved.
            </div>
            <div class="flex items-center space-x-6">
                <a href="#" class="hover:text-slate-400 transition">Privacy Policy</a>
                <a href="#" class="hover:text-slate-400 transition">Terms of Service</a>
                <a href="#" class="hover:text-slate-400 transition">Security Disclosure</a>
                <a href="#" class="hover:text-slate-400 transition">Subprocessors</a>
            </div>
        </div>
    </div>
</footer>

