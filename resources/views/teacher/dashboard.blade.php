@extends('layouts.app')

@section('title', 'Teacher Dashboard — Online Siksha')

@section('styles')
<style>
    body { background: #f0f4f8; }

    .dash-wrap {
        max-width: 1200px;
        margin: 0 auto;
        padding: 36px 24px;
    }

    /* ── Header ── */
    .dash-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 32px;
    }
    .dash-title {
        font-size: 24px;
        font-weight: 700;
        color: #1a1a2e;
        margin-bottom: 4px;
    }
    .dash-sub {
        font-size: 14px;
        color: #64748b;
    }
    .btn-primary {
        padding: 10px 20px;
        background: #185FA5;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .btn-primary:hover { background: #1251891; filter: brightness(1.1); }

    /* ── Stat Cards ── */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-bottom: 28px;
    }
    .stat-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px 22px;
        box-shadow: 0 1px 3px rgba(0,0,0,.06), 0 4px 12px rgba(0,0,0,.04);
        display: flex;
        align-items: center;
        gap: 14px;
        border: 1px solid #e2e8f0;
    }
    .stat-icon {
        width: 48px; height: 48px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        flex-shrink: 0;
        font-size: 22px;
    }
    .stat-icon.blue   { background: #e6f1fb; color: #185FA5; }
    .stat-icon.green  { background: #d1fae5; color: #059669; }
    .stat-icon.amber  { background: #fef3c7; color: #d97706; }
    .stat-icon.purple { background: #ede9fe; color: #7c3aed; }
    .stat-value { font-size: 28px; font-weight: 700; color: #1a1a2e; line-height: 1; }
    .stat-label { font-size: 13px; color: #64748b; margin-top: 4px; }

    /* ── Cards ── */
    .card {
        background: #fff;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 1px 3px rgba(0,0,0,.06);
        overflow: hidden;
        margin-bottom: 20px;
    }
    .card-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px 22px;
        border-bottom: 1px solid #e2e8f0;
    }
    .card-title {
        font-size: 15px;
        font-weight: 600;
        color: #1a1a2e;
    }
    .card-link {
        font-size: 13px;
        color: #185FA5;
        text-decoration: none;
        font-weight: 500;
    }

    /* ── Two col ── */
    .two-col {
        display: grid;
        grid-template-columns: 1fr 360px;
        gap: 20px;
        margin-bottom: 20px;
    }

    /* ── Classes grid ── */
    .classes-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
        padding: 16px 22px;
    }
    .class-card {
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 14px 16px;
        transition: border-color .2s, box-shadow .2s;
    }
    .class-card:hover {
        border-color: #185FA5;
        box-shadow: 0 0 0 3px #e6f1fb;
    }
    .class-name  { font-size: 14px; font-weight: 600; color: #1a1a2e; margin-bottom: 6px; }
    .class-count { font-size: 12px; color: #64748b; }
    .class-count strong { color: #1a1a2e; }

    /* ── Attempts ── */
    .attempt-list { padding: 0 22px 8px; }
    .attempt-row {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 0;
        border-bottom: 1px solid #f1f5f9;
    }
    .attempt-row:last-child { border-bottom: none; }
    .avatar {
        width: 36px; height: 36px;
        border-radius: 50%;
        background: #e6f1fb;
        color: #185FA5;
        font-weight: 700;
        font-size: 13px;
        display: grid;
        place-items: center;
        flex-shrink: 0;
    }
    .attempt-name { font-size: 13px; font-weight: 600; color: #1a1a2e; }
    .attempt-meta { font-size: 12px; color: #64748b; margin-top: 2px; }
    .attempt-info { flex: 1; min-width: 0; }

    .badge {
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        flex-shrink: 0;
    }
    .badge-submitted { background: #d1fae5; color: #065f46; }
    .badge-timed_out { background: #fee2e2; color: #991b1b; }
    .badge-pending   { background: #fef3c7; color: #92400e; }

    /* ── Empty ── */
    .empty {
        padding: 40px;
        text-align: center;
        color: #94a3b8;
        font-size: 14px;
    }
    .empty i { font-size: 36px; display: block; margin-bottom: 10px; opacity: .5; }

    @media (max-width: 1024px) {
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
        .two-col { grid-template-columns: 1fr; }
        .classes-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 640px) {
        .stats-grid { grid-template-columns: 1fr 1fr; }
        .classes-grid { grid-template-columns: 1fr; }
        .dash-header { flex-direction: column; gap: 16px; }
    }
</style>
@endsection

@section('content')
<div class="dash-wrap">

    {{-- Header --}}
    <div class="dash-header">
        <div>
            <h1 class="dash-title">
                Good {{ now()->hour < 12 ? 'morning' : (now()->hour < 18 ? 'afternoon' : 'evening') }},
                {{ explode(' ', $teacher->name)[0] }} 👋
            </h1>
            <p class="dash-sub">{{ now()->format('l, F j, Y') }} · Teacher Dashboard</p>
        </div>
        <a href="/admin" class="btn-primary">
            <i class="ti ti-layout-dashboard"></i> Admin Panel
        </a>
    </div>

    {{-- Stat Cards --}}
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon blue">
                <i class="ti ti-users"></i>
            </div>
            <div>
                <div class="stat-value">{{ $totalStudents }}</div>
                <div class="stat-label">Total Students</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon green">
                <i class="ti ti-school"></i>
            </div>
            <div>
                <div class="stat-value">{{ $totalClasses }}</div>
                <div class="stat-label">My Classes</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon amber">
                <i class="ti ti-clock"></i>
            </div>
            <div>
                <div class="stat-value">{{ $pendingExams }}</div>
                <div class="stat-label">Active Exams</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon purple">
                <i class="ti ti-checkbox"></i>
            </div>
            <div>
                <div class="stat-value">{{ $totalQuestionSets }}</div>
                <div class="stat-label">Question Sets</div>
            </div>
        </div>
    </div>

    {{-- Classes + Recent Attempts --}}
    <div class="two-col">

        {{-- My Classes --}}
        <div class="card">
            <div class="card-head">
                <span class="card-title">My Classes</span>
            </div>
            @if($classes->isEmpty())
                <div class="empty">
                    <i class="ti ti-school-off"></i>
                    No classes assigned yet.
                </div>
            @else
            <div class="classes-grid">
                @foreach($classes as $class)
                <div class="class-card">
                    <div class="class-name">{{ $class->name }}</div>
                    <div class="class-count"><strong>{{ $class->students_count }}</strong> students enrolled</div>
                </div>
                @endforeach
            </div>
            @endif
        </div>

        {{-- Recent Attempts --}}
        <div class="card">
            <div class="card-head">
                <span class="card-title">Recent Attempts</span>
            </div>
            @if($recentAttempts->isEmpty())
                <div class="empty">
                    <i class="ti ti-clipboard-off"></i>
                    No attempts yet.
                </div>
            @else
            <div class="attempt-list">
                @foreach($recentAttempts as $attempt)
                <div class="attempt-row">
                    <div class="avatar">
                        {{ strtoupper(substr($attempt->student->name ?? 'S', 0, 2)) }}
                    </div>
                    <div class="attempt-info">
                        <div class="attempt-name">{{ $attempt->student->name ?? 'Student' }}</div>
                        <div class="attempt-meta">
                            {{ Str::limit($attempt->questionSet->title ?? '—', 28) }}
                            · {{ $attempt->score }}/{{ $attempt->total_marks }}
                            · {{ $attempt->submitted_at ? \Carbon\Carbon::parse($attempt->submitted_at)->diffForHumans() : '—' }}
                        </div>
                    </div>
                    <span class="badge badge-{{ $attempt->status }}">
                        {{ ucfirst(str_replace('_', ' ', $attempt->status)) }}
                    </span>
                </div>
                @endforeach
            </div>
            @endif
        </div>

    </div>

</div>
@endsection