<x-student>
    <x-slot name="title">Enroll Class — Online Siksha</x-slot>
    <x-slot name="pageTitle">Enroll Class</x-slot>

    {{-- Currently Enrolled Class --}}
    <div class="panel" style="margin-bottom: 28px;">
        <div class="panel-header">
            <h3>My Enrolled Class</h3>
        </div>
        <div style="padding: 24px;">
            @if ($enrolledClass)
                <div style="display:flex;align-items:center;gap:16px;">
                    <div
                        style="width:48px;height:48px;background:#eef2ff;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="ti ti-school" style="font-size:22px;color:#4338ca;"></i>
                    </div>
                    <div>
                        <div style="font-size:16px;font-weight:700;color:#111827;">
                            {{ $enrolledClass->name }}
                        </div>
                        <div style="font-size:13px;color:#6b7280;margin-top:2px;">
                            Class Code:
                            <code
                                style="background:#eef2ff;color:#4338ca;padding:2px 8px;border-radius:6px;font-size:13px;">
                                {{ $enrolledClass->class_code }}
                            </code>
                        </div>
                    </div>
                    <span class="badge badge-green" style="margin-left:auto;">Enrolled</span>
                </div>
            @else
                <div class="empty-state">
                    You're not enrolled in any class yet. Use the form below to join one.
                </div>
            @endif
        </div>
    </div>

    {{-- Enroll In A New Class --}}
    <div class="panel">
        <div class="panel-header">
            <h3>Join a New Class</h3>
        </div>
        <div style="padding: 24px; max-width: 480px;">
            <p style="font-size:14px;color:#6b7280;margin-bottom:20px;">
                Enter the class code given by your teacher or admin to enroll.
            </p>
            <form method="POST" action="{{ route('student.courses.enroll') }}">
                @csrf
                <div class="form-group">
                    <label for="class_code">Class Code</label>
                    <input type="text" name="class_code" id="class_code" class="form-input"
                        value="{{ old('class_code') }}" placeholder="e.g. G10A2026" required>
                    @error('class_code')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-actions" style="justify-content:flex-start;">
                    <button type="submit" class="btn-primary">
                        <i class="ti ti-key"></i> Enroll Now
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-student>
