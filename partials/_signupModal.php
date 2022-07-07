<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Sign up to create an account to iDiscuss forum</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/project2/partials/_signupHandler.php" method ="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="signupUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="signupUsername" name="signupUsername" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="signupEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="signupPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="signupPassword" name="signupPassword">
                    </div>
                    <div class="mb-3">
                        <label for="signupCpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="signupCpassword" name="signupCpassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Signup</button>

                </div>
            </form>
        </div>
    </div>
</div>