{{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>--}}

    <div class="modal fade" id="exampleModal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12" style="text-align: start;">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12" style="text-align: end;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.updateStudent') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="form-group mb-4">
                        <label for="name" class="field_label fw-bolder">Name:</label>
                        <input type="text" class="form-control input-field-reg @error('name') is-invalid @enderror"
                               name="name" required autocomplete="first_name" autofocus
                               id="name" >
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="email" class="field_label fw-bolder">E-mail:</label>
                        <input type="email" class="form-control input-field-reg @error('email') is-invalid @enderror"
                               name="email" required autocomplete="email" autofocus
                               id="email" >
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="role" class="field_label fw-bolder">Role Type:</label>
                        <select name="role" id="role"
                                class="form-control input-field-reg @error('role') is-invalid @enderror"
                                required autocomplete="role" autofocus>
                            <option selected>Select Role</option>
                            <option value="Teacher">Teacher</option>
                            <option value="Student">Student</option>
                        </select>
                        @error('role')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"  class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


