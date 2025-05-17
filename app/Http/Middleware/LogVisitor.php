<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;

class LogVisitor
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $today = Carbon::today();
            $ip = $request->ip();

            // Cek apakah sudah pernah tercatat hari ini
            $existing = DB::table('visitors')
                ->where('ip_address', $ip)
                ->whereDate('visited_at', $today)
                ->exists();

            if (!$existing) {
                $agent = new Agent();
                $agent->setUserAgent($request->userAgent());

                DB::table('visitors')->insert([
                    'ip_address' => $ip,
                    'user_agent' => $request->userAgent(),
                    'referrer' => $request->headers->get('referer'),
                    'device_type' => $agent->device(),
                    'browser' => $agent->browser(),
                    'visited_at' => Carbon::now(),
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Visitor logging failed: ' . $e->getMessage());
        }

        return $next($request);
    }
}
