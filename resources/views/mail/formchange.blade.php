<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Change le mote passe</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card" style="width: 25rem;">
            <div class="card-body">
                <h2 class="card-title" style="color:rgb(7, 64, 73)">Change le mote passe</h2>
                <form method="POST" action="{{ route('actionchange', ['id' => $id]) }}">
                  @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                        @endif
                    @csrf
                    <div class="mb-3">
                        <label for="New_password" class="form-label">Noveaux mote passe</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="New_password" name="new_password">
                            <button id="chk" type="button" class="btn btn-outline"><i class="fa-solid fa-eye"></i></button>
                        </div>
                        @error('new_password')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Confirm_password" class="form-label">Confirme le mote passe</label>
                        <input type="password" class="form-control" id="Confirm_password" placeholder=""
                            name="confirm_password">
                        @error('confirm_password')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        const newpassword = document.getElementById('New_password');
        const chk = document.getElementById('chk');
        chk.addEventListener('click', () => {
            if (newpassword.type === 'password') {
                newpassword.type = 'text';
                chk.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
            } else {
                newpassword.type = 'password';
                chk.innerHTML = '<i class="fa-solid fa-eye"></i>';
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
