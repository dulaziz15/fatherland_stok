@extends('layouts.admin')
@section('content')
    <div class="container-fluid py-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card mb-3">
            <div class="card-body">
                <h4>Category</h4>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-info btn-md" data-bs-toggle="modal"
                        data-bs-target="#modal-category">Add Category</button>
                    <div class="modal fade" id="modal-category" tabindex="-1" role="dialog" aria-labelledby="modal-form"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="card card-plain">
                                        <div class="card-header pb-0 text-left">
                                            <h3 class="font-weight-bolder text-info text-gradient">Add Category</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('create_category') }}" role="form text-left"
                                                method="POST">
                                                @csrf
                                                @method('POST')
                                                <label>Category</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="category"
                                                        aria-label="Email" aria-describedby="email-addon" name="category">
                                                </div>
                                                <div class="text-center">
                                                    <button type="button"
                                                        class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0"
                                                        type="submit">Create
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive px-4">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Id</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name
                                Category
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Create
                                At</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)
                            <tr>
                                <td>
                                    <div class="d-flex py-1">
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->id }}</p>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->category }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->created_at }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="row justify-content-end">
                                        <div class="col-lg-2">
                                            <button class="btn btn-danger d-none d-md-block" data-bs-toggle="tooltip"
                                                title="Delete"><a href=""><span class="btn-inner--icon text-white"><i
                                                            class="fas fa-trash"></i></span></a></button>
                                        </div>
                                        <div class="col-lg-2">
                                            <button class="btn btn-warning d-none d-md-block" data-bs-toggle="tooltip"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modal-category"
                                                title="Edit"><a href=""><span class="btn-inner--icon text-white"><i
                                                            class="fa fa-pencil"></i></span></a></button>
                                        </div>
                                        <div class="col-lg-2">
                                            <button class="btn btn-info d-none d-md-block" data-bs-toggle="tooltip"
                                                title="Show"><a href=""><span class="btn-inner--icon text-white"><i
                                                            class="fa fa-eye"></i></span></a></button>
                                        </div>
                                    </div>
                                    {{-- mobile --}}
                                    <div class="btn-group dropleft mt-3 d-md-none">
                                        <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            
                                        </button>
                                        <ul class="dropdown-menu px-2 py-3 relative" aria-labelledby="dropdownMenuButton">
                                          <li><a class="dropdown-item border-radius-md" href="javascript:;">Show</a></li>
                                          <li><button  class="dropdown-item border-radius-md">Edit</button></li>
                                          <li><a class="dropdown-item border-radius-md" href="javascript:;">Delete</a></li>
                                        </ul>
                                      </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- // paginate --}}
                {{-- in this line --}}

            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#data').DataTable();
        });
    </script>
@endsection
