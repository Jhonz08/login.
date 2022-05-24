<!DOCTYPE html>

<html>

<head runat="server">
    <title>Register Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="CheckPassword.js"></script>
    <link href="CheckPassword.css" rel="stylesheet" />
</head>
<style>
    .Short {
        width: 100%;
        background-color: #dc3545;
        margin-top: 5px;
        height: 3px;
        color: #dc3545;
        font-weight: 500;
        font-size: 12px;
    }

    .Weak {
        width: 100%;
        background-color: #ffc107;
        margin-top: 5px;
        height: 3px;
        color: #ffc107;
        font-weight: 500;
        font-size: 12px;
    }

    .Good {
        width: 100%;
        background-color: #28a745;
        margin-top: 5px;
        height: 3px;
        color: #28a745;
        font-weight: 500;
        font-size: 12px;
    }

    .Strong {
        width: 100%;
        background-color: #d39e00;
        margin-top: 5px;
        height: 3px;
        color: #d39e00;
        font-weight: 500;
        font-size: 12px;
    }
</style>

<body>
    <form id="form1">
        <div class="container py-3">
            <h4 class="text-center text-uppercase">estradawebgroup.com</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="card border-secondary">
                                <div class="card-header">
                                    <h3 class="mb-0 my-2">Sign Up</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input ID="txtFirstName" Class="form-control" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                            </div>
                                            <input ID="txtPhoneNumber" Class="form-control" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                            </div>
                                            <input ID="txtEmail" Class="form-control" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                            </div>
                                            <input ID="txtPassword" type="Password" Class="form-control" />
                                        </div>
                                        <div id="strengthMessage"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                            </div>
                                            <input ID="txtConfirmPassword" type="Password" Class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right rounded-0">Register</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            $('#txtPassword').keyup(function() {
                $('#strengthMessage').html(checkStrength($('#txtPassword').val()))
            })

            function checkStrength(password) {
                var strength = 0
                if (password.length < 6) {
                    $('#strengthMessage').removeClass()
                    $('#strengthMessage').addClass('Short')
                    return 'Too short'
                }
                if (password.length > 7) strength += 1
                // If password contains both lower and uppercase characters, increase strength value.
                if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
                // If it has numbers and characters, increase strength value.
                if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
                // If it has one special character, increase strength value.
                if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
                // If it has two special characters, increase strength value.
                if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
                // Calculated strength value, we can return messages
                // If value is less than 2
                if (strength < 2) {
                    $('#strengthMessage').removeClass()
                    $('#strengthMessage').addClass('Weak')
                    return 'Weak'
                } else if (strength == 2) {
                    $('#strengthMessage').removeClass()
                    $('#strengthMessage').addClass('Good')
                    return 'Good'
                } else {
                    $('#strengthMessage').removeClass()
                    $('#strengthMessage').addClass('Strong')
                    return 'Strong'
                }
            }
        });
    </script>
</body>

</html>