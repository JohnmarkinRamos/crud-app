@php
    $selectedSubjectIds = $selectedSubjectIds ?? [];
@endphp

<details class="dropdown-select">
    <summary>
        <span class="dropdown-select-placeholder">
            {{ count($selectedSubjectIds) ? count($selectedSubjectIds) . ' subject(s) selected' : 'Choose subjects' }}
        </span>
    </summary>
    <div class="dropdown-select-panel">
        @forelse($subjects as $subject)
            <label class="dropdown-select-option">
                <input
                    type="checkbox"
                    name="subjects[]"
                    value="{{ $subject->id_subjectname }}"
                    {{ in_array($subject->id_subjectname, $selectedSubjectIds) ? 'checked' : '' }}
                >
                <span>{{ $subject->subject_name }}</span>
            </label>
        @empty
            <div class="dropdown-select-option">No subjects available</div>
        @endforelse
    </div>
</details>