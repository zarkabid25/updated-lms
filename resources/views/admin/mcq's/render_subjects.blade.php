<label>Subjects</label>
<select class="form-control subjectt" name="subject">
    <option selected disabled>Select Subject</option>
    @forelse($subjects as $subject)
        <option value="{{ $subject->id }}">{{ ucfirst($subject->subject_name) }}</option>
    @empty
    @endforelse
</select>
