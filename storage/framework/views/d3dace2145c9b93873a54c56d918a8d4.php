

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
           
              <!-- Basic Bootstrap Table -->
              <div class="card">
              <div class="card-header d-flex justify-content-between">
              <h5 class="mb-0">Contact</h5>
                </div>
                    <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>message</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php $__currentLoopData = $ContactUs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $con): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo e($con->name); ?></strong></td>
            <td><?php echo e($con->email); ?></td>
            <td><?php echo e($con->subject); ?></td>
            <td style=" max-width: 5px;"><span class="badge bg-label-primary me-1" >  <a class="dropdown-item show-con" href="javascript:void(0);" data-con-message="<?php echo e($con->message); ?>"> Show </a> </span></td>
            <td>
                
                        <a class="dropdown-item delete-con" href="javascript:void(0);" data-con-id="<?php echo e($con->id); ?>"><i class="bx bx-trash me-1"></i> Delete</a>
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
<div class="modal con" tabindex="-1" id="conshow">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form >
          <div class="mb-3">
            <textarea class="form-control" id="Message" name="Message" rows="5"  readonly></textarea>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


 <script src="admin/assets/vendor/libs/jquery/jquery.js"></script>

<script>
  $('.show-con').on('click', function() {
      // Get the post id from the data attribute
      var message = $(this).data('con-message');
      // Set the message in the modal
      $('#Message').val(message);
      // Show the modal
      $('#conshow').modal('show');
    });
 

    // Delete Post AJAX request
    $('.delete-con').on('click', function() {
    // Get Contact ID from data attribute
    var contactId = $(this).data('con-id');

    // Confirm the delete action
    if (confirm('Are you sure you want to delete this contact?')) {
        // Send AJAX request
        $.ajax({
            url: '/deleteContact', // Update URL to match your Laravel route for deleteContact function
            type: 'POST',
            dataType: 'JSON',
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
                postId: contactId // Update variable name to match the one used in the controller function
            },
            success: function(response) {
                if (response.success) {
                    // Remove the deleted contact from the DOM
                    $('a[data-con-id="' + contactId + '"]').closest('tr').remove();
                } else {
                    alert('Failed to delete contact. Please try again.');
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
<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\Book\resources\views/admin/contact.blade.php ENDPATH**/ ?>