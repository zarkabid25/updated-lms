<label>Sub Subjects</label>
<select class="form-control" name="sub_subject" id="sub_subject">
    <option selected disabled>Select Sub Subject</option>
    @forelse($sub_subjects as $sub_subject)
        <option value="{{ $sub_subject->id }}">{{ ucfirst($sub_subject->sub_subject_name) }}</option>
    @empty
    @endforelse
</select>
