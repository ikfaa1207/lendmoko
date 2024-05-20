<?php include '../include/header.php'; ?>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: calc(var(--vh, 1vh) * 100);
        /* Use the --vh variable here */
        font-family: 'Century Gothic', Arial, sans-serif;
        background-color: #f0f0f0;
    }


    @keyframes popUp {
        0% {
            transform: scale(0.9);
            opacity: 0;
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    .container {
        width: 300px;
        padding: 16px;
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        animation: popUp 0.2s ease-out forwards;
    }

    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        border-radius: 2px;

    }

    .login-container {
        position: relative;
        padding-top: 110px;
        /* Adjust this value based on the height of your alert */
    }

    #invalid {
        position: absolute;
        top: 20px;
        /* Adjust this value to change the spacing between the alert and the top edge of the login form */
        left: 0;
        right: 0;
    }
</style>
<div class="login-container">
    <div id="invalid" class="alert alert-danger fade show" role="alert" style="display: none; border-radius: 5px;">
        <i class="fas fa-exclamation-triangle"></i> <strong>Invalid!</strong> Check Username and Password
    </div>
    <form method="post" action="authenticate.php" id="loginform">
        <div class="container">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                <path d="M20 21v-2a4 4 0 0 0 -4 -4H8a4 4 0 0 0 -4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <label for="uname"><b>Username</b></label>
            <div style="display: flex; align-items: center;">
                <input type="text" placeholder="Enter Username" name="username" required>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                <rect x="3.5" y="11" width="17" height="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
            </svg>
            <label for="psw"><b>Password</b></label>
            <div style="display: flex; align-items: center;">
                <input type="password" placeholder="Enter Password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#loginform').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: 'authenticate.php',
                data: $(this).serialize(),
                dataType: 'json', // Expect a JSON response
                success: function(response) {
                    if (!response.success) {
                        // The server returned { success: false }. Show the alert message.
                        $('#invalid').fadeIn();
                        setTimeout(function() {
                            $('#invalid').fadeOut(function() {});
                            $('#loginform')[0].reset();
                            $('input[name="username"]').focus();
                        }, 1000);
                        $(this).remove();
                    } else {
                        // The server returned { success: true }. Redirect to the admin page.
                        window.location.href = '../admin/index.php';
                    }
                },
                error: function() {
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });
    window.addEventListener('load', function() {
        const vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);
    });
</script>
<?php include '../include/footer.php'; ?>