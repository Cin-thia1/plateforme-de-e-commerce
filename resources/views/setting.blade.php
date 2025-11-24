<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
  <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header-footer.css') }}">

  <title>Settings</title>
</head>

<body>

  <!--header-->
  @include('shared.header')

  <div class="container">
    <aside>
      <ul>
        <li onclick="window.location.href='dashboard.html';" style="cursor: pointer;"><i
            class="fa-solid fa-layer-group"></i>Tableau de bord</li>
        <li onclick="window.location.href='order-history.html';" style="cursor: pointer;"><i
            class="fas fa-history"></i>Historique des commandes</li>
        <li onclick="window.location.href='panier.html';" style="cursor: pointer;"><i
            class="fas fa-shopping-cart"></i>Panier</li>
        <li onclick="window.location.href='page-favoris.html';" style="cursor: pointer;"><i
            class="fas fa-heart"></i>Favoris</li>
        <li onclick="window.location.href='profile.html';" style="cursor: pointer;" class="active"><i
            class="fa-solid fa-gear"></i>Setting</li>
        <li><i class="fa-solid fa-right-from-bracket"></i>Log-out</li>
      </ul>
    </aside>
    <div class="main">
      <section class="account-setting">
        <h2>ACCOUNT SETTING</h2>
        <form class="account-details-form">
          <div class="profile-header">
            <div class="profile-picture">
              <img src="./assets/images/avatar-placeholder.png" alt="Photo de profil de Kevin Alex">
            </div>
            <div class="profile-fields">
              <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" placeholder="Kevin">
              </div>
              <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" placeholder="Alex">
              </div>
              <div class="form-group">
                <label for="birthDate">Birth Date</label>
                <input type="date" id="birthDate" name="birthDate" />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="kevin.gilbert@gmail.com" >
              </div>
              <div class="form-group">
                <label for="sex">Sex</label>
                <select id="sex" name="sex">
                  <option value="male" selected>Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
                </select>
              </div>
              <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="+1-202-555-0118">
              </div>
              <button type="submit" class="button primary-button">SAVE CHANGES</button>
            </div>
            
          </div>
          
        </form>
      </section>

      <div class="settings-two-columns">

        <section class="billing-address">
          <h3>BILLING ADDRESS</h3>
          <form class="address-form">
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" id="address" name="address" placeholder="Road No. 13/X, House no. 1320/C, Flat No. 5D">
            </div>
            <div class="form-group">
              <label for="regionState">Region/State</label>
              <select id="regionState" name="regionState">
                <option value="" disabled selected>Select...</option>
              </select>
            </div>
            <div class="form-row">
              <div class="form-group half-width">
                <label for="city">City</label>
                <select id="city" name="city">
                  <option value="dhaka" selected>Dhaka</option>
                </select>
              </div>
              <div class="form-group half-width">
                <label for="zipCode">Zip Code</label>
                <input type="text" id="zipCode" name="zipCode" value="1207">
              </div>
            </div>
            <button type="submit" class="button primary-button">SAVE CHANGES</button>
          </form>
        </section>

        <section class="change-password">
          <h3>CHANGE PASSWORD</h3>
          <form class="password-form">
            <div class="form-group">
              <label for="currentPassword">Current Password</label>
              <input type="password" id="currentPassword" name="currentPassword">
            </div>
            <div class="form-group">
              <label for="newPassword">New Password</label>
              <input type="password" id="newPassword" name="newPassword" placeholder="8+ characters">
            </div>
            <div class="form-group">
              <label for="confirmPassword">Confirm Password</label>
              <input type="password" id="confirmPassword" name="confirmPassword">
            </div>
            <button type="submit" class="button primary-button">CHANGE PASSWORD</button>
          </form>
        </section>
      </div>
    </div>

  </div>

  <!-- footer-->
  @include('shared.footer')

</body>

</html>