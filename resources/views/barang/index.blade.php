@extends('layouts.admin')
@section('card_judul', 'Barang')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('barang.create') }}" class="btn bg-gradient-dark mb-0"><i class="fas fa-plus"
                        aria-hidden="true"></i>&nbsp;&nbsp;Add Barang</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive px-4">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">category</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Create
                                At</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $item)
                            <tr>
                                <td>
                                    <div class="d-flex py-1">
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->name }}</p>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->category->category }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->jumlah }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->created_at->format('d F, Y') }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="row justify-content-end">
                                        <div class="col-lg-2">
                                            <form action="{{ route('barang.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn bg-gradient-danger d-none d-md-block" onclick="return confirm()"
                                                    data-bs-toggle="tooltip" title="Delete" type="submit"><span
                                                        class="btn-inner--icon text-white"><i
                                                            class="fas fa-trash"></i></span></button>
                                            </form>
                                        </div>
                                        <div class="col-lg-2">
                                            <button class="btn bg-gradient-warning d-none d-md-block" title="Edit"><span
                                                    class="btn-inner--icon text-white"><i
                                                        class="fa fa-pencil"></i></span></button>
                                        </div>
                                    </div>
                                    {{-- mobile --}}
                                    <div class="btn-group dropleft mt-3 d-md-none">
                                        <button type="button" class="btn bg-gradient-dark dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">

                                        </button>
                                        <ul class="dropdown-menu px-2 py-3 bg-body border"
                                            aria-labelledby="dropdownMenuButton">
                                            <li><button title="Edit"
                                                    class="dropdown-item border-radius-md">Edit</button></li>
                                            <li>
                                                <form action="{{ route('barang.destroy', $item->id) }}" method="POST">
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
                <div class="d-flex justify-content-end mt-3">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                          <li class="page-item disabled">
                            <a class="page-link" href="javascript:;" tabindex="-1">
                              <i class="fa fa-angle-left"></i>
                              <span class="sr-only">Previous</span>
                            </a>
                          </li>
                          <li class="page-item"><a class="page-link" href="javascript:;">1</a></li>
                          <li class="page-item active"><a class="page-link" href="javascript:;">2</a></li>
                          <li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="javascript:;">
                              <i class="fa fa-angle-right"></i>
                              <span class="sr-only">Next</span>
                            </a>
                          </li>
                        </ul>
                      </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
