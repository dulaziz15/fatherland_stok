@extends('layouts.admin')
@section('card_judul', 'category')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end align-items-center">
                <button type="button" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal"
                    data-bs-target="#modal-category"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add
                    Category</button>
                <div class="modal fade" id="modal-category" tabindex="-1" role="dialog" aria-labelledby="modal-form"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <div class="card card-plain">
                                    <div class="card-header pb-0 text-left">
                                        <h3 class="font-weight-bolder text-dark text-gradient">Add Category</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('create_category') }}" role="form text-left" method="POST">
                                            @csrf
                                            @method('POST')
                                            <label>Category</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="category"
                                                    aria-label="Email" aria-describedby="email-addon" name="category">
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-round bg-gradient-dark btn-lg w-100 mt-4 mb-0"
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
                                <p class="text-xs font-weight-bold mb-0">{{ $item->category }}</p>
                            </td>
                            <td class="align-middle text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $item->created_at->format('d F, Y') }}</p>
                            </td>
                            <td class="align-middle text-center">
                                <div class="row justify-content-end">
                                    <div class="col-lg-2">
                                        <form action="{{ route('delete_category', $item->id) }}" id="deleteForm" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn bg-gradient-danger d-none d-md-block"  onclick="return confirmDelete('{{ $item->category }}')" data-bs-toggle="tooltip" title="Delete"
                                                type="button"><span class="btn-inner--icon text-white"><i
                                                        class="fas fa-trash"></i></span></button>
                                        </form>
                                    </div>
                                    <div class="col-lg-2">
                                        <button class="btn bg-gradient-warning d-none d-md-block" data-bs-toggle="modal"
                                            data-bs-target="#modal-category-edit" id="btn-edit"
                                            onclick="getData({{ $item->id }})" title="Edit"><span
                                                class="btn-inner--icon text-white"><i
                                                    class="fa fa-pencil"></i></span></button>
                                    </div>
                                </div>
                                {{-- mobile --}}
                                <div class="btn-group dropleft mt-3 d-md-none">
                                    <button type="button" class="btn bg-gradient-dark dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">

                                    </button>
                                    <ul class="dropdown-menu px-2 py-3 bg-body border" aria-labelledby="dropdownMenuButton">
                                        <li><button data-bs-toggle="modal" data-bs-target="#modal-category-edit"
                                                id="btn-edit" onclick="getData({{ $item->id }})" title="Edit"
                                                class="dropdown-item border-radius-md">Edit</button></li>
                                        <li>
                                            <form action="{{ route('delete_category', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm()" class="dropdown-item border-radius-md"
                                                    type="submit">Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        {{-- Modal Edit --}}
                        @include('category.modalEdit')
                    @endforeach
                </tbody>
            </table>
            {{-- // paginate --}}
            {{-- in this line --}}
            @include('components.admin.paginate', ['paginator' => $category])
            @include('components.admin.empty', ['data' => $category])
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#data').DataTable();
        });
    </script>
@endsection
