<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign Up</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
      margin-top: 100px;
    }

    .form-signin .form-floating {
      margin-bottom: 10px;
    }

    .form-signin .form-floating input {
      font-size: 14px;
      padding: 10px;
    }

    .form-signin .checkbox {
      font-size: 14px;
    }

    .form-signin button {
      margin-top: 10px;
      font-size: 16px;
    }

    /* Görünmez stil */
    .hidden {
      display: none;
    }
  </style>
</head>
<body class="text-center">

<main class="form-signin">
  <form action="{{ route('auth.register') }}" method="POST">
    @csrf
    <h5>Register</h5>

    <div class="form-floating">
      <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
    </div>

    <div class="form-floating">
      <select class="form-select" id="role" name="role" required>
        <option value="user">User</option>
        <option value="company">Company</option>
      </select>
      <label for="role">Select Role</label>
    </div>

    <div class="form-floating">
      <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
    </div>

    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
    </div>

    <div class="form-floating">
      <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="Confirm Password">
    </div>

    <!-- Şirket bilgileri alanları başlangıcı -->
    <div id="companyFields" class="hidden">
      <div class="form-floating">
        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name">
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="address" name="address" placeholder="Company Address">
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Company Phone Number">
      </div>
    </div>
    <!-- Şirket bilgileri alanları sonu -->

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
  </form>
</main>

<script>
  // Rol seçimi değiştiğinde
  document.getElementById('role').addEventListener('change', function() {
    // Seçilen rolü al
    var selectedRole = this.value;

    // Eğer "company" seçildiyse, şirket bilgileri alanlarını göster
    if (selectedRole === 'company') {
      document.getElementById('companyFields').classList.remove('hidden');
    } else {
      // Diğer durumlarda şirket bilgileri alanlarını gizle
      document.getElementById('companyFields').classList.add('hidden');
    }
  });
</script>

</body>
</html>
