<link rel="stylesheet" type="text/css" href="./assets/login.css">
<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>a
<form method="POST" action="">
    <h3>Connexion</h3>

    <label for="email">Email</label>
    <input type="text" placeholder="Email or Phone" id="email" name="email"> 

    <label for="password">Mot de passe</label>
    <input type="password" placeholder="Password" id="password" name="password"> 

    <button type="submit" class="log">OK</button>
    <script type="text/javascript">
	 $(function() {
		 toastr.success('Hé, <b>ça marche !</b>', 'Test');
	});
</script>
    <br>
    <a href="index.php" class="retour">Retour</a>
</form>