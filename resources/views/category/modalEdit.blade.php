<div class="modal fade" id="modal-category-edit" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left">
                        <h3 class="font-weight-bolder text-gradient-secondary">Edit Category</h3>
                    </div>
                    <div class="card-body">
                        <form role="form text-left" method="POST" id="form">
                            @csrf
                            @method('PUT')
                            <label>Category</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="category" aria-label="Email"
                                    aria-describedby="email-addon" name="category" id="category-update">
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-round bg-gradient-dark btn-lg w-100 mt-4 mb-0"
                                    type="submit" id="submitUpdate">Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // get data category untuk modal edit category
    function getData(id) {
        $.ajax({
            url: '/category/' + id,
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                // Tampilkan data dalam modal
                let responseData = response.category;
                $('#category-update').val(responseData);
                $('#submitUpdate').attr('onclick', 'formUpdate(' + response.id + ')');
                $('#modal-category-edit').modal('show');
                $('#form').attr('action', 'category/' + response.id + '');
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    // menambah action update category
    function formUpdate(id) {
        let category = $('#category-update').val();
        $.ajax({
            url: '/category/' + id,
            method: 'PUT',
            dataType: 'json',
            data: {
                category: category
            },
            success: function(response) {
                let responseData = response.category;
            },
        })
    }
</script>
