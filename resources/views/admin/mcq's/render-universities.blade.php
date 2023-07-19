<label for="">Universities</label>
<select class="form-control" name="uni">
    <option selected disabled>Select Test Type</option>
    @forelse($universities as $university)
        <option value="{{ $university->id }}">{{ ucwords($university->name) }}</option>
    @empty
    @endforelse
</select>
