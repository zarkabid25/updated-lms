@forelse($mcqsData as $rec)
<form action="" id="ques-{{$rec->id}}">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <label for="ques">Question Here:</label>
                    <input type="text" class="form-control" id="ques" name="ques" value="{{ $rec->ques }}" style="border-radius: 50px" />
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 pb-3">
                    <label for="opt_a">Option A.</label>
                    <input type="text" class="form-control" id="opt_a" value="{{ $rec->options[0]->opt_value }}" name="opt_a" style="border-radius: 50px" />
                </div>

                <div class="col-md-6 pb-3">
                    <label for="opt_a">Option B.</label>
                    <input type="text" class="form-control" id="opt_b" value="{{ $rec->options[1]->opt_value }}" name="opt_b" style="border-radius: 50px" />
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 pb-3">
                    <label for="opt_a">Option C.</label>
                    <input type="text" class="form-control" id="opt_c" value="{{ $rec->options[2]->opt_value }}" name="opt_c" style="border-radius: 50px" />
                </div>

                <div class="col-md-6 pb-3">
                    <label for="opt_a">Option D.</label>
                    <input type="text" class="form-control" id="opt_d" value="{{ $rec->options[3]->opt_value }}" name="opt_d" style="border-radius: 50px" />
                </div>
            </div>

            {{--    <div class="row mt-3 mb-3 "></div>--}}

            <div class="row mb-3">
                <div class="col-md-12">
                    <h3>Correct Option (Optional)</h3>
                </div>

                <div class="col-md-6">
                    <label>Enter correct option</label>
                    <input type="text" name="correct_opt" value="{{ $rec->correctOption[0]->correct_opt }}" class="form-control" style="border-radius: 50px;">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>Correct Option Explanation (Optional)</label>
                    <textarea style="border-radius: 10px" cols="20" rows="6" name="correc_opt_explanation" placeholder="Enter explanation for correct option" class="form-control">{!! $rec->correctOption[0]->incorrect_explanation !!}</textarea>
                    {{--                                <input type="text" name="correct_opt" class="form-control" style="border-radius: 50px;">--}}
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <button type="button" onclick="updateMcq('{{$rec->id}}')" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
@empty
@endforelse
