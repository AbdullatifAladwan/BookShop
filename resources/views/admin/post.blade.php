@extends('admin.layouts.admin')

@section('content')
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        @include('admin.layouts.menu')
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          @include('admin.layouts.nav')
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            @if(session('success'))
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> {{ session('success') }}</h4>
              @endif
              <!-- Basic Bootstrap Table -->
              <div class="card">
              <div class="card-header d-flex justify-content-between">
              <h5 class="mb-0">Posts</h5>
              <span class="text-end"><a href="#" id="addPostLink">Add post</a></span>
                </div>
                    <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Photo</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach ($post as $post)
           <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $post->title }}</strong></td>
            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $post->description }}</td>            @if ($post->photo)
            <td><span class="badge bg-label-primary me-1"><img src="{{ $post->photo }}" alt="Post Photo" style=" max-width: 50px;"></span></td>
            @endif
            <td>
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item edit-post" href="javascript:void(0);" data-post-id="{{ $post->id }}" data-title="{{ $post->title }}" data-description="{{ $post->description }}" data-photo="{{ $post->photo }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item delete-post" href="javascript:void(0);" data-post-id="{{ $post->id }}"><i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->
            </div>
            <!-- / Content -->


            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
<!-- Edit Post Modal -->

<!-- Modal -->
<div class="modal add" tabindex="-1" id="addPostModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form for adding a post -->
        <form method="POST" action="{{ route('addpost') }}" id="add" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="addtitle" name="addtitle" placeholder="Enter title">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="adddescription" name="adddescription" rows="3" placeholder="Enter description"></textarea>
          </div>
          <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control" id="addphoto" name="addphoto">
          </div>
          @csrf
          <button type="submit" class="btn btn-primary">Submit</button> <!-- Move the Submit button inside the form -->
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="postId">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updatePost">Update</button>
                </div>
            </div>
        </div>
    </div>
 <script src="admin/assets/vendor/libs/jquery/jquery.js"></script>

<script>
  $('#addPostLink').on('click', function() {
  // Show the modal
  $('#addPostModal').modal('show');
});
 $('.edit-post').on('click', function() {
    // Get post data from data attributes
    var postId = $(this).data('post-id');
    var title = $(this).data('title');
    var description = $(this).data('description');
    var photo = $(this).data('photo');
    // console.log(title)
    // Set post data to the modal form
    $('#postId').val(postId);
    $('#title').val(title);
    $('#description').val(description);
    // Open the modal
    $('#editModal').modal('show');

});
// Update Post AJAX request
$('#updatePost').on('click', function() {
    // Get form data 
    var postId = $('#postId').val();
    var title = $('#title').val();
    var description = $('#description').val();
    var photo = $('#photo')[0].files[0];

    // Create form data object
    var formData = new FormData();
    formData.append('_token', '{{ csrf_token() }}');
    formData.append('postId', postId);
    formData.append('title', title);
    formData.append('description', description);
    formData.append('photo', photo);

    // Send AJAX request
    $.ajax({
        url: '/updatePost',
        type: 'POST',
        dataType: 'JSON',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.success) {
                // Update the table row with new data
                var row = $('a[data-post-id="' + postId + '"]').closest('tr');
                row.find('strong').text(title);
                row.find('td:nth-child(2)').text(description);
                if (photo) {
                    row.find('td:nth-child(3) img').attr('src', response.photo);
                }
                $('#editModal').modal('hide');
            } else {
                alert('Failed to update post. Please try again.');
            }
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
});

    // Delete Post AJAX request
$('.delete-post').on('click', function() {
    // Get post ID from data attribute
    var postId = $(this).data('post-id');

    // Confirm the delete action
    if (confirm('Are you sure you want to delete this post?')) {
        // Send AJAX request
        $.ajax({
            url: '/deletePost',
            type: 'POST',
            dataType: 'JSON',
            data: {
                _token: '{{ csrf_token() }}',
                postId: postId
            },
            success: function(response) {
                if (response.success) {
                    // Remove the deleted post from the DOM
                    $('a[data-post-id="' + postId + '"]').closest('tr').remove();
                } else {
                    alert('Failed to delete post. Please try again.');
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    }
});

 
</script>

<!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="admin/assets/vendor/libs/popper/popper.js"></script>
    <script src="admin/assets/vendor/js/bootstrap.js"></script>
    <script src="admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="admin/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="admin/assets/js/main.js"></script>


@endsection