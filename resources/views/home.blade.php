<!DOCTYPE html>
<html>
<head>
	<title>Mínimos Quadrados</title>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/estilo.css">
</head>
<body>
	<header>
		<div class='col-md-2'>
            <img src="img/ufopa.png" class="img-fluid float-md-right">
        </div>
        <div class="col-md-10">
            <h5>Universidade Federal do Oeste do Pará</h5>
            <h5>Instituto de Engenharia e Geociências</h5>
            <h5>Bacharelado em Ciência da Computação</h5>
            <h5>Disciplina de Cálculo Numérico</h5>
        </div>
	</header>
	<div class="container">
		<h1 class="text-center">Mínimos Quadrados</h1>
		<section class="row">
			<form id="form-m">
				<div class="form-group">
					<label>Valores de x <small>ex: 1;2;3;4;5;6;7;8</small></label>
					<textarea id="x" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label>Valores de y <small>ex: 1.3;2.2;3.1;4.2;5;6.2;7.7;8.4</small></label>
					<textarea id="y" class="form-control"></textarea>
				</div>
				<div class="text-center">
					<a href="#grafico" id="submit" class="btn btn-primary">Calcular</a>
				</div>
			</form>
		</section>
	</div>
	 <footer id="footer" class="text-center">
      <p>Desenvolvido por Judison Godinho de Sousa, Luiz Henrique Cardoso e Rita de Cássia Vilhena</p>
    </footer>
</body>
 <!-- <script src="js/jquery.js"></script> -->
 <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
 <script src="js/home.js"></script>
    <!-- <script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script> -->
    <link href="css/examples.css" rel="stylesheet" type="text/css">
</html>