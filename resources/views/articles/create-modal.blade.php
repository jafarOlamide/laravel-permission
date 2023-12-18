<div class="modal fade" id="createArticleModal" tabindex="-1" aria-labelledby="createArticleModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createArticleModallLabel">Create Article</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route("articles.store")}} ">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                  <label for="full_text" class="form-label">Full Text</label>
                  <textarea name="full_text" id="full_text" rows="7" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                  <label for="" class="form-label">Category</label>
                    <select class="form-select" aria-label="Select Category" name="category_id">
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>                
                </div>

                @can('publish-article')
                  <div class="mb-3">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1">  
                    <label class="form-check-label" for="published">
                    Published
                    </label>                          
                  </div>
                @endcan
                 

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Article</button>
            </div>
        </form>
      </div>
    </div>
</div>