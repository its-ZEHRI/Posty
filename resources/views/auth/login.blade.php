<x-layout>
    <div class="row px-4 mt-4">
        <div class="col-md-4"></div>
        <div class="col-md-4 wrapper p-4  rounded">

        <x-alerts>
        </x-alerts>
            <h1>Login</h1>
            <hr>
            <div>
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email">
                      </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your Email">
                      </div>
                      <div class="d-flex align-items-center">
                          <input type="checkbox" name="remember" id="remember">
                          <label for="remember" class="ms-2 m-0 text-secondary">Remember me</labels>
                      </div>
                      <input type="Submit" class="btn btn-primary d-block w-100 mt-3" value="Login">
                </form>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</x-layout>
