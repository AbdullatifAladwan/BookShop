

<?php $__env->startSection('content'); ?>
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <?php echo $__env->make('admin.layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <?php echo $__env->make('admin.layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            <?php if(session('success')): ?>
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> <?php echo e(session('success')); ?></h4>
              <?php endif; ?>
              <!-- Basic Bootstrap Table -->
              <div class="card">
              <div class="card-header d-flex justify-content-between">
              <h5 class="mb-0">Prodacts</h5>
              <span class="text-end"><a href="#" id="addPostLink">Add prodact</a></span>
                </div>
                    <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Photo</th>
                        <th>Price</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php $__currentLoopData = $prodact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo e($post->name); ?></strong></td>
            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo e($post->description); ?></td>            <?php if($post->photo): ?>
            <td><span class="badge bg-label-primary me-1"><img src="<?php echo e($post->photo); ?>" alt="Post Photo" style=" max-width: 50px;"></span></td>
            <?php endif; ?>
            <td><?php echo e($post->price); ?></td>
            <td>
          
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item edit-product" href="javascript:void(0);" data-post-id="<?php echo e($post->id); ?>" data-name="<?php echo e($post->name); ?>" data-description="<?php echo e($post->description); ?>" data-photo="<?php echo e($post->photo); ?>" data-price="<?php echo e($post->price); ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item delete-product" href="javascript:void(0);" data-post-id="<?php echo e($post->id); ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                </div>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
        <h5 class="modal-title">Add product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form for adding a post -->
        <form method="POST" action="<?php echo e(route('addproduct')); ?>" id="add" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="title" class="form-label">Name</label>
            <input type="text" class="form-control" id="addname" name="addname" placeholder="Enter name">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="adddescription" name="adddescription" rows="3" placeholder="Enter description"></textarea>
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Price</label>
            <input type="number" class="form-control" id="addprice" name="addprice" >
          </div>
          <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select class="form-control" id="addcategory_id" name="addcategory_id">
            <option value="">Select Category</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        </div>
          <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control" id="addphoto" name="addphoto">
          </div>
          <?php echo csrf_field(); ?>
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
                    <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="postId">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                        <label for="title" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" >
                      </div>
                      <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="">Select Category</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateproduct">Update</button>
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
 $('.edit-product').on('click', function() {
    // Get post data from data attributes
    var postId = $(this).data('post-id');
    var name = $(this).data('name');
    var description = $(this).data('description');
    var price =$(this).data('price')
    var photo = $(this).data('photo');
  
    $('#postId').val(postId);
    $('#name').val(name);
    $('#description').val(description);
    $('#price').val(price);
    // Open the modal
    $('#editModal').modal('show');

});
// Update  AJAX request
$('#updateproduct').on('click', function() {
    // Get form data 
    var postId = $('#postId').val();
    var name = $('#name').val();
    var description = $('#description').val();
    var price = $('#price').val();
    var category_id = $('#category_id').val();
    var photo = $('#photo')[0].files[0];

    // Create form data object
    var formData = new FormData();
    formData.append('_token', '<?php echo e(csrf_token()); ?>');
    formData.append('postId', postId);
    formData.append('name', name);
    formData.append('description', description);
    formData.append('price', price);
    formData.append('category_id', category_id);

    formData.append('photo', photo);

    // Send AJAX request
    $.ajax({
        url: '/updateproduct',
        type: 'POST',
        dataType: 'JSON',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.success) {
                // Update the table row with new data
                var row = $('a[data-post-id="' + postId + '"]').closest('tr');
                row.find('strong').text(name);
                row.find('td:nth-child(2)').text(description);
                if (photo) {
                    row.find('td:nth-child(3) img').attr('src', response.photo);
                }
                row.find('td:nth-child(4)').text(price);
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
$('.delete-product').on('click', function() {
    // Get post ID from data attribute
    var postId = $(this).data('post-id');

    // Confirm the delete action
    if (confirm('Are you sure you want to delete this post?')) {
        // Send AJAX request
        $.ajax({
            url: '/deleteproduct',
            type: 'POST',
            dataType: 'JSON',
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\Book\resources\views/admin/prodact.blade.php ENDPATH**/ ?>