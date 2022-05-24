<x-layout>
    <div class="row px-4 mt-4">
        <div class="col-md-4"></div>
        <div class="col-md-4 wrapper px-4 py-4 rounded">
            <h3>Register</h3>
            <hr>
            <div>
                <form action="{{route('registerUser')}}" method="POST">
                    @csrf
                    <div class="mt-3">
                        <label for="name" class="form-label m-0">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" value="{{old('name')}}"
                         style="@error('name') border:2px solid rgba(226, 36, 36, 0.932) @enderror">
                    </div>
                    <div class="mt-3">
                        <label for="email" class="form-label m-0">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" value="{{old('email')}}"
                        style="@error('name') border:2px solid rgba(226, 36, 36, 0.932) @enderror">
                      </div>
                      @error('email')
                      <h6 style="color: rgba(226, 36, 36, 0.932);  ">{{$message}}</h6>
                      @enderror
                    <div class="mt-3">
                        <label for="password" class="form-label m-0">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your Email"
                        style="@error('password') border:2px solid rgba(226, 36, 36, 0.932) @enderror">
                      </div>
                      @error('password')
                      <small style="color: rgba(226, 36, 36, 0.932) ">{{$message}}</small>
                      @enderror
                    <div class="mt-3">
                        <label for="confirm_password" class="form-label m-0">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter your Email"
                        style="@error('confirm_password') border:2px solid rgba(226, 36, 36, 0.932) @enderror">
                      </div>
                      @error('confirm_password')
                      <small>{{$message}}</small>
                      @enderror
                      <input type="Submit" class="btn btn-primary d-block w-100 mt-4" value="Register">
                      <a href="{{route('login')}}" class="nav-link p-0 mt-2">Already Have an Account</a>

                </form>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</x-layout>
