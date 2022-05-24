<x-layout>

    <div class="container mt-5 " style="background-color: rgba(186, 223, 223, 0.342)">
        <div class="d-flex justify-content-end align-items-center">
            <!-- Button trigger modal -->
            <button type="button" id="add_record" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#Modal">Add Name</button>

            <!-- Add Record Modal -->
            <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Record</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div id="add_modal_message" class="mt-2"></div>
                        <div class="modal-body">
                            <form>
                                <div id="alert" class="alert alert-danger alert-dismissible fade show d-none"
                                    role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <input type="hidden" id="record_id" name="id" value="">
                                <label for="">Name</label>
                                <input type="text" id="name" placeholder="Enter Name" name="name"
                                    class="form-control">
                                <label for="">Address</label>
                                <input type="text" id="address" placeholder="Enter Address" name="address"
                                    class="form-control">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="add_name" class="btn btn-primary">Save</button>
                            <button type="button" id="btn_modal_close" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- modal end --}}
        </div>

        {{-- Edit Modal --}}
        <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Record</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div id="edit_modal_message" class="mt-2"></div>
                    <div class="modal-body">
                        <form>
                            <div id="alert" class="alert alert-danger alert-dismissible fade show d-none"
                                role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <input type="hidden" id="record_id" name="id" value="">
                            <label for="">Name</label>
                            <input type="text" id="E_name" placeholder="Enter Name" name="name"
                                class="form-control">
                            <label for="">Address</label>
                            <input type="text" id="E_address" placeholder="Enter Address" name="address"
                                class="form-control">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="update_record" class="btn btn-primary">Update</button>
                        <button type="button" id="btn_modal_close" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Edit Modal --}}

        <div id="message"></div>

        <table class="table px-5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="name_list">
                @foreach ($names as $name)
                    <tr>
                        <td>{{ $name->id }}</td>
                        <td>{{ $name->name }}</td>
                        <td>{{ $name->address }}</td>
                        <td class="text-center">
                            <button value="{{ $name->id }}" class="btn btn-sm btn-info editRecord">Edit</button>
                            <button value="{{ $name->id }}" class="btn btn-sm btn-danger DeleteRecord">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
