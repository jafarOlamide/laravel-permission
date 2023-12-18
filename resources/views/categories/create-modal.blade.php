<div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createArticleModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createArticleModallLabel">Create Category</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route("categories.store")}} ">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                  <label for="categoryName" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Category</button>
            </div>
        </form>
      </div>
    </div>
</div>