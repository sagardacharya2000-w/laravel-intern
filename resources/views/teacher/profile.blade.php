<x-layouts.teacher>

    <x-slot:title>Profile — Online Siksha</x-slot:title>
    <x-slot:page_title>My Account</x-slot:page_title>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;">

        {{-- Left: Edit Profile --}}
        <div class="panel">
            <div class="panel-header">
                <h3>Edit Profile</h3>
            </div>
            <div style="padding:24px;">

                {{-- Avatar --}}
                <div style="display:flex;align-items:center;gap:16px;margin-bottom:24px;">
                    <div style="
                        width:56px;height:56px;
                        background:#eef2ff;
                        border-radius:50%;
                        display:flex;align-items:center;justify-content:center;
                        font-family:'Sora',sans-serif;
                        font-size:20px;font-weight:800;
                        color:#4338ca;flex-shrink:0;
                    ">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <div style="font-size:15px;font-weight:700;color:#111827;">
                            {{ auth()->user()->name }}
                        </div>
                        <div style="font-size:13px;color:#9ca3af;">
                            {{ auth()->user()->email }}
                        </div>
                    </div>
                </div>

                <form method="POST" action="#">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-input"
                            value="{{ auth()->user()->name }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-input"
                            value="{{ auth()->user()->email }}"
                            required
                        >
                    </div>

                    <div class="form-actions" style="justify-content:flex-start;">
                        <button type="submit" class="btn-primary">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Right: Change Password --}}
        <div class="panel">
            <div class="panel-header">
                <h3>Change Password</h3>
            </div>
            <div style="padding:24px;">
                <form method="POST" action="#">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input
                            type="password"
                            name="current_password"
                            id="current_password"
                            class="form-input"
                            placeholder="Enter current password"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input
                            type="password"
                            name="new_password"
                            id="new_password"
                            class="form-input"
                            placeholder="Enter new password"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="new_password_confirmation">Confirm New Password</label>
                        <input
                            type="password"
                            name="new_password_confirmation"
                            id="new_password_confirmation"
                            class="form-input"
                            placeholder="Re-enter new password"
                            required
                        >
                    </div>

                    <div class="form-actions" style="justify-content:flex-start;">
                        <button type="submit" class="btn-primary">
                            Update Password
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    {{-- Classes You Teach (read only, dummy for now) --}}
    <div class="panel" style="margin-top:24px;">
        <div class="panel-header">
            <h3>Classes You Teach</h3>
        </div>
        <div style="padding:24px;display:flex;flex-direction:column;gap:14px;">

            {{-- dummy row — backend will replace with real classes --}}
            <div style="display:flex;align-items:center;gap:16px;">
                <div style="
                    width:44px;height:44px;
                    background:#eef2ff;border-radius:12px;
                    display:flex;align-items:center;justify-content:center;
                    flex-shrink:0;
                ">
                    <i class="ti ti-school" style="font-size:20px;color:#4338ca;"></i>
                </div>
                <div>
                    <div style="font-size:15px;font-weight:700;color:#111827;">
                        abc — Grade 11
                    </div>
                    <div style="font-size:13px;color:#6b7280;margin-top:2px;">
                        Class Code:
                        <code style="background:#eef2ff;color:#4338ca;padding:2px 8px;border-radius:6px;">
                            F8DF86A8
                        </code>
                    </div>
                </div>
                <span class="badge badge-green" style="margin-left:auto;">Active</span>
            </div>

            <div style="display:flex;align-items:center;gap:16px;">
                <div style="
                    width:44px;height:44px;
                    background:#eef2ff;border-radius:12px;
                    display:flex;align-items:center;justify-content:center;
                    flex-shrink:0;
                ">
                    <i class="ti ti-school" style="font-size:20px;color:#4338ca;"></i>
                </div>
                <div>
                    <div style="font-size:15px;font-weight:700;color:#111827;">
                        teacher2 — Grade 12
                    </div>
                    <div style="font-size:13px;color:#6b7280;margin-top:2px;">
                        Class Code:
                        <code style="background:#eef2ff;color:#4338ca;padding:2px 8px;border-radius:6px;">
                            w3heb4
                        </code>
                    </div>
                </div>
                <span class="badge badge-green" style="margin-left:auto;">Active</span>
            </div>

        </div>
    </div>

</x-layouts.teacher>
