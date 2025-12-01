<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KpiBonus;
use App\Models\KpiCriteria;
use App\Models\KpiScore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KpiController extends Controller
{
    //
    public function index()
    {
        $employees = User::where('role_id', 2)->get(); // ví dụ role = 2 là nhân viên
        // dd($employees);

        return view('admin.pages.kpi', compact('employees'));
    }

    public function create(User $user)
    {
        $criteria = KpiCriteria::all();

        return view('admin.pages.kpi-create', compact('user', 'criteria'));
    }

    // Trang view.kpi để xem KPI theo nhân viên
    public function view(Request $request, User $user)
    {
        $query = KpiScore::where('user_id', $user->id)
            ->with(['criteria', 'rater']);

        if ($request->period) {
            $query->where('period', $request->period);
        }

        $scores = $query->orderBy('created_at', 'desc')->get();

        return view('admin.pages.kpi-view', compact('user', 'scores'));
    }

    public function store(Request $request)
    {
        // Validate period và user_id
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'period' => 'required|date_format:Y-m',
        ]);

        $criteria = KpiCriteria::all();

        // Validate điểm của từng tiêu chí
        foreach ($criteria as $c) {

            $scoreInput = $request->scores[$c->id] ?? null;

            if ($scoreInput === null) {
                return back()->withErrors([
                    "scores.$c->id" => "Bạn phải nhập điểm cho tiêu chí: $c->name",
                ])->withInput();
            }

            if ($scoreInput > $c->max_score) {
                return back()->withErrors([
                    "scores.$c->id" => "Điểm nhập cho tiêu chí '$c->name' không được vượt quá {$c->max_score} điểm.",
                ])->withInput();
            }
        }

        // Lưu KPI
        foreach ($criteria as $c) {
            KpiScore::create([
                'user_id' => $request->user_id,
                'criteria_id' => $c->id,
                'rated_by' => Auth::guard('admin')->id(),
                'score' => $request->scores[$c->id],
                'period' => $request->period,
                'note' => $request->note,
            ]);
        }

        return redirect()->route('kpi.index')->with('success', 'Chấm KPI thành công!');
    }

    public function annualBonus(User $user, Request $request)
    {
        $year = $request->year ?? date('Y');

        // Tổng điểm KPI trong năm
        $totalScores = KpiScore::where('user_id', $user->id)
            ->whereRaw('LEFT(period,4) = ?', [$year])
            ->sum('score');

        $maxMonthlyScore = KpiCriteria::sum('max_score');
        $maxYearScore = $maxMonthlyScore * 12;

        $percentage = $totalScores / $maxYearScore * 100;

        if ($percentage >= 90) {
            $bonus = 10000000;
        } elseif ($percentage >= 80) {
            $bonus = 5000000;
        } else {
            $bonus = 0;
        }

        // Cập nhật bảng kpi_bonus
        KpiBonus::updateOrCreate(
            ['user_id' => $user->id, 'year' => $year],
            ['total_score' => $totalScores, 'bonus_amount' => $bonus]
        );

        return view('admin.pages.kpi-annual', compact('user', 'year', 'totalScores', 'maxYearScore', 'bonus'));
    }
}
