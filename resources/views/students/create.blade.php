@extends('layouts.app')

@section('title', 'Add Student Collection — Ganesh Chaturthi 2026')

@section('content')

<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card card-custom p-4">
            <div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
                <h3 class="h4 fw-bold mb-0 text-primary">
                    <i class="bi bi-mortarboard-fill me-2"></i> Add Student Collection
                </h3>
                <a href="{{ route('students.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Back
                </a>
            </div>

            <form action="{{ route('students.store') }}" method="POST">
                @csrf

                <!-- Group Contribution Toggle -->
                <div class="mb-3 p-3 bg-light rounded border">
                    <div class="form-check form-switch mb-0">
                        <input class="form-check-input" type="checkbox" name="is_group" id="is_group" value="1" {{ old('is_group') ? 'checked' : '' }} onchange="toggleGroupMembers()">
                        <label class="form-check-label fw-bold" for="is_group">
                            <i class="bi bi-people-fill me-1 text-primary"></i> Group Contribution (Multiple students paid together)
                        </label>
                    </div>
                </div>

                <!-- Student / Group Name -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Student / Group Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter Student / Group Name" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Group Member Names (Optional) -->
                <div class="mb-3" id="group_members_field" style="{{ old('is_group') ? '' : 'display: none;' }}">
                    <label for="group_members" class="form-label fw-bold">Group Member Names</label>
                    <input type="text" name="group_members" id="group_members" class="form-control @error('group_members') is-invalid @enderror" value="{{ old('group_members') }}" placeholder="Enter Group Member Names (e.g. Rahul, Amit)">
                    <div class="form-text">Specify the names of students included in this group fund.</div>
                    @error('group_members')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Room Number -->
                <div class="mb-3">
                    <label for="room" class="form-label fw-bold">Room Number <span class="text-danger">*</span></label>
                    <input type="text" name="room" id="room" class="form-control @error('room') is-invalid @enderror" value="{{ old('room') }}" placeholder="Enter Room No." required>
                    @error('room')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Amount -->
                <div class="mb-3">
                    <label for="amount" class="form-label fw-bold">Collection Amount (₹) <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">₹</span>
                        <input type="number" step="1" min="0" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount', '1151') }}" placeholder="Enter Collection Amount" required>
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Collection Date -->
                <div class="mb-3">
                    <label for="collection_date" class="form-label fw-bold">Collection Date</label>
                    <input type="date" name="collection_date" id="collection_date" class="form-control @error('collection_date') is-invalid @enderror" value="{{ old('collection_date', date('Y-m-d')) }}">
                    @error('collection_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Notes -->
                <div class="mb-4">
                    <label for="notes" class="form-label fw-bold">Notes / Remarks</label>
                    <textarea name="notes" id="notes" rows="3" class="form-control @error('notes') is-invalid @enderror" placeholder="Enter Optional Notes / Remarks...">{{ old('notes') }}</textarea>
                    @error('notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('students.index') }}" class="btn btn-light border px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4 fw-bold">
                        <i class="bi bi-check-circle me-1"></i> Save Student Record
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
function toggleGroupMembers() {
    const isChecked = document.getElementById('is_group').checked;
    document.getElementById('group_members_field').style.display = isChecked ? 'block' : 'none';
}
</script>
@endpush
